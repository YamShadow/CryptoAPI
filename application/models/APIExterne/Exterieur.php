<?php

class Exterieur extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Reseau/Reseau', 'reseau');
    }

    function appelAPI($url)
    {
        $http = $this->reseau->initTrameReseau($url, 'get');
        return $http;
    }


}
