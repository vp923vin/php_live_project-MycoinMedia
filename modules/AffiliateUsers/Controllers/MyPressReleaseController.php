<?php

/*
*  Affiliate Users Module press Release Controller
*/

namespace Modules\AffiliateUsers\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\PressReleaseModel;

class MyPressReleaseController extends Controller 
{
    public function index()
    { 
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }

        $user = $_SESSION['logged_in_affiliate'];
        $uid = $user['user_id'];

        $model = new PressReleaseModel();
        $data['press'] = $model->getPressReleaseData($uid);
        // echo "<pre>";
        // print_r($data);exit;
        return view('../../modules/AffiliateUsers/Views/dashboard/myPressRelease', $data);
    }

    public function viewPress($id)
    {
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }
        $model = new PressReleaseModel();
        $data['singlepress'] = $model->getSinglePressReleaseData($id);
        // var_dump($data);exit;
        return view('../../modules/AffiliateUsers/Views/dashboard/viewPressRelease', $data);
    }

    public function AddNote($id)
    {
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }

        $model = new PressReleaseModel();
        $data['note'] = $model->getSinglePressReleaseData($id);
        // var_dump($data);exit;
        return view('../../modules/AffiliateUsers/Views/dashboard/addNote',$data);
    }

    public function NoteAdded($id)
    {
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }

        $model = new PressReleaseModel();
        $data = [
            'note' => $this->request->getVar('note')
        ];
        
        $result = $model->addingNote($id, $data);
        // var_dump($result);exit;
        $session = session();
        if($result)
        {
            $session->setFlashdata('note-msg', 'Note added successfully!.');
            return redirect()->to('/affiliatedashboard/myPressRelease');
        }
    }

    public function addCompanyLink($id)
    {

        $model = new PressReleaseModel();
        $data['note'] = $model->getSinglePressReleaseData($id);
        return view('../../modules/AffiliateUsers/Views/dashboard/addCompanyLink', $data);
    }

    public function linkAdded($id)
    {
        $model = new PressReleaseModel();
        $data = [
            'company_link' => $this->request->getVar('company_link'),
            'status'       => 'progress'
        ];
        $result = $model->updatelink($id, $data);

        if($result)
        {
            session()->setFlashdata('company-link-msg', 'Company link added successfully, please wait to respond for Admin to Activate Your Package.');
            return redirect()->to(base_url().'/affiliatedashboard/myPressRelease');
        }else{
            echo "Some Error occured!";exit;
        }
    }
}