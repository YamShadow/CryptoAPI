<?php
/**
 * Configuration des variables d'environnement
 * 
 * Ce fichier permet d'instancier toutes les variables propres à CodeIgniter.
 * 
 */
$data = array_merge(json_decode(file_get_contents('surcouche/data/client.json'), true));
include('surcouche/src/fonction.php');

foreach($data['client'] as $key => $value)
    if($key == 'base_url'){
        define(strtoupper($key), conf_baseurl($value['prod'], $value['git'], $value['ssl']));
        define('URIPROD', $value['prod']);
    }
    elseif($key == 'database')
        define(strtoupper($key), conf_bdd($value));
    else
        define(strtoupper($key), $value);


if(MAINTENANCE){
    if((isset($_GET['echap']) && $_GET['echap'] == ECHAPMAINTENANCE) || (isset($_COOKIE['echapMaintenance']) && $_COOKIE['echapMaintenance'] == ECHAPMAINTENANCE)){
        setcookie('echapMaintenance',ECHAPMAINTENANCE,time()+86400);
    }else{
        include('maintenance.html');
        die();
    }
}
?>