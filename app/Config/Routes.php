<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// $routes->get('/', 'Publicom::connexion', ['as' => 'connexion'] );

service('auth')->routes($routes);

$routes->get('gestion-clients', 'Clients::client', ['as' => 'liste_client']);

$routes->get('ajout-clients', 'Clients::ajout', ['as' => 'ajout_client']);
$routes->post('ajout-clients', 'Clients::create', ['as' => 'create_client']);

$routes->get('modif-clients-(:num)', 'Clients::modif/$1', ['as' => 'modif_client']);
$routes->post('modif-clients', 'Clients::update', ['as' => 'update_client']);

$routes->post('suppr-clients', 'Clients::delete',  ['as' => 'suppr_client']);
// $routes->get('suppr-clients', 'Clients::delete',  ['as' => 'suppr_client']);

//-----------------------------------------------------------------------------------------------
$routes->get('gestion-panneaux', 'Panneau::panneau', ['as'=>'liste-panneau']);

$routes->get('ajout-panneaux', 'Panneau::ajout', ['as' => 'ajout_panneau']);
$routes->post('ajout-panneaux', 'Panneau::create', ['as' => 'create_panneaux']);

$routes->get('modif-panneau-(:num)', 'Panneau::modif/$1', ['as' => 'modif_panneau']);
$routes->post('update-panneau', 'Panneau::update', ['as' => 'update_panneau']);

// $routes->get('suppr-panneaux-(:num)', 'Panneau::delete/$1',  ['as' => 'suppr_panneau']);
$routes->post('suppr-panneaux', 'Panneau::delete',  ['as' => 'suppr_panneau']);

//-------------------------------------------------------------------------------------------------------
$routes->get('/', 'Message::message',['as'=>'liste-message']);

$routes->get('ajout-messages', 'Message::ajout', ['as' => 'ajout_message']);
$routes->post('ajout-messages', 'Message::create', ['as' => 'create_message']);

$routes->get('modif-messages-(:num)', 'Message::modif/$1', ['as' => 'modif_message']);
$routes->post('modif-messages', 'Message::update', ['as' => 'update_message']);

// $routes->get('suppr-messages-(:num)', 'Message::delete/$1',  ['as' => 'suppr_message']);
$routes->post('suppr-messages-(:num)', 'Message::delete/$1',  ['as' => 'suppr_message']);


$routes->get('visualisation-messages', 'Message::visualisation',['as'=>'visu_message']);

$routes->get('contact', 'Publicom::contact');
$routes->post('contact', 'Publicom::create');
