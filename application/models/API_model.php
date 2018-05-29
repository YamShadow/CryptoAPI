<?php

class API_model extends CI_Model{

    private $etat;
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('SQL', 'sql');
        $this->etat = $this->controleAPI();
    }

    function getEtat() {
        return $this->etat;
    }

    private function controleAPI() 
    {
        $etat = 0;

        $sql = array(
            'table' => 'crypto_ip',
            'where' => array(
                0 => array(
                    'champs' => 'IP',
                    'value' => $this->getIp(),
                ),
                1 => array(
                    'champs' => 'date',
                    'value' => date('Y-m-d'),
                ),
            )
        );

        if (!$client = $this->sql->getBDD($sql)) {

            $array = array(
                'IP' => $this->getIp(),
                'date' => date('Y-m-d'),
                'cpt' => 1,
            );
            $this->sql->insertBDD('crypto_ip', $array);

        } else {

            $array = array(
                'cpt' => $client->cpt+1,
            );
            $this->sql->updateBDD('crypto_ip', $client->id, $array);

            if ($client->cpt > 250 && $client->cpt < 500) 
                $etat = 1;
            elseif ($client->cpt >= 500)
                $etat = (FORKBOMB == 1) ? 2 : 1;
        }

        return $etat;

      }
      
    private function getIp() 
    {
          if (isset($_SERVER['HTTP_CLIENT_IP']))
              return $_SERVER['HTTP_CLIENT_IP'];
          elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
              return $_SERVER['HTTP_X_FORWARDED_FOR'];
          else 
              return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }

}
