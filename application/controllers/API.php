<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class API extends REST_Controller 
{

    function __construct()
    {
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
        );

        $this->set_response($url, REST_Controller::HTTP_OK);

    }

    function cryptocurrencies_get(){

        $id = $this->get('id');
        if ($id !== NULL) {
            $where = array(
                'champs' => 'id',
                'value' => $id
            );
        }

        $symbol = $this->get('symbol');
        if ($symbol !== NULL) {
            $where = array(
                'champs' => 'symbol',
                'value' => strtoupper($symbol)
            ); 
        }

        if (!$data = $this->cache->get('cryptoAll')) {
            $data = $this->sql->getBDD('monnaie_crypto');
            $this->cache->save('cryptoAll', $data, 300);
        }

        $currencies = (isset($where)) ? $this->sql->getBDD('monnaie_crypto', $where) : $data;
       
        if($currencies)
            $this->set_response($currencies, REST_Controller::HTTP_OK);
        else 
            $this->set_response('Check your request', REST_Controller::HTTP_NOT_FOUND);

        return;
        
    }

    function echanges_get() 
    {

        $limit = ($this->get('limit') !== null) ? $this->get('limit') : '50';

        $id = $this->get('id');
        if ($id !== NULL) {
            $where = array(
                'champs' => 'id',
                'value' => $id
            );
        }

        $symbol = $this->get('symbol');
        if ($symbol !== NULL) {
            $where = array(
                'champs' => 'symbol',
                'value' => strtoupper($symbol)
            ); 
        }

        if (isset($where)) {

            $name = 'echange_'.$where['value'].'_'.$limit;

            if (!$data = $this->cache->get($name)) {

                $jointure = array(
                    'table' => 'echange',
                    'champs' => 'idMonnaieCrypto'
                );
    
                $order = array(
                    'champs' => "last_update",
                    'order' => 'DESC',
                );

                $data =$this->sql->getBDD('monnaie_crypto', $where, $jointure, $order, $limit);

                $this->cache->save($name, $data, 300);
            }

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
    }

}