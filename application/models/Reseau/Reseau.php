<?php

/**
 * Le model API_model permet de gerer l'API
 *
 * @author Mathieu <mnibas@pushupagency.fr>
 */

class Reseau extends CI_Model{
    /**
     * Constructeur de la class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('Reseau/Reseau_Bus', 'bus');
    }

    /**
     * Methode initTrameReseau qui permet d'executer tout le processus d'une methode cURL en post avec la génération du bus
     * @param $data
     * @param $path
     */
    function initTrameReseau($path, $modeCurl, $bus = null){
        
        $codeHTTP = $this->getHTTP($path);
        $codeValide = array(200, 301, 302);
        if(in_array($codeHTTP, $codeValide)) {
            switch($modeCurl){
                case 'post':
                    $curl = $this->post($path, $bus);
                    break;
                case 'get':
                    $curl = $this->get($path);
                    break;
                case 'put':
                    $curl = $this->put($path, $bus);
                    break;
                case 'del':
                    $curl = $this->delete($path, $bus);
                    break;
            }

            if(isset($curl)){
                echo '<pre>';
                var_dump(json_decode($curl));
                echo '</pre>';
                
            }else
                die('Code Erreur Reseau 10R2');
           
        }else
            die('Code Erreur Reseau 10R1');
    }

    /**** cURL ****/

    /**
     * Methode getHTTP qui permet de recuperer l'entete http par cURL
     * @param $lien
     * @return mixed
     */
    function getHTTP($lien){
        return $this->cURL($lien, 5, 'entete');
    }
    /**
     * Methode get qui permet de faire une méthode get en cURL
     * @param $lien
     * @return mixed
     */
    function get($lien){
        return $this->cURL($lien, 5, 'get');
    }
    /**
     * Methode get qui permet de faire une méthode post en cURL
     * @param $lien
     * @param $data
     * @return mixed
     */
    function post($lien, $data){
        return $this->cURL($lien, 5, 'post', $data);
    }

    /**
     * Methode delete qui permet de faire une méthode post en cURL
     * @param $lien
     * @param $data
     * @return mixed
     */
    function delete($lien, $data){
        return $this->cURL($lien, 5, 'delete', $data);
    }

    /**
     * Methode put qui permet de faire une méthode post en cURL
     * @param $lien
     * @param $data
     * @return mixed
     */
    function put($lien, $data){
        return $this->cURL($lien, 5, 'put', $data);
    }

    /**
     * Methode cURL qui permet d'executer le mode cURL en fonction des parametres de signature
     * @param $url
     * @param $timeout
     * @param $mode
     * @param null $data
     * @return mixed
     */
    function cURL($url, $timeout, $mode, $data = null){
        $modePossible = array('get', 'post', 'put', 'delete', 'entete');

        if (in_array($mode, $modePossible)) {
            $curl = curl_init($url);
            
            curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);

            if (preg_match('`^https://`i', $url)) {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            }
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            switch(strtolower($mode)){
                case 'entete':
                    curl_setopt($curl, CURLOPT_NOBODY, true);
                    break;
                case 'post':
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, array('data' => $data));
                    break;
                case 'put':
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                    curl_setopt($curl, CURLOPT_POSTFIELDS, array('data' => $data));
                    break;
                case 'delete':
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                    break;
            }

            $response = curl_exec($curl);
   

            //var_dump($url, $response);
            if ($response || $response == '') {
                if (strtolower($mode) == 'entete') {
                    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
           
                    curl_close($curl);
                    return $http_code;
                } else {
                    curl_close($curl);
                    return $response;
                }
            } else
                die('Reseau 40P08');
            return;
        } else
            die('Reseau 40P07');
    }

}

    
