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
$route['default_controller'] = 'beranda/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';

$route['beranda'] = 'beranda/index';

$route['info/wadah'] = 'beranda/info_wadah';
$route['info/wadah/(:any)'] = 'beranda/info_show_wadah/$1';

$route['wadah'] = 'wadah/index';
$route['wadah/create'] = 'wadah/create';
$route['wadah/store'] = 'wadah/store';
$route['wadah/show/(:any)'] = 'wadah/show/$1';
$route['wadah/edit/(:any)'] = 'wadah/edit/$1';
$route['wadah/update/(:any)'] = 'wadah/update/$1';
$route['wadah/destroy/(:any)'] = 'wadah/destroy/$1';

$route['pengguna'] = 'pengguna/index';
$route['pengguna/create'] = 'pengguna/create';
$route['pengguna/store'] = 'pengguna/store';
$route['pengguna/edit/(:any)'] = 'pengguna/edit/$1';
$route['pengguna/update/(:any)'] = 'pengguna/update/$1';
$route['pengguna/destroy/(:any)'] = 'pengguna/destroy/$1';

/*
$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
*/
