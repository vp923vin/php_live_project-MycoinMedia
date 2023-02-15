<?php

/*
*  Admin Module Add Admin Controller
*/

namespace Modules\Admin\Controllers;
use CodeIgniter\Controller;
use Modules\Auth\Models\RegisterModel;

class AddAdminController extends Controller
{
    public function index(){
        return view('../../modules/Admin/Views/dashboard/addAdmin');
    }

    public function saveData(){
        $model = new RegisterModel();
        $data =['user_name'     => $this->request->getVar('user_name'),
                'user_email'    => $this->request->getVar('user_email'),
                'user_mobile'   => $this->request->getVar('user_mobile'),
                'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT),
                'user_address'  => $this->request->getVar('user_address'),
                'user_country'  => $this->request->getVar('user_country'),
                'user_role'     => $this->request->getVar('user_role')
            ];
        $result = $model->insertData($data);

        $session = session();
        if($result)
        {
            $session->setFlashdata('add-admin', 'New admin successfully added!');
            return redirect()->to('/dashboard/addAdmin'); 
        }
        // return redirect()->to('/login');
       
    }
    // public function showUserData(){
    //     $model = new RegisterModel();
    //     $result = $model->userData();
    // }
}