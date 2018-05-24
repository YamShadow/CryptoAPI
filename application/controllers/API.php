<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class API extends REST_Controller 
{

    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");
        parent::__construct();
        $this->load->model('SQL', 'sql');
        $this->load->driver('cache',
            array('adapter' => 'apc', 'backup' => 'file', 'key_prefix' => 'api_')
        );
    }

    function index_get() 
    {
        $url = array(
            'cryptocurrencies' => BASE_URL.'/api/cryptocurrencies',
            'cryptocurrencies_id' => BASE_URL.'/api/cryptocurrencies/id/{number}',
            'echange' => BASE_URL.'/api/echanges',
            'echange_id' => BASE_URL.'/api/echanges/id/{number}',
            'echange_id_limit' => BASE_URL.'/api/echanges/id/{number}/limit/{number}',
            'echange_id_date' => BASE_URL.'/api/echanges/id/{number}/date/{date}',
            'echange_symb' => BASE_URL.'/api/echanges/symbol/{String}',
            'echange_symb_limit' => BASE_URL.'/api/echanges/symbol/{String}/limit/{number}',
            'echange_symb_date' => BASE_URL.'/api/echanges/symbol/{String}/date/{date}',
            'historiques' => BASE_URL.'/api/historiques',
            'historiques_id' => BASE_URL.'/api/historiques/id/{number}',
            'historiques_id_limit' => BASE_URL.'/api/historiques/id/{number}/limit/{number}',
            'historiques_id_date' => BASE_URL.'/api/historiques/id/{number}/date/{date}',
            'historiques_symb' => BASE_URL.'/api/historiques/symbol/{String}',
            'historiques_symb_limit' => BASE_URL.'/api/historiques/symbol/{String}/limit/{number}',
            'historiques_symb_date' => BASE_URL.'/api/historiques/symbol/{String}/date/{date}',
        );

        $this->set_response($url, REST_Controller::HTTP_OK);

    }

    function cryptocurrencies_get(){

        $where = $this->sql->getWhere($this->get('id'), $this->get('symbol'));

        $data = $this->sql->getCache('cryptoAll', 'monnaie_crypto', $where, null, null, null);

        $currencies = (isset($where)) ? $this->sql->getBDD('monnaie_crypto', $where) : $data;
       
        if($currencies)
            $this->set_response($currencies, REST_Controller::HTTP_OK);
        else 
            $this->set_response('Check your request', REST_Controller::HTTP_NOT_FOUND);

        return;
        
    }

    function echanges_get() 
    {

        $limit = $this->sql->getLimit($this->get('limit'));
        $where = $this->sql->getWhere($this->get('id'), $this->get('symbol'));


        if (isset($top)) {

            $name = 'echange_'.$where['value'].'_'.$limit;

            $jointure = array(
                'table' => 'monnaie_crypto',
                'champs' => 'idMonnaieCrypto'
            );

            $where = array(
                'champs' => 'echange',
                'value' => 'idMonnaieCrypto'
            );

            $order = array(
                'champs' => $top,
                'order' => 'DESC',
            );

            $limit = '3';

            $data = $this->sql->getCache($name, 'echange', $where, $jointure, $order, $limit);

            if (isset($data)) {

                if ($data)
                    $this->set_response($data, REST_Controller::HTTP_OK);
                else
                    $this->set_response('Check your request', REST_Controller::HTTP_NOT_FOUND);
                
                return;
            }
        }



        if (isset($where)) {

            $name = 'echange_'.$where['value'].'_'.$limit;

            $jointure = array(
                'table' => 'echange',
                'champs' => 'idMonnaieCrypto'
            );

            $order = array(
                'champs' => "last_update",
                'order' => 'DESC',
            );

            $data = $this->sql->getCache($name, 'monnaie_crypto', $where, $jointure, $order, $limit);

            if (isset($data)) {

                if ($data)
                    $this->set_response($data, REST_Controller::HTTP_OK);
                else
                    $this->set_response('Check your request', REST_Controller::HTTP_NOT_FOUND);
                
                return;
            }
        }

        $url = [
            'echange_id' => BASE_URL.'/api/echanges/id/{number}',
            'echange_id_limit' => BASE_URL.'/api/echanges/id/{number}/limit/{number}',
            'echange_id_date' => BASE_URL.'/api/echanges/id/{number}/date/{date}',
            'echange_symb' => BASE_URL.'/api/echanges/symbol/{String}',
            'echange_symb_limit' => BASE_URL.'/api/echanges/symbol/{String}/limit/{number}',
            'echange_symb_date' => BASE_URL.'/api/echanges/symbol/{String}/date/{date}',
        ];

        $this->set_response($url, REST_Controller::HTTP_OK);
        return;
    }

    function historiques_get() {

        $limit = $this->sql->getLimit($this->get('limit'));
        $where = $this->sql->getWhere($this->get('id'), $this->get('symbol'));

        if (isset($where)) {

            $name = 'histo_'.$where['value'].'_'.$limit;

            $jointure = array(
                'table' => 'historique_prix',
                'champs' => 'idMonnaieCrypto'
            );

            $order = array(
                'champs' => "last_update",
                'order' => 'DESC',
            );

            $data = $this->sql->getCache($name, 'monnaie_crypto', $where, $jointure, $order, $limit);

            if (isset($data)) {

                if ($data)
                    $this->set_response($data, REST_Controller::HTTP_OK);
                else
                    $this->set_response('Check your request', REST_Controller::HTTP_NOT_FOUND);
                
                return;
            }
        }

        $url = [
            'historiques_id' => BASE_URL.'/api/historiques/id/{number}',
            'historiques_id_limit' => BASE_URL.'/api/historiques/id/{number}/limit/{number}',
            'historiques_id_date' => BASE_URL.'/api/historiques/id/{number}/date/{date}',
            'historiques_symb' => BASE_URL.'/api/historiques/symbol/{String}',
            'historiques_symb_limit' => BASE_URL.'/api/historiques/symbol/{String}/limit/{number}',
            'historiques_symb_date' => BASE_URL.'/api/historiques/symbol/{String}/date/{date}',
        ];

        $this->set_response($url, REST_Controller::HTTP_OK);
        return;

    }

}
