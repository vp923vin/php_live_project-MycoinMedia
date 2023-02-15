<?php
/*
* Define Admin Module Route
*/
$routes->group('', ['namespace' => 'Modules\Admin\Controllers'], function ($routes) {
   $routes->get('/', 'TestController::index');
   $routes->get('dashboard', 'DashboardController::index');
   // $routes->get('dashboard/tables', 'DashboardController::table');
   $routes->get('logout', 'DashboardController::logout');


   // $routes->get('registeradmin', 'RegisterController::index');
   // $routes->match(['get', 'post'], 'dashboard', 'RegisterController::saveAdminData');
   // $routes->get('login', 'DashboardController::index');


   $routes->get('dashboard/userOrderHistory', 'UserDataController::index');
   $routes->get('dashboard/userProfileData', 'UserDataController::userProfileData');

   
   $routes->get('dashboard/affiliateOrderHistory', 'AffiliateDataController::index');
   $routes->get('dashboard/affiliateProfileData', 'AffiliateDataController::affiliateProfileData');

   $routes->get('dashboard/addProducts', 'ProductsController::index');
   $routes->post('dashboard/added', 'ProductsController::productData');
   $routes->get('dashboard/products', 'ProductsController::editProducts');
   $routes->get('dashboard/editProducts/(:any)', 'ProductsController::getProducts/$1');
   $routes->post('dashboard/products', 'ProductsController::updateProduct');
   $routes->get('dashboard/products/delete-product/(:any)', 'ProductsController::deleteProducts/$1');

   $routes->get('dashboard/addAdmin','AddAdminController::index');
   $routes->post('dashboard/addAdmin','AddAdminController::saveData');


   $routes->get('dashboard/pressRelease','PressReleaseController::index');
   $routes->get('dashboard/editPressRelease/(:any)', 'PressReleaseController::editPressRelease/$1');
   $routes->get('dashboard/deletePressRelease/(:any)', 'PressReleaseController::deletePressRelease/$1');
   $routes->post('dashboard/pressRelease/(:any)','PressReleaseController::updatePressRelease/$1');
   

});
