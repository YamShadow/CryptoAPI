<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Cryptocurrencies extends REST_Controller {

    private $cryptocurrencies = [
        ['id' => 1, 'name' => 'Bitcoin', 'symbol' => 'BTC'],
        ['id' => 2, 'name' => 'Ethereum', 'symbol' => 'ETH'],
        ['id' => 3, 'name' => 'Ripple', 'symbol' => 'XRP'],
    ];
    private $limit = 50;

    function __construct()
    {
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['cryptocurrencies_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['cryptocurrency_get']['limit'] = 500; // 500 requests per hour per user/key
    }

    function index_get($id) {

        var_dump($id);
        $id = $this->get('id');
        var_dump($id);




        // if (!empty($this->cryptocurrencies)) {
        //     foreach ($this->cryptocurrencies as $key => $value) {
        //         print_r($value);
        //     }
        // }
        
        // if (!empty($value))
        //     $this->set_response($value, REST_Controller::HTTP_OK);
        // else
        //     $this->set_response([
        //         'status' => FALSE,
        //         'message' => 'Cryptocurrencies could not be found'
        //     ], REST_Controller::HTTP_NOT_FOUND);
    }


    function id_get($id){
        $id = $this->get('id');
        var_dump($id);
    }

}