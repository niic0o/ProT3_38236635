<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* Ejemplo:
$routes->get(llamada desde navbar_view, 'Controlador::llamada a la funcion');

*/
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('acerca_de','Home::acerca_de');
//antiguo login $routes->get('login', 'Home::login');
$routes->get('catalogo', 'Home::catalogo');
/* rutas del Registro de Usuarios */
$routes->get('/registro','usuario_controller::create');
$routes->post('/enviar-form','usuario_controller::formValidation');
/* rutas del usuario logueado */
//---Admin----
$routes->get('/listado','usuario_controller::verUsuarios');//permite ver listado de usuarios registrados
$routes->get('/listado_de_eliminados','usuario_controller::verUsuariosEliminados');
$routes->post('/reestablecer_usuario','usuario_controller::reestablecer_usuario');
//---Admin y Usuario----
$routes->post('/buscar_usuario', 'usuario_controller::buscar_usuario');
$routes->post('/editar_usuario','usuario_controller::editar_usuario');
$routes->post('/eliminar_usuario','usuario_controller::eliminar_usuario');
//---Usuario----
$routes->get('/darme_de_baja','usuario_controller::darme_de_baja');

/* rutas del login */
$routes->get('/login', 'login_controller::index');
$routes->post('/enviarlogin','login_controller::auth');
$routes->get('/panel', 'panel_controller::index',['filter'=> 'auth']);//llama al alias auth de filters.php
$routes->get('/logout', 'login_controller::logout');

/* 
 * Habrá momentos en que necesitarás rutas adicionales y necesitarás 
 * que puedan anular cualquier valor predeterminado en este archivo. 
 * Las rutas basadas en entornos son un ejemplo de esto. require() 
 * archivos de rutas adicionales aquí para que suceda. 
 * 
 * Tendrás acceso al objeto $routes dentro de ese archivo sin 
 * necesidad de recargarlo. 
 */

 if(is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')){
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
 }