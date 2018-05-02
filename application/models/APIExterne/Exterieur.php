<?php

/**
 * Le model API_model permet de gerer l'API
 *
 * @author Mathieu <mnibas@pushupagency.fr>
 */

class Exterieur extends CI_Model{
    /**
     * Constructeur de la class
     */
    function __construct(){
        parent::__construct();
        $this->load->model('Reseau/Reseau', 'reseau');
    }

    function appelAPI($url) {
        $http = $this->reseau->initTrameReseau($url, 'get');

    }


}

    
