<?php

/*
*  Users Module User Dashboard Controller
*/

namespace Modules\Users\Controllers;
use CodeIgniter\Controller;
use Modules\Users\Models\OrderDataModel;
use Modules\Users\Models\ProfileModel;


class UserDashboardController extends Controller
{
    public function index(){
        if(!session()->has('logged_in_user')){
            return redirect()->to('/login');
        }
        return view('../../modules/Users/Views/dashboard/userdashboard');
    }

    public function gallery(){

        if(!session()->has('logged_in_user')){
            return redirect()->to('/login');
        }

        return view('../../modules/Users/Views/dashboard/myGallery');
    }

    public function logout()
    {
        if(session()->has('logged_in_user')){
            session()->remove('logged_in_user');
            session()->destroy();
            return redirect()->to(base_url() . '/login');
        }
        
    }
   
}