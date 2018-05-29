<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Feed qui permet de remplir la BDD
 * Appel via un cronTab
 */

class FeedController extends CI_Controller {

    /**
     * Constructeur de la class
     */
    function __construct() {
        parent::__construct();
        $this->load->model('APIExterne/Exterieur', 'ext');
        $this->load->model('APIExterne/CoinMarketCap', 'CoinMarketCap');
        $this->load->model('APIExterne/Fixer', 'fixer');
	}


	public function index() {
        $this->coinMarketCap();
        $this->fixer();
    }
    
    //Methode qui regroupe le Feed de l'API Coin Market Cap
    public function coinMarketCap() 
    {
        $url = 'https://api.coinmarketcap.com/v1/ticker/?convert=EUR&limit=0';
        $ext = $this->ext->appelAPI($url);
        $this->CoinMarketCap->traitementCoinMarketCap($ext);

        echo 'Feed coinMarketCap ok !<br/>';
    }

    //Methode qui regroupe le Feed de l'API Fixer
    public function fixer() 
    {
        $endpoint = 'latest';
        $access_key = 'API_KEY';
        //Check si la clé est remplie
        if ($access_key != 'API_KEY') {

            //Récupération de la liste des monnaies fiduciaires
            $url = 'http://data.fixer.io/api/symbols?access_key='.$access_key;

            $ext = $this->ext->appelAPI($url);
            $this->fixer->addMonnaie($ext->symbols);

            //Récuperation des taux d'echanges
            $url = 'http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key;
            $ext = $this->ext->appelAPI($url);
            $this->fixer->AddRates($ext);

            echo 'Feed Fixer ok !<br/>';
        } else 
            echo 'Ajouter votre clé Fixer ! <br>';

    }

    //Redirection vers la doc présente sur GitHub
    public function redirectDoc() 
    {
        redirect('https://github.com/YamShadow/CryptoAPI');
    }


}
