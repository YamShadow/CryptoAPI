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
	}

	public function index() {
		$this->coinMarketCap();
    }
    
    public function coinMarketCap() {
        $url = 'https://api.coinmarketcap.com/v1/ticker/?convert=EUR&limit=0';
        $ext = $this->ext->appelAPI($url);
        $this->CoinMarketCap->traitementCoinMarketCap($ext);

        echo 'Feed ok !';
        
    }




}
