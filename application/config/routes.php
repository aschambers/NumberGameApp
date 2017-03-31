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
$route['default_controller'] = "dashes";
$route['home'] = "dashes";
$route['sign'] = "/dashes/sign";
$route['sign_in'] = "/dashes/sign_in";
$route['add'] = "/dashes/add";
$route['register'] = "/dashes/register_new";
$route['login_success'] = "/dashes/login_success";
$route['dashboard'] = "/dashboards";
$route['log_off'] = "/dashboards/log_out";
$route['admin'] = "/dashboards/admin";
$route['new'] = "/dashboards/new_add";
$route['create'] = "/dashboards/create";
$route['dash_home'] = "/dashboards";
$route['edit'] = "/dashboards/edit_user";
$route['edit_info'] = "/dashboards/edit_info";
$route['edit_info_profile'] = "/dashboards/edit_info_profile";
$route['edit_password'] = "/dashboards/edit_pass";
$route['edit_description'] = "/dashboards/edit_description";
$route['post_message'] = "/dashboards/new_message";
$route['post_comment'] = "/dashboards/new_comment";
$route['remove'] = "/dashboards/remove";
$route['profile/(:any)'] = "/dashboards/profile/$1";
$route['edit_profile/(:any)'] = "/dashboards/edit_profile/$1";
$route['edit_user'] = "dashboards/edit_user";
$route['404_override'] = '';
