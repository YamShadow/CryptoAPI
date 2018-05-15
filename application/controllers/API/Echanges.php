<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Echanges extends REST_Controller 
{

    private $url = [
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

}