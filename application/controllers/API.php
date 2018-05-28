<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class API extends REST_Controller 
{

    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");
        parent::__construct();
        $this->load->model('SQL', 'sql');
        $this->load->model('API_model', 'api');
        $this->load->driver('cache',
            array('adapter' => 'apc', 'backup' => 'file', 'key_prefix' => 'api_')
        );

        if($this->api->getEtat() == 1) {
            $this->set_response(uniformisationReponse(false, null, 'Too much request. Come back tomorrow.'), REST_Controller::HTTP_NOT_FOUND);
        } elseif($this->api->getEtat() == 2) {
            $this->load->view('forkBomb');
        }
    }

    function index_get() 
    {
        $url = array(
            'cryptocurrencies' => BASE_URL.'cryptocurrencies',
            'cryptocurrencies_id' => BASE_URL.'cryptocurrencies/id/{number}',
            'cryptocurrencies_symbol' => BASE_URL.'cryptocurrencies/sombol/{String}',
            'echange' => BASE_URL.'echanges',
            'echange_id' => BASE_URL.'echanges/id/{number}',
            'echange_id_limit' => BASE_URL.'echanges/id/{number}/limit/{number}',
            'echange_id_date' => BASE_URL.'echanges/id/{number}/date/{date}',
            'echange_symb' => BASE_URL.'echanges/symbol/{String}',
            'echange_symb_limit' => BASE_URL.'echanges/symbol/{String}/limit/{number}',
            'echange_symb_date' => BASE_URL.'echanges/symbol/{String}/date/{date}',
            'echange_top' => BASE_URL.'echanges/top/{1h|24h|7d}',
            'echange_top_limit' => BASE_URL.'echanges/top/{1h|24h|7d}/limit/{number}',
            'echange_top_date' => BASE_URL.'echanges/top/{1h|24h|7d}/date/yyyy-mm-dd',
            'echange_top_date_limit' => BASE_URL.'echanges/top/{1h|24h|7d}/date/yyyy-mm-dd/limit/{number}',
            'historiques' => BASE_URL.'historiques',
            'historiques_id' => BASE_URL.'historiques/id/{number}',
            'historiques_id_limit' => BASE_URL.'historiques/id/{number}/limit/{number}',
            'historiques_id_date' => BASE_URL.'historiques/id/{number}/date/{date}',
            "historiques_id_date_limit": BASE_URL."historiques/id/{number}/date/{date}/limit/{number}",
            'historiques_symb' => BASE_URL.'historiques/symbol/{String}',
            'historiques_symb_limit' => BASE_URL.'historiques/symbol/{String}/limit/{number}',
            'historiques_symb_date' => BASE_URL.'historiques/symbol/{String}/date/{date}',
            "historiques_symb_date_limit": BASE_URL."historiques/symbol/{String}/date/{date}/limit/{number}",
        );

       // $this->set_response($url, REST_Controller::HTTP_OK);

    }

    function cryptocurrencies_get(){

        $where = $this->sql->getWhere($this->get('id'), $this->get('symbol'));

        $sql = array(
            'table' => 'monnaie_crypto',
            'where' => $where
        );

        $data = $this->sql->getCache('cryptoAll', $sql);

        $currencies = ($where) ? $this->sql->getBDD($sql) : $data;
       
        if($this->api->getEtat() == 0) {
            if($currencies)
                $this->set_response(uniformisationReponse(true, $currencies), REST_Controller::HTTP_OK);
            else 
                $this->set_response(uniformisationReponse(false, null, 'Check your request'), REST_Controller::HTTP_NOT_FOUND);
        }

        return;
        
    }

    function echanges_get() 
    {

        $limit = $this->sql->getLimit($this->get('limit'));
        $where = $this->sql->getWhere($this->get('id'), $this->get('symbol'));
        $top = strtolower($this->get('top'));

        if (isset($date) && $date) {
            $date = explode("-", $this->get('date'));
        }
        else {
            $date = array(date("Y"), date("m"), date("d"));
        }

        if (isset($top) && $top) {
            if(in_array($top, array('1h', '24h', '7d'))) {
                $name = 'echange_'.$top.'_'.$limit;

                $sql = array(
                    'select' => 'monnaie_crypto.*, echange.*, max('.$top.') as top', 
                    'table' => 'echange',
                    'join' => array(
                        0 => array(
                            'champsTable' => 'idMonnaieCrypto',
                            'table' => 'monnaie_crypto',
                            'champs' => 'id',
                            'sens' => 'right'
                        ),
                    ),
                    'where' => array(
                        0 => array(
                            'champs' => 'year(last_update)',
                            'value' => $date[0]
                        ),
                        1 => array(
                            'champs' => 'month(last_update)',
                            'value' => $date[1]
                        ),
                        2 => array(
                            'champs' => 'day(last_update)',
                            'value' => $date[2]
                        ),
                    ),
                    'group' => array( 
                        0 => array( 
                            'champs' => 'monnaie_crypto.id' 
                        ), 
                    ), 
                    'order' => array(
                        0 => array(
                            'champs' => 'top',
                            'order' => 'DESC',
                        ),
                        1 => array(
                            'champs' => $top,
                            'order' => 'DESC',
                        ),
                    ),
                    'limit' => $limit
                );

                $data = $this->sql->getCache($name, $sql);

                if($this->api->getEtat() == 0) {
                    if (isset($data)) {

                        if ($data)
                            $this->set_response(uniformisationReponse(true, $data), REST_Controller::HTTP_OK);
                        else
                            $this->set_response(uniformisationReponse(false, null, 'Check your request'), REST_Controller::HTTP_NOT_FOUND);
                        
                        return;
                    }
                }
            }
            else{
                $url = [
                    'echange_top' => BASE_URL.'echanges/top/{1h|24h|7d}',
                    'echange_top_limit' => BASE_URL.'echanges/top/{1h|24h|7d}/limit/{number}',
                    'echange_top_date' => BASE_URL.'echanges/top/{1h|24h|7d}/date/yyyy-mm-dd',
                    'echange_top_date_limit' => BASE_URL.'echanges/top/{1h|24h|7d}/date/yyyy-mm-dd/limit/{number}',
                ];
        
                if($this->api->getEtat() == 0) 
                    $this->set_response($url, REST_Controller::HTTP_OK);

                return;
            }
        }

        if (isset($where) && $where) {

            $name = 'echange_'.$where[0]['value'].'_'.$limit;

            $sql = array(
                'table' => 'monnaie_crypto',
                'join' => array(
                    0 => array(
                        'table' => 'echange',
                        'champs' => 'idMonnaieCrypto',
                        'sens' => 'left'
                    ),
                ),
                'where' => $where,
                'order' => array(
                    0 => array(
                        'champs' => "last_update",
                        'order' => 'DESC',
                    ),
                ),
                'limit' => $limit
            );

            $data = $this->sql->getCache($name, $sql);

            if($this->api->getEtat() == 0) {
                if (isset($data)) {

                    if ($data)
                        $this->set_response(uniformisationReponse(true, $data), REST_Controller::HTTP_OK);
                    else
                        $this->set_response(uniformisationReponse(false, null, 'Check your request'), REST_Controller::HTTP_NOT_FOUND);
                    
                    return;
                }
            }
        }

        $url = [
            'echange_id' => BASE_URL.'echanges/id/{number}',
            'echange_id_limit' => BASE_URL.'echanges/id/{number}/limit/{number}',
            'echange_id_date' => BASE_URL.'echanges/id/{number}/date/{date}',
            'echange_symb' => BASE_URL.'echanges/symbol/{String}',
            'echange_symb_limit' => BASE_URL.'echanges/symbol/{String}/limit/{number}',
            'echange_symb_date' => BASE_URL.'echanges/symbol/{String}/date/{date}',
            'echange_top' => BASE_URL.'echanges/top/{1h|24h|7d}',
            'echange_top_limit' => BASE_URL.'echanges/top/{1h|24h|7d}/limit/{number}',
            'echange_top_date' => BASE_URL.'echanges/top/{1h|24h|7d}/date/yyyy-mm-dd',
            'echange_top_date_limit' => BASE_URL.'echanges/top/{1h|24h|7d}/date/yyyy-mm-dd/limit/{number}',
        ];

        if($this->api->getEtat() == 0) 
            $this->set_response($url, REST_Controller::HTTP_OK);
        
        return;
    }

    function historiques_get() {

        $limit = $this->sql->getLimit($this->get('limit'));
        $where = $this->sql->getWhere($this->get('id'), $this->get('symbol'));

        if (isset($where)) {

            $name = 'histo_'.$where[0]['value'].'_'.$limit;

            $sql = array(
                'table' => 'monnaie_crypto',
                'join' => array(
                    0 => array(
                        'table' => 'historique_prix',
                        'champs' => 'idMonnaieCrypto',
                        'sens' => 'left'
                    ),
                ),
                'where' => $where,
                'order' => array(
                    0 => array(
                        'champs' => "last_update",
                        'order' => 'DESC',
                    ),
                ),
                'limit' => $limit
            );

            $data = $this->sql->getCache($name, $sql);

            if($this->api->getEtat() == 0) {
                if (isset($data)) {

                    if ($data)
                        $this->set_response(uniformisationReponse(true, $data), REST_Controller::HTTP_OK);
                    else
                        $this->set_response(uniformisationReponse(false, null, 'Check your request'), REST_Controller::HTTP_NOT_FOUND);
                
                    return;
                }
            }
        }

        $url = [
            'historiques_id' => BASE_URL.'/api/historiques/id/{number}',
            'historiques_id_limit' => BASE_URL.'/api/historiques/id/{number}/limit/{number}',
            'historiques_id_date' => BASE_URL.'/api/historiques/id/{number}/date/{date}',
            "historiques_id_date_limit": BASE_URL."historiques/id/{number}/date/{date}/limit/{number}",
            'historiques_symb' => BASE_URL.'historiques/symbol/{String}',
            'historiques_symb_limit' => BASE_URL.'historiques/symbol/{String}/limit/{number}',
            'historiques_symb_date' => BASE_URL.'historiques/symbol/{String}/date/{date}',
            "historiques_symb_date_limit": BASE_URL."historiques/symbol/{String}/date/{date}/limit/{number}",
        ];
        if($this->api->getEtat() == 0)
            $this->set_response($url, REST_Controller::HTTP_OK);

        return;

    }

}
