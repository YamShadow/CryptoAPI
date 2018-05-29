<?php

class Exterieur extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Reseau/Reseau', 'reseau');
    }

    // Initaliser le réseau
    function appelAPI($url)
    {
        $http = $this->reseau->initTrameReseau($url, 'get');
        return $http;
    }


}
