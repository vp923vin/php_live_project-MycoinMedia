<?php

/* 
 * Users Module Company profile Controller 
 * 
*/

namespace Modules\Users\Controllers;
use CodeIgniter\Controller;
use Modules\Users\Models\ProfileModel;

class CompanyProfilecontroller extends Controller 
{
    public function index()
    {
        if(!session()->has('logged_in_user')){
            return redirect()->to('/login');
        }
        $user = $_SESSION['logged_in_user'];
        $uid = $user['user_id'];
        $model = new ProfileModel();
        $data['users'] = $model->ProfileData($uid);
        
        return view('../../modules/Users/Views/dashboard/companyProfile', $data);
    }
    public function insertCompanyData()
    {
        
        if(!session()->has('logged_in_user')){
            return redirect()->to('/login');
        }
        $user = $_SESSION['logged_in_user'];
        $uid = $user['user_id'];
        $model = new ProfileModel();
        $data = [
            'company_name' => $this->request->getVar('company_name'),
            'user_name' => $this->request->getVar('user_name'),
            'user_mobile' => $this->request->getVar('user_mobile'),
            'user_email' => $this->request->getVar('user_email'),

        ];
        $result = $model->insert_data($uid, $data);

        $session = session();
        if($result){
            $session->setFlashdata("add-company", "Details added successfully");
            return redirect()->to(base_url().'/userdashboard/companyProfile');

        }
        
    }

    public function viewCompanyData($uid)
    {
        $model = new ProfileModel();
        $data['users'] = $model->ProfileData($uid);
        // var_dump($data);exit;
        return View('../../modules/Users/Views/dashboard/viewCompanyData',$data);
    }

    public function editCompanyData($uid)
    {
        $model = new ProfileModel();
        $data['users'] = $model->ProfileData($uid);
        // var_dump($data);exit;
        return view('../../modules/Users/Views/dashboard/editCompanyData',$data);
    }

    public function updateCompanyData($uid)
    {
        $model = new ProfileModel();
        $data = [
            'user_name' => $this->request->getVar('user_name'),
            'user_email' => $this->request->getVar('user_email'),
            'user_mobile' => $this->request->getVar('user_mobile'),
            'company_name' => $this->request->getVar('company_name'),
            'company_address' => $this->request->getVar('company_address'),
            'company_country' => $this->request->getVar('company_country'),
            'company_website' => $this->request->getVar('company_website'),
            'company_other_details' => $this->request->getVar('company_other_details')
        ];

        $result = $model->updateCompany($uid, $data);
        // var_dump($result);exit;
        $session  = session();
        if($result)
        {
            $session->setFlashdata('company-msg', 'Company details updated successfully!');
            return redirect()->to('/userdashboard/companyProfile');
        }
        
    }
}