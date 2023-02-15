<?php
/*
* Define Auth Module Route
*/
$routes->group('', ['namespace' => 'Modules\Auth\Controllers'], function ($routes) {
   $routes->get('login', 'LoginController::index');
   $routes->match(['get', 'post'], 'success', 'LoginController::login');

   $routes->get('affiliateRegister', 'RegisterController::affiliateUser');
   $routes->match(['get', 'post'], 'login', 'RegisterController::saveData');

   $routes->get('userRegister', 'RegisterController::user');
   $routes->match(['get', 'post'], 'login', 'RegisterController::saveData',);

   $routes->get('forgetPassword', 'LoginController::forgetPassword');
   $routes->post('forgetPassword/resetPassword','LoginController::resetPassword');
   $routes->get('resetPassword','LoginController::resetPass');
   $routes->post('updatePassword', 'LoginController::updatePassword');
});
