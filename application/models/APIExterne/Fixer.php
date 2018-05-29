<?php

class Fixer extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('SQL', 'sql');
    }

    function checkExistanceMonnaie($symb)
    {
        $query = $this->db->where('symbol', $symb)
                    ->get('monnaie_fiduciaire');
        
        if ($query->num_rows() >= 1)
            return $query->row();
        return false;
    }

    function checkUpdatePrices($lastUpdated, $idMonnaie) 
    {
        $query = $this->db->where('last_update', $lastUpdated)
                    ->where('idMonnaieFiducaire', $idMonnaie)
                    ->get('historique');
        
        if ($query->num_rows() >= 1)
            return true;
        return false;
        
    }

    function addMonnaie($data) {
        foreach ($data as $key => $name) {
            $monnaie = $this->checkExistanceMonnaie($key);

            if (!$monnaie) {
                $array = array(
                    'name' => $name,
                    'symbol' => $key,
                );

                $idMonnaie = $this->sql->insertBDD('monnaie_fiduciaire', $array);
            }
        }
    }

    function AddRates($data) {
        foreach ($data->rates as $symbol => $rates) {

            $monnaie = $this->checkExistanceMonnaie($symbol);
            $time = date('Y-m-d H:i:s', $data->timestamp);

            if ($monnaie && !$this->checkUpdatePrices($time, $monnaie->id)) {
                $array = array(
                    'rate' => $rates,
                    'base' => $data->base,
                    'last_update' => $time,
                    'idMonnaieFiducaire' => $monnaie->id
                );

                $idMonnaie = $this->sql->insertBDD('historique', $array);

            }
        }
    }
    

}
