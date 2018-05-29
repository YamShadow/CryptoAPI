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
    
    public function coinMarketCap() 
    {
        $url = 'https://api.coinmarketcap.com/v1/ticker/?convert=EUR&limit=0';
        $ext = $this->ext->appelAPI($url);
        $this->CoinMarketCap->traitementCoinMarketCap($ext);

        echo 'Feed coinMarketCap ok !<br/>';
    }

    public function fixer() 
    {
        $endpoint = 'latest';
        $access_key = 'API_KEY';
        if ($access_key != 'API_KEY') {
            $url = 'http://data.fixer.io/api/symbols?access_key='.$access_key;

            $ext = $this->ext->appelAPI($url);
            $this->fixer->addMonnaie($ext->symbols);

            $url = 'http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key;
            $ext = $this->ext->appelAPI($url);
            $this->fixer->AddRates($ext);

            echo 'Feed Fixer ok !<br/>';
        } else {
            echo 'Ajouter votre clé Fixer ! <br>';
        }
    }

    public function redirectDoc() 
    {
        redirect('https://github.com/YamShadow/CryptoAPI');
    }


}
