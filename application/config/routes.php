<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'home';
$route['404_override']       = '';

$route['login']             = 'account/login';
$route['logout']            = 'account/logout';
$route['register']          = 'account/register';
$route['renew']             = 'account/renew';
$route['change_password']   = 'account/change_password';
$route['forgot_password']   = 'account/forgot_password';
$route['category/(:num)']   = 'content/category/index/$1';
$route['page/(:num)']       = 'content/page/index/$1';
$route['favorites']         = 'content/favorites';
$route['pdfs']              = 'content/pdfs';
$route['history']           = 'content/history';
$route['add_page']          = 'admin/add_page';
$route['add_pdf']           = 'admin/add_pdf';
$route['about']             = 'home/about';
$route['contact']           = 'home/contact';
$route['view_pdf/([a-z0-9]{32})']       = 'content/view_pdf/index/$1';
$route['add_to_favorites/(:num)']       = 'content/favorites/add/$1';
$route['remove_from_favorites/(:num)']  = 'content/favorites/remove/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
