<?php

/*
*  Admin Module Dashboard Controller
*/

namespace Modules\Admin\Controllers;
use CodeIgniter\Controller;

class DashboardController extends Controller{
    public function index()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }
        return view('../../modules/Admin/Views/dashboard');
    }
    public function table()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }
        return view('../../modules/Admin/Views/dashboard/table');
    }

    public function logout()
    {
        if(session()->has('logged_in_admin')){
            session()->remove('logged_in_admin');
            session()->destroy();
            return redirect()->to(base_url() . '/login');
        }
        
    }
}