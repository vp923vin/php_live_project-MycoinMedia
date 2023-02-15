<?php
/*
* Define Users Module Route
*/
$routes->group('', ['namespace' => 'Modules\Users\Controllers'], function ($routes) {

    // before session: basic web pages and after session : billing and basic info. 
    $routes->get('', 'MyCoinMediaController::index');
    $routes->get('about', 'MyCoinMediaController::about');
    $routes->get('pricing', 'MyCoinMediaController::pricing');
    $routes->get('billing/(:any)', 'MyCoinMediaController::billing/$1');
    $routes->post('stripepayment/(:any)','StripeController::stripe/$1');
    $routes->post('payment','StripeController::payment');



    // After session :  user dashboard. 
    $routes->get('userdashboard', 'UserDashboardController::index');
    // $routes->get('userdashboard/payHistory','UserDashboardController::payHistory');
    

    $routes->get('userdashboard/companyProfile', 'CompanyProfileController::index');
    $routes->post('userdashboard/companyProfile', 'CompanyProfileController::insertCompanyData');
    $routes->get('userdashboard/viewCompanyData/(:any)', 'CompanyProfileController::viewCompanyData/$1');
    $routes->get('userdashboard/editCompanyData/(:any)', 'CompanyProfileController::editCompanyData/$1');
    $routes->Post('userdashboard/updateCompanyData/(:any)','CompanyProfileController::updateCompanyData/$1');


    $routes->get('userdashboard/prHistory', 'PrHistoryController::index');


    $routes->get('userdashboard/myGallery', 'UserDashboardController::gallery');


    $routes->get('userdashboard/payHistory', 'PaymentHistoryController::index');
    

    $routes->get('userdashboard/submitPr', 'UserDashboardController::submitPr');


    $routes->get('userdashboard/myPressRelease', 'MyPressReleaseController::index');
    $routes->get('userdashboard/view/(:any)', 'MyPressReleaseController::viewPress/$1');
    $routes->get('userdashboard/addNote/(:any)', 'MyPressReleaseController::AddNote/$1');
    $routes->post('userdashboard/addingNote/(:any)', 'MyPressReleaseController::Noteadded/$1');
    $routes->get('userdashboard/addCompanyLink/(:any)', 'MyPressReleaseController::addCompanyLink/$1');
    $routes->Post('userdashboard/linkAdded/(:any)', 'MyPressReleaseController::linkAdded/$1');


    $routes->get('userdashboard/myProfile', 'ProfileController::index');
    $routes->post('userdashboard/myProfile','ProfileController::update_profile_data');
    

    $routes->get('userlogout', 'UserDashboardController::logout');

   
    
});