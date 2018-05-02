<?php

/**
 * Le model API_model permet de gerer l'API
 *
 * @author Mathieu <mnibas@pushupagency.fr>
 */

class Reseau_Bus extends CI_Model{
    /**
     * Constructeur de la class
     */
    function __construct(){
        parent::__construct();
    }

    /**
     * Methode getBus qui permet de générer le bus de données
     * @param $site
     * @param $mode
     * @param $data
     * @param string $code
     * @return array
     */
    function getBus($mode, $data, $code = '200'){
        $bus = array(
            'request' => $this->getBusPartRequest($code),
            'traitement' => $this->getBusPartTraitement($mode, $data)
        );
        return $bus;
    }
    /**
     * Methode getBusPartRequest qui permet de générer la partie request du bus
     * @param $code
     * @param null $site
     * @return array
     */
    function getBusPartRequest($code){
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
    /**
     * Methode getBusPartTraitement qui permet de générer la partie traitement du bus
     */
    function getBusPartTraitement($mode, $data){

    }

    /**
     * Methode controleTechniqueBus qui permet de controler le bus
     * @param $bus
     * @return bool|string
     */
    function controleTechniqueBus($busJson){
        $bus = json_decode($busJson);
        $code = false;

        if($bus){
            
        }

        return $code;
    }

}

    
