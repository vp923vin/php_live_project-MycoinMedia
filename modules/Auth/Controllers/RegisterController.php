<?php
/*
*  Auth Module Login Controller
*/

namespace Modules\Auth\Controllers;
use CodeIgniter\Controller;
use Modules\Auth\Models\RegisterModel;

class RegisterController extends Controller
{
    public function index(){
        return view('../../modules/Auth/Views/adminRegister');
    }

    public function user(){
        return view('../../modules/Auth/Views/userRegister');
    }

    public function affiliateUser(){
        return view('../../modules/Auth/Views/affiliateRegister');
    }

    public function saveData(){
        $model = new RegisterModel();
        $data =['user_name'     => $this->request->getVar('user_name'),
                'user_email'    => $this->request->getVar('user_email'),
                'user_mobile'   => $this->request->getVar('user_mobile'),
                'user_password' => md5($this->request->getVar('user_password')),
                'user_address'  => $this->request->getVar('user_address'),
                'user_country'  => $this->request->getVar('user_country'),
                'user_role'     => $this->request->getVar('user_role')
            ];
        
        $result = $model->insertData($data);


        //  setting email configuration for user to get an email of Regisration confirmation.
        $to = ''.$data['user_email'].'';
        $subject = 'Registration';
        $message = 'Hi '.$data['user_name'].',<br><br>You have registered with us!.<br><br>Thank you & Regards,<br>Mycoinmedia';

        // calling email services
        $email = \Config\Services::email();
        $email->setFrom('info@MyCoinMedia.com', 'Info');
        $email->setTo($to);
        // $email->setBCC('somebcc@gmail.com');
        // $email->setCC('somecc@gmail.com');
        $email->setSubject($subject);
        $email->setMessage($message);

        // use this ($email->send()) only one time. If you use multiple time then it will show the error 
        if($result && $email->send()){
            session()->setFlashdata('reg-success', 'Registered successfully, Please Continue to Login.');
            return redirect()->to('/login');
        }else{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
        
       
    }
   
}