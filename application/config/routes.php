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

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['artiste'] = "artiste_controller/index";
$route['artiste/(:num)'] = "artiste_controller/index/$1";

$route['ile'] = "ile_controller/index";
$route['ile/(:num)'] = "ile_controller/index/$1";

$route['genre'] = "genre_controller/index";
$route['genre/(:num)'] = "genre_controller/index/$1";

$route['recherche'] = "recherche_controller/index";
$route['recherche/resultat'] = "recherche_controller/resultat";
$route['recherche/(:any)'] = "recherche_controller/index/$1";

/*
* routes ajax
*/
$route['ajax/AddVueClip'] = "ajax_controller/AddVueClip";
$route['ajax/LienMort'] = "ajax_controller/LienMort";
$route['ajax/SwitchActive'] = "beyond/ajax_controller/SwitchActive";
$route['ajax/DeleteEntity'] = "beyond/ajax_controller/DeleteEntity";

$route['ajax/EditArtiste'] = "beyond/ajax_controller/EditArtiste";
$route['ajax/NewArtiste'] = "beyond/ajax_controller/NewArtiste";

$route['ajax/EditGenre'] = "beyond/ajax_controller/EditGenre";
$route['ajax/NewGenre'] = "beyond/ajax_controller/NewGenre";

$route['ajax/EditIle'] = "beyond/ajax_controller/EditIle";
$route['ajax/NewIle'] = "beyond/ajax_controller/NewIle";

$route['ajax/EditClip'] = "beyond/ajax_controller/EditClip";
$route['ajax/NewClip'] = "beyond/ajax_controller/NewClip";

$route['ajax/Connexion'] = "beyond/ajax_controller/Connexion";
$route['ajax/Deconnexion'] = "beyond/ajax_controller/Deconnexion";

/*
* routes back
*/
$route['beyond'] = "beyond/beyond_controller";
$route['beyond/setdatabase'] = "beyond/beyond_controller/set_database";

$route['beyond/artiste'] = "beyond/artiste_controller/index";
$route['beyond/artiste/(:num)'] = "beyond/artiste_controller/index/$1";
$route['beyond/artiste/edit/(:num)'] = "beyond/artiste_controller/edit/$1";
$route['beyond/artiste/new'] = "beyond/artiste_controller/newArtiste";

$route['beyond/clip'] = "beyond/clip_controller/index";
$route['beyond/clip/(:num)'] = "beyond/clip_controller/index/$1";
$route['beyond/clip/edit/(:num)'] = "beyond/clip_controller/edit/$1";
$route['beyond/clip/new'] = "beyond/clip_controller/newClip";

$route['beyond/genre'] = "beyond/genre_controller/index";
$route['beyond/genre/(:num)'] = "beyond/genre_controller/index/$1";
$route['beyond/genre/edit/(:num)'] = "beyond/genre_controller/edit/$1";
$route['beyond/genre/new'] = "beyond/genre_controller/newGenre";

$route['beyond/ile'] = "beyond/ile_controller/index";
$route['beyond/ile/(:num)'] = "beyond/ile_controller/index/$1";
$route['beyond/ile/edit/(:num)'] = "beyond/ile_controller/edit/$1";
$route['beyond/ile/new'] = "beyond/ile_controller/newIle";

/* End of file routes.php */
/* Location: ./application/config/routes.php */