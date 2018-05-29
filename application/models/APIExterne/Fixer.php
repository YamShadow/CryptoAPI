<?php

class Fixer extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('SQL', 'sql');
    }

    // Methode checkExistanceMonnaie vérifie si la monnaie existe en BDD
    function checkExistanceMonnaie($symb)
    {
        $query = $this->db->where('symbol', $symb)
                    ->get('monnaie_fiduciaire');
        
        if ($query->num_rows() >= 1)
            return $query->row();
        return false;
    }

    //Methode checkUpdatePrices qui vérifie si le combo last_update et la monnaie existe déjà en base
    function checkUpdatePrices($lastUpdated, $idMonnaie) 
    {
        $query = $this->db->where('last_update', $lastUpdated)
                    ->where('idMonnaieFiducaire', $idMonnaie)
                    ->get('historique');
        
        if ($query->num_rows() >= 1)
            return true;
        return false;
        
    }

    //Methode AddMonnaie qui rajoute les monnaies en BDD
    function addMonnaie($data) {
        foreach ($data as $key => $name) {
            //Recuperation de la monnaie en BDD
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

    //Methode AddRates qui permet de rajouté les rates dans la BDD
    function AddRates($data) {
        foreach ($data->rates as $symbol => $rates) {

            //Recuperation de la monnaie en BDD
            $monnaie = $this->checkExistanceMonnaie($symbol);
            //conversion du timestamp
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
