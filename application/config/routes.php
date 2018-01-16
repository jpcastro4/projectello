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
$route['default_controller'] = "index";
$route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;

$route['politicas'] = 'index/politicas';

$route['ativacao/(:num)'] = 'index/ativacao/$1';
$route['valida/(:any)'] = 'index/valida/$1';

$route['cadastrar'] = 'painel/cadastrar';

$route['amigo/(:any)'] = 'painel/amigo/$1';
$route['linkunico/amigo/(:any)'] = 'painel/linkunico/$1';

$route['manutencao'] = 'index/manutencao';
$route['comprovante'] = 'painel/painel/enviarComprovante';

$route['lista'] = 'index/lista';
$route['desatualizados'] = 'index/listadesatualizados';

$route['aptos'] = 'index/aptos';
$route['totais'] = 'index/totais';
$route['doacoes'] = 'index/doacoes';
$route['rede'] = 'index/rede';

$route['login'] = 'index/login';
$route['esqueci'] = 'index/esqueci';
$route['sair'] = 'index/sair';

$route['boadmin/usuario/editar/(:num)'] = 'boadmin/editar_usuario/$1';

$route['boadmin/emails/novo'] = 'boadmin/novo_email';
$route['boadmin/emails/editar/(:num)'] = 'boadmin/editar_email/$1';
$route['boadmin/emails/visualizar/(:num)'] = 'boadmin/visualizar_email/$1';

$route['painel/publicador/novo'] = 'painel/publicador_novo';



//API
