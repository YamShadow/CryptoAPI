<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Cryptocurrencies extends REST_Controller {

    private $cryptocurrencies = [
        ['id' => 1, 'name' => 'Bitcoin', 'symbol' => 'BTC'],
        ['id' => 2, 'name' => 'Ethereum', 'symbol' => 'ETH'],
        ['id' => 3, 'name' => 'Ripple', 'symbol' => 'XRP'],
    ];

    function __construct()
    {
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['cryptocurrencies_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['cryptocurrency_get']['limit'] = 500; // 500 requests per hour per user/key
    }

    function index_get() {
        echo 'index';
    }

    public function cryptocurrency_get()
    {
        $id = $this->get('id');

        if ($id === NULL) {
            
            if ($this->cryptocurrencies)
                $this->response($this->cryptocurrencies, REST_Controller::HTTP_OK);
            else 
                $this->response([
                    'status' => FALSE,
                    'message' => 'No cryptocurrency were found'
                ], REST_Controller::HTTP_NOT_FOUND); 
        }

        $id = (int) $id;

        if ($id <= 0)
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); 
        
        $cryptocurrencies = NULL;
        if (!empty($this->cryptocurrencies)) {
            foreach ($this->cryptocurrencies as $key => $value) {
                if (isset($value['id']) && $value['id'] === $id)
                    $cryptocurrencies = $value;
            }
        }
    
        if (!empty($cryptocurrencies))
            $this->set_response($cryptocurrencies, REST_Controller::HTTP_OK);
        else
            $this->set_response([
                'status' => FALSE,
                'message' => 'No cryptocurrency were found with the id '.$id
            ], REST_Controller::HTTP_NOT_FOUND);
    }

    public function cryptocurrencysymbol_get()
    {
        $symbol = $this->get('symbol');

        if ($symbol === NULL) {
            
            if ($this->cryptocurrencies)
                $this->response($this->cryptocurrencies, REST_Controller::HTTP_OK);
            else 
                $this->response([
                    'status' => FALSE,
                    'message' => 'No cryptocurrency were found'
                ], REST_Controller::HTTP_NOT_FOUND); 
        }

        $symbol = (string) $symbol;

        if ($symbol <= 0)
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); 
        
        $cryptocurrencies = NULL;
        if (!empty($this->cryptocurrencies)) {
            foreach ($this->cryptocurrencies as $key => $value) {
                if (isset($value['symbol']) && $value['symbol'] === $symbol)
                    $cryptocurrencies = $value;
            }
        }
    
        if (!empty($cryptocurrencies))
            $this->set_response($cryptocurrencies, REST_Controller::HTTP_OK);
        else
            $this->set_response([
                'status' => FALSE,
                'message' => 'No cryptocurrency were found with the id '.$symbol
            ], REST_Controller::HTTP_NOT_FOUND);
    }

    public function cryptocurrencies_get()
    {
        if (!empty($this->cryptocurrencies)) {
            foreach ($this->cryptocurrencies as $key => $value) {
                print_r($value);
            }
        }

        if (!empty($value))
            $this->set_response($value, REST_Controller::HTTP_OK);
        else
            $this->set_response([
                'status' => FALSE,
                'message' => 'Cryptocurrencies could not be found'
            ], REST_Controller::HTTP_NOT_FOUND);
    }
}