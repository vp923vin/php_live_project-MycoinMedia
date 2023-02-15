<?php
/*
* Define Affiliate Users Module Route
*/
$routes->group('', ['namespace' => 'Modules\AffiliateUsers\Controllers'], function ($routes) {
  
    
    $routes->get('affiliatedashboard', 'AffiliateDashboardController::index');
    $routes->get('affiliatelogout', 'AffiliateDashboardController::logout');

    $routes->get('affiliatedashboard/companyProfile', 'CompanyProfileController::index');
    $routes->post('affiliatedashboard/companyProfile', 'CompanyProfileController::insertCompanyData');
    $routes->get('viewCompanyData/(:any)', 'CompanyProfileController::viewCompanyData/$1');
    $routes->get('editCompanyData/(:any)', 'CompanyProfileController::editCompanyData/$1');
    $routes->Post('updateCompanyData/(:any)','CompanyProfileController::updateCompanyData/$1');


    $routes->get('affiliatedashboard/prHistory', 'PrHistoryController::index');


    $routes->get('affiliatedashboard/myGallery', 'AffiliateDashboardController::gallery');


    $routes->get('affiliatedashboard/paymentHistory', 'PaymentHistoryController::index');


    $routes->get('affiliatedashboard/submitPr', 'AffiliateDashboardController::submitPr');


    $routes->get('affiliatedashboard/myPressRelease', 'MyPressReleaseController::index');
    $routes->get('view/(:any)', 'MyPressReleaseController::viewPress/$1');
    $routes->get('addNote/(:any)', 'MyPressReleaseController::AddNote/$1');
    $routes->post('addingNote/(:any)', 'MyPressReleaseController::Noteadded/$1');
    $routes->get('addCompanyLink/(:any)', 'MyPressReleaseController::addCompanyLink/$1');
    $routes->Post('linkAdded/(:any)', 'MyPressReleaseController::linkAdded/$1');


    $routes->get('affiliatedashboard/myProfile', 'ProfileController::index');
    $routes->post('affiliatedashboard/myProfile','ProfileController::update_profile_data');


    // adding money into wallet routes
    $routes->get('affiliatedashboard/addMoney', 'WalletController::index');
    $routes->post('affiliatedashboard/added', 'WalletController::addWalletMoney');
});