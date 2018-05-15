<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class API extends REST_Controller 
{

    private $url = [
        'cryptocurrencies' => BASE_URL.'/api/cryptocurrencies',
        'cryptocurrencies_id' => BASE_URL.'/api/cryptocurrencies/id/{number}',
        'echange' => BASE_URL.'/api/echanges',
        'echange_id' => BASE_URL.'/api/echanges/id/{number}',
        'echange_id_limit' => BASE_URL.'/api/echanges/id/{number}/limit/{number}',
        'echange_id_date' => BASE_URL.'/api/echanges/id/{number}/date/{date}',
        'echange_symb' => BASE_URL.'/api/echanges/symbol/{String}',
        'echange_symb_limit' => BASE_URL.'/api/echanges/symbol/{String}/limit/{number}',
        'echange_symb_date' => BASE_URL.'/api/echanges/symbol/{String}/date/{date}',
    ];

    function __construct()
    {
        parent::__construct();
    }

    function index_get() 
    {
        $this->set_response($this->url, REST_Controller::HTTP_OK);
    }

    function cryptocurrencies_get(){

        $id = $this->get();
        
        var_dump($id);
        $limit = $this->get('limit');
        var_dump($limit);

    }

    private $url2 = [
        'echange_id' => BASE_URL.'/api/echanges/id/{number}',
        'echange_id_limit' => BASE_URL.'/api/echanges/id/{number}/limit/{number}',
        'echange_id_date' => BASE_URL.'/api/echanges/id/{number}/date/{date}',
        'echange_symb' => BASE_URL.'/api/echanges/symbol/{String}',
        'echange_symb_limit' => BASE_URL.'/api/echanges/symbol/{String}/limit/{number}',
        'echange_symb_date' => BASE_URL.'/api/echanges/symbol/{String}/date/{date}',
    ];

    function echanges_get() 
    {
        $this->set_response($this->url2, REST_Controller::HTTP_OK);
    }

}