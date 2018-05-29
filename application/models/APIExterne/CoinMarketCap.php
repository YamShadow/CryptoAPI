<?php

class CoinMarketCap extends CI_Model{
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('SQL', 'sql');
    }

    //Methode qui permet de traité les données de l'API Coin Maret Cap
    function traitementCoinMarketCap($monnaies)
    {
        foreach ($monnaies as $monnaie) {
 
            //Verifie l'existant de la monnaie en BDD
            $crypto = $this->checkExistanceMonnaie($monnaie->symbol);

            if (!$crypto) {
                // Si elle n'existe pas, création de la monnaie en BDD
                $array = array(
                    'name' => $monnaie->name,
                    'symbol' => $monnaie->symbol,
                    'rank' => $monnaie->rank,
                );
                $idCrypto = $this->sql->insertBDD('monnaie_crypto', $array);

                if ($idCrypto)
                    $crypto = $this->checkExistanceMonnaie($monnaie->symbol);
            } else {
                $array = array(
                    'rank' => $monnaie->rank
                );
                //Mise a jour du rank
                $return = $this->sql->updateBDD('monnaie_crypto', $crypto->id, $array);
            }

            //Mise a jour des echanges
            if (!$this->checkUpdatePrices('echange', $monnaie->last_updated, $crypto->id) && !empty($monnaie->last_updated)) {
                $echange = array(
                    'last_update' => date('Y-m-d H:i:s', $monnaie->last_updated),
                    '1h' => $monnaie->percent_change_1h,
                    '24h' => $monnaie->percent_change_24h,
                    '7d' => $monnaie->percent_change_7d,
                    'idMonnaieCrypto' => $crypto->id
                );

                $res = $this->sql->insertBDD('echange', $echange);
            }

            //Mise a jour de l'historiques de prix
            if (!$this->checkUpdatePrices('historique_prix', $monnaie->last_updated, $crypto->id) && !empty($monnaie->last_updated)) {
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

    // Recherche la monnaie en BDD par son symbol
    function checkExistanceMonnaie($symb)
    {
        $query = $this->db->where('symbol', $symb)
                    ->get('monnaie_crypto');
        
        if ($query->num_rows() >= 1)
            return $query->row();
        return false;
    }

    // Recherche les prix de la monnaie en BDD par son ID et son last_update
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
