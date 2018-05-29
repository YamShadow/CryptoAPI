<?php

class Reseau_Bus extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getBus($mode, $data, $code = '200')
    {
        $bus = array(
            'request' => $this->getBusPartRequest($code),
            'traitement' => $this->getBusPartTraitement($mode, $data)
        );

        return $bus;
    }

    function getBusPartRequest($code)
    {
        $bool = true;
        $version = '1.0';
        $code = '200';
        $apiKey = 'J3Su1sUn3K3y';

        $request = array(
            'version' => '1.0',
		    'apiKey' => $apiKey,
		    'status' => $code,
            'features' => array('date' => time()),
        );
        return $request;
    }

    function controleTechniqueBus($busJson)
    {
        $bus = json_decode($busJson);
        $code = false;

        if($bus){
            
        }

        return $code;
    }

}

    
