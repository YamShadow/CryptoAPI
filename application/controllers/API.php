<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class API extends REST_Controller 
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('SQL', 'sql');
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

        $currencies = (isset($where)) ? $this->sql->getBDD('monnaie_crypto', $where) : $this->sql->getBDD('monnaie_crypto');
       
        if($currencies)
            $this->set_response($currencies, REST_Controller::HTTP_OK);
        else 
            $this->set_response('Check your request', REST_Controller::HTTP_NOT_FOUND);

        return;
        
    }

    function echanges_get() 
    {

        $jointure = array(
            'table' => 'echange',
            'champs' => 'idMonnaieCrypto'
        );
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

        if (isset($where))
            $echanges =$this->sql->getBDD('monnaie_crypto', $where, $jointure, null, $limit);
       
        if (isset($echanges)) {

            if ($echanges)
                $this->set_response($echanges, REST_Controller::HTTP_OK);
            else
                $this->set_response('Check your request', REST_Controller::HTTP_NOT_FOUND);
            
            return;
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