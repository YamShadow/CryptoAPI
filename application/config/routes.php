<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
*/

/*
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'API';
$route['translate_uri_dashes'] = FALSE;
$route['FeedController'] = 'FeedController'; // Feed

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

//Example
$route['api/example/users/(:num)'] = 'API/example/users/id/$1'; // Example

//$route['api'] = 'API/'; //Liste des routes

//Currencies by id and symbol
$route['cryptocurrencies'] = 'API/cryptocurrencies'; // Toutes les crypto-monnaies
$route['cryptocurrencies/id/(:num)'] = 'API/cryptocurrencies/id/$1'; // Monnaie via son id
$route['cryptocurrencies/symbol/(.*)'] = 'API/cryptocurrencies/symbol/$1'; // Monnaie via son symbol

//Echanges
$route['echanges'] = 'API/echanges'; // Liste les routes d'echanges

//Echanges by id
$route['echanges/id/(:num)'] = 'API/echanges/id/$1'; // Toutes les echanges d'une monnaie
$route['echanges/id/(:num)/limit/(:num)'] = 'API/echanges/id/$1/limit/$2'; // Toutes les echanges d'une monnaie avec une limit
$route['echanges/id/(:num)/date/(.*)'] = 'API/echanges/id/$1/date/$2'; // Toutes les echanges d'une monnaie avec une date

//Echanges by symbol
$route['echanges/symbol/(.*)'] = 'API/echanges/symbol/$1'; // Toutes les echanges d'une monnaie via son symbol
$route['echanges/symbol/(.*)/limit/(:num)'] = 'API/echanges/symbol/$1/limit/$2'; // Toutes les echanges d'une monnaie via son symbol avec limit
$route['echanges/symbol/(.*)/date/(.*)'] = 'API/echanges/symbol/$1/date/$2'; // Toutes les echanges d'une monnaie via son symbol avec date

//Historiques
$route['historiques'] = 'API/historiques'; // Liste des routes d'historiques

//Hitorique by id
$route['historiques/id/(:num)'] = 'API/historiques/id/$1'; // Toutes les historiques d'une monnaie
$route['historiques/id/(:num)/limit/(:num)'] = 'API/historiques/id/$1/limit/$2'; // Toutes les historiques d'une monnaie avec une limit
$route['historiques/id/(:num)/date/(.*)'] = 'API/historiques/id/$1/date/$2'; // Toutes les historiques d'une monnaie avec une date

//Historique by symbol
$route['historiques/symbol/(.*)'] = 'API/historiques/symbol/$1'; // Toutes les historiques d'une monnaie via son symbol
$route['historiques/symbol/(.*)/limit/(:num)'] = 'API/historiques/symbol/$1/limit/$2'; // Toutes les historiques d'une monnaie via son symbol avec limit
$route['historiques/symbol/(.*)/date/(.*)'] = 'API/historiques/symbol/$1/date/$2'; // Toutes les historiques d'une monnaie via son symbol avec date

$route['(.*)'] = "API";

//Top 5 des crypto-monnaies en fonction des échanges
$route['echanges/top/(.*)'] = 'API/echanges/top/$1';