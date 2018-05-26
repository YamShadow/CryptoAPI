<?php

class CoinMarketCap extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('SQL', 'sql');
    }

    function traitementCoinMarketCap($monnaies)
    {

        foreach ($monnaies as $monnaie) {
 
            $crypto = $this->checkExistanceMonnaie($monnaie->symbol);

            if (!$crypto) {
                // Ajout de la crypto
                $array = array(
                    'name' => $monnaie->name,
                    'symbol' => $monnaie->symbol,
                    'rank' => $monnaie->rank,
                );
                $idCrypto = $this->sql->insertBDD('monnaie_crypto', $array);
                if($idCrypto)
                    $crypto = $this->checkExistanceMonnaie($monnaie->symbol);
            } else {
                $array = array(
                    'rank' => $monnaie->rank
                );
                $return = $this->sql->updateBDD('monnaie_crypto', $crypto->id, $array);
            }

            //Maj des echanges
            if (!$this->checkUpdatePrices('echange', $monnaie->last_updated, $crypto->id)) {
                $echange = array(
                    'last_update' => date('Y-m-d H:i:s', $monnaie->last_updated),
                    '1h' => $monnaie->percent_change_1h,
                    '24h' => $monnaie->percent_change_24h,
                    '7d' => $monnaie->percent_change_7d,
                    'idMonnaieCrypto' => $crypto->id
                );
                $res = $this->sql->insertBDD('echange', $echange);
            }

            //Maj des prix
            if (!$this->checkUpdatePrices('historique_prix', $monnaie->last_updated, $crypto->id)) {
                $string = '24h_volume_usd';
                $prices = array(
                    'prix' => $monnaie->price_usd,
                    'prix_btc' => $monnaie->price_btc,
                    'vol_24h_usd' => $monnaie->$string,
                    'market_cap_usd' => $monnaie->market_cap_usd,
                    'last_update' => date('Y-m-d H:i:s', $monnaie->last_updated),
                    'idMonnaieCrypto' => $crypto->id
                );

                $res = $this->sql->insertBDD('historique_prix', $prices);
            }

        }
    }

    function checkExistanceMonnaie($symb)
    {
        $query = $this->db->where('symbol', $symb)
                    ->get('monnaie_crypto');
        
        if ($query->num_rows() >= 1)
            return $query->row();
        return false;
    }

    function checkUpdatePrices($table, $lastUpdated, $idCrypto) 
    {
        $query = $this->db->where('last_update', $lastUpdated)
                    ->where('idMonnaieCrypto', $idCrypto)
                    ->get($table);
        
        if ($query->num_rows() >= 1)
            return true;
        return false;
    }

}
