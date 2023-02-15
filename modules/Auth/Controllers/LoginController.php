<?php

/*
*  Auth Module Login Controller
*/

namespace Modules\Auth\Controllers;

use CodeIgniter\Controller;
use Modules\Auth\Models\AuthModel;
use \DrewM\MailChimp\MailChimp;

class LoginController extends Controller
{
    public function index()
    {
        return view('../../modules/Auth/Views/login');
    }

   
    
    public function login()
    {
        $session  = session();
        $model    = new AuthModel();
        $email    = $this->request->getVar('user_email');
        $password = $this->request->getVar('user_password');
        $role     = $this->request->getVar('user_role');
        $data     = $model->where('user_email', $email)->first();
        
    
    
        // mailchimp Intgeration code
        require 'app/Libraries/MailChimp.php';

        // optional these two files if want to use then remove from comment
        // include 'app/Libraries/Batch.php';
        // include 'app/Libraries/Webhook.php';
        
        // update MailChimp API key 
        $MailChimp = new MailChimp('5ca7359ece35150004c5dca61bcb2809-us11'); 
        $result = $MailChimp->get('lists');      

        // subscribe the customer 
        $list_id = '5c6b511418' ; //your mailchimp list id 
        $result = $MailChimp->post("lists/$list_id/members", [
            'email_address' => ''.$email.'',
            'status'        => 'subscribed',
        ]);  

        // echo '<pre>';
        // print_r($result);
        // echo "</pre>";exit;
        if ($MailChimp->success())
        {
            // print_r($result);
            echo ''.$result['status'].'';
        }else 
        {
            echo $MailChimp->getLastError();
        }

        //  Ends Here Mailchimp Integration code

    
        if ($data) 
        {
            $VerifyPass = md5($password);
            if ($data['user_password'] == $VerifyPass)
            // if (password_verify($password ,$data['user_password'])) 
            {
                if($data['user_role'] == $role)
                {
                    $ses_data = [
                        'user_id'       => $data['user_id'],
                        'user_name'     => $data['user_name'],
                        'user_email'    => $data['user_email'],
                        'user_mobile'   => $data['user_mobile'],
                        'user_role'     => $data['user_role'],
                        'logged_in'     => TRUE
                    ];
                    if($role == 'admin')
                    {
                        $session->set('logged_in_admin', $ses_data);
                        return redirect()->to(base_url() . '/dashboard');
                    }elseif($role == 'affiliate')
                    {
                        $session->set('logged_in_affiliate', $ses_data);
                        return redirect()->to(base_url() . '/affiliatedashboard');
                    }else
                    {
                        $session->set('logged_in_user', $ses_data);
                        return redirect()->to(base_url() . '/userdashboard');
                    }
                }else
                {
                    $session->setFlashdata('msg', 'Role not matched, please select the correct user role');
                    return redirect()->to('/login');
                }
            }else
            {
                $session->setFlashdata('msg', 'Password not match');
                return redirect()->to('/login');
            }
        }else
        {
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to('/login');
        }
    }

    public function forgetPassword()
    {
        return view('../../modules/Auth/Views/forgetPassword');
    }

    public function resetPassword()
    {
        
        $session = session();
        $resetPassword = new AuthModel();
        $email = $this->request->getVar('user_email');
        $role = $this->request->getVar('user_role');
        $data = $resetPassword->where('user_email', $email, 'user_role', $role)->first();
        if($data)
        {
            if($data['user_role'] == $role)
            {
                $to = ''.$data['user_email'].'';
                $subject = 'Reset password link';
                $message = 'Hello Sir/Madam,<br><br>
                            You have requested to reset your password. 
                            So here is the link to get the reset your password.<br> 
                            <strong>Click the below link to reset your password</strong><br><br>
                            <a href="'.base_url('/resetPassword').'" >Click here to reset your link</a><br><br>
                            Thank You & Regards,<br>
                            MyCoinMedia';

                $email = \Config\Services::email();

                $email->setFrom('info@MyCoinMedia.com', 'Reset-password');
                $email->setTo($to);
                $email->setSubject($subject);
                $email->setMessage($message);
                $email->send();
                $session->setFlashdata('forget-success-msg', 'Reset password link send in your mail');
                return redirect()->to(base_url().'/forgetPassword');
            }
            else
            {          
                $session->setFlashdata('forget-msg', 'You role is not matched with this email id');
                return redirect()->to(base_url().'/forgetPassword');
            }
        }
        else
        {
            $session->setFlashdata('forget-msg', 'Your Email address is not found or you have entered wrong email address');
            return redirect()->to(base_url().'/forgetPassword');

        }
        // return view('../../modules/Auth/Views/resetPassword');
    }

    public function resetPass()
    {
        return view('../../modules/Auth/Views/resetPassword');
    }

    public function updatePassword()
    {
        $session = session();
        $resetPassword = new AuthModel();
        $email = $this->request->getVar('user_email');
        $npassword = md5($this->request->getVar('user_password'));
        $role = $this->request->getVar('user_role');
        $cnpassword = md5($this->request->getVar('confirm_password'));
        
        if ($npassword == $cnpassword) {
            $data = $resetPassword->where('user_email', $email, 'user_role', $role)->first();
            // $datarole = $resetPassword->where('user_role',$role);
            if ($data) {
                // echo "<pre>";
                // print_r($data);
                // // echo "true";
                // exit;
                // $VerifyPass = md5($password);
                if ($data['user_role'] == $role) {
                    $data = [
                        'email' => $this->request->getVar('user_email'),
                        'password' => md5($this->request->getVar('user_password'))
                    ];
                    $resetPassword->set('user_password', $npassword);
                    $resetPassword->where('user_email', $email);
                    $resetPassword->update();
                    if ($resetPassword) {
                        $session->setFlashdata('reset-msg', 'Password reset sucessfully, You can continue to login');
                        return redirect()->to(base_Url() . '/login');
                    }
                } else {
                    
                    $session->setFlashdata('reset-msg', 'User role not matched!, Please Select the correct user role');
                    return redirect()->to('/resetPassword');
                }
            } else {
                $session->setFlashdata('reset-msg', 'Email not found, enter the correct email address');
                return redirect()->to('/resetPassword');
            }
        } else {
            $session->setFlashdata('reset-msg', 'New password and confirm password not matched');
            return redirect()->to('/resetPassword');
        }
    }
}