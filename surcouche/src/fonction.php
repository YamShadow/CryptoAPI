<?php 

// $prod URL
// $git dossier local
// $ssl protocole true/false
// Set de la config de la base url
function conf_baseurl($prod, $git, $ssl){
    $url = $ssl ? 'https://' : 'http://';
    if($prod{strlen($prod)-1} != '/')
        $prod = $prod.'/';
    if (ENVIRONMENT == 'production'){
        if($prod{strlen($prod)-1} != '/')
            $prod = $prod.'/';
        return $url . $prod;
    }

    if( $_SERVER['SERVER_NAME'] == 'localhost')
        $url .= 'localhost/';
    if($git{strlen($git)-1} != '/')
        $git = $git.'/';
    return $url . $git;
}

//set de la config BDD
function conf_bdd($database){
    if (ENVIRONMENT == 'production') 
        return $database['prod'];
    else
        return $database['localhost'];
}

?>