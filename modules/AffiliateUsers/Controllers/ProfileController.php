<?php

/*
*  Affiliate User Module Profile Controller
*/

namespace Modules\AffiliateUsers\Controllers;
use CodeIgniter\Controller;
use Modules\Users\Models\ProfileModel;

class ProfileController extends Controller
{
    public function index()
    {
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }
        $user = $_SESSION['logged_in_affiliate'];
        $uid = $user['user_id'];
        $model = new ProfileModel();
        $data['user'] = $model->ProfileData($uid);

        return view('../../modules/AffiliateUsers/Views/dashboard/myProfile', $data);
    }
    
    public function update_profile_data()
    {
        
      
        // $user_id = $this->request->getVar('user_id');
        // var_dump($id);exit;
        $file = $this->request->getFile('user_profile_pic');
        if ($file->isValid() && ! $file->hasMoved()) 
        {
            $originalName = $file->getClientName();
            $file->move('public/uploads/', $originalName);
        }
        
        $data = [
            'user_name'              => $this->request->getVar('user_name'),
            'user_email'             => $this->request->getVar('user_email'),
            'user_mobile'            => $this->request->getVar('user_mobile'),
            // 'user_password'          => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT),
            'user_address'           => $this->request->getVar('user_address'),
            'user_country'           => $this->request->getVar('user_country'),
            'user_profile_pic'       => $originalName,
            'company_name'           => $this->request->getVar('company_name'),
            'company_address'        => $this->request->getVar('company_address'),
            'company_country'        => $this->request->getVar('company_country'),
            'company_website'        => $this->request->getVar('company_website'),
            'company_other_details'  => $this->request->getVar('company_other_details')

        ];
// var_dump($data);exit;

        $model = new ProfileModel();
        $result = $model->update_data($this->request->getVar('user_id'), $data);

        $session = session();
        if($result){
            $session->setFlashdata("success", "Details updated successfully!");
            return redirect()->to(base_Url().'/affiliatedashboard/myProfile');

        }

        // var_dump($data);exit;


    }
    
}
