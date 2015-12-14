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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['contato/listar'] = 'contato/getContato';
$route['home'] = 'site/index';
$route['filter/(:num)'] = 'site/filterCategoria/$1';
//$route['listagem/post'] = 'site/getPostAll';
$route['listagem/post'] = 'site/getPostAllPagination';
$route['global_links'] = 'site/globalPost';

$route['agenda'] = 'site/agenda';
$route['coberturas'] = 'site/fotos';
$route['top12'] = 'site/topfotos';
$route['blogs'] = 'site/blogs';
$route['login'] = 'site';
/*usuario*/
$route['cadastro'] = 'usuario/cadastro';
$route['cadastrar/insert'] = 'usuario/cadastrar';
$route['login/auth'] = 'usuario/logar';

$route['editar/perfil'] = 'usuario/editarPerfil';
$route['publicar'] = 'usuario/publicar';
$route['publicar/post'] = 'usuario/publicar_post';

/*atualizar perfil*/

$route['editar/perfil/update'] = 'usuario/atualizarConta';

/* visualizar post */
$route['v/(:num)/(:any)']= 'usuario/visualizarPost/$1/$2';
/* Editar post */
$route['editar/post/(:num)']= 'usuario/editar_post/$1';
/* filtrar post por categoria */

/*$route['filter/post/(:num)'] = 'usuario/getPostFilterCategoriaPagination/$1';*/
$route['filter/user/(:num)'] = 'usuario/getPostFilterCategoriaPagination/$1';
// aux 'usuario/getPostFilterByUser/$1';


/* Atualizar post */

$route['atualizar/post'] = 'usuario/atualizarPost';


/* Remover Post */
$route['remover/post/(:num)'] = 'usuario/removerPost/$1';


/* listagem de post */
//$route['listagem/postUser'] = 'usuario/getPostByUser/';
$route['listagem/postUser'] = 'usuario/getPostByUserPaginarion';
$route['mylinks'] = 'usuario/home';

/*-------------- */

$route['foto/ajax_upload/(:any)/(:any)/(:num)/(:num)/(:num)/(:num)'] ='usuario/ajax_upload/$1/$2/$3/$4/$5/$6';

$route['foto/upload'] = 'usuario/upload';
/*visualizar perfil */

$route['perfil/(:any)/(:num)'] = 'usuario/exibirPerfil/$1/$2';
$route['logout'] = 'usuario/logout';

/* Paginas de Erros */

$route['page/error'] = 'usuario/erro';

// teste
$route['teste'] = 'usuario/teste';