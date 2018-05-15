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
$route['default_controller'] = 'IndexController';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/

$route['api/example/users/(:num)'] = 'API/example/users/id/$1'; // Example

$route['api'] = 'API/API'; //Liste des routes

//Currencies
$route['api/cryptocurrencies'] = 'API/cryptocurrencies'; // Toutes les crypto-monnaies
$route['api/cryptocurrencies/id/(:num)'] = 'API/cryptocurrencies/$1'; // Monnaie via son id
$route['api/cryptocurrencies/symbol/(.*)'] = 'API/cryptocurrencies/symbol/$3'; // Monnaie via son symbol

//Echanges

$route['api/echanges'] = 'API/echanges'; // Liste les routes d'echanges

//by id
$route['api/echanges/id/(:num)'] = 'API/echanges/id/$1'; // Toutes les echanges d'une monnaie
$route['api/echanges/id/(:num)/limit/(:num)'] = 'API/echanges/id/$1/limit/$2'; // Toutes les echanges d'une monnaie avec une limit
$route['api/echanges/id/(:num)/date/(.*)'] = 'API/echanges/id/$1/date/$2'; // Toutes les echanges d'une monnaie avec une date

//by symbol
$route['api/echanges/symbol/(.*)'] = 'API/echanges/symbol/$1'; // Toutes les echanges d'une monnaie via son symbol
$route['api/echanges/symbol/(.*)/limit/(:num)'] = 'API/echanges/symbol/$1/limit/$2'; // Toutes les echanges d'une monnaie via son symbol avec limit
$route['api/echanges/symbol/(.*)/date/(.*)'] = 'API/echanges/symbol/$1/date/$2'; // Toutes les echanges d'une monnaie via son symbol avec date