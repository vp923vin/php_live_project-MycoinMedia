<?php

/*
*  Users Module User Dashboard Controller
*/

namespace Modules\Users\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\PressReleaseModel;


class MyPressReleaseController extends Controller 
{
    public function index()
    { 
        if(!session()->has('logged_in_user')){
            return redirect()->to('/login');
        }

        $user = $_SESSION['logged_in_user'];
        $uid = $user['user_id'];

        $model = new PressReleaseModel();
        $data['press'] = $model->getPressReleaseData($uid);

        
        
        // var_dump($data);exit;
        return view('../../modules/Users/Views/dashboard/myPressRelease', $data);
    }
  
    public function viewPress($id)
    {
        $model = new PressReleaseModel();
        $data['singlepress'] = $model->getSinglePressReleaseData($id);
        // var_dump($data);exit;
        return view('../../modules/Users/Views/dashboard/viewPressRelease', $data);
    }

    public function AddNote($id)
    {
        $model = new PressReleaseModel();
        $data['note'] = $model->getSinglePressReleaseData($id);
        // var_dump($data);exit;
        return view('../../modules/Users/Views/dashboard/addNote',$data);
    }

    public function NoteAdded($id)
    {
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
            return redirect()->to('/userdashboard/myPressRelease');
        }
    }

    public function addCompanyLink($id)
    {

        $model = new PressReleaseModel();
        $data['note'] = $model->getSinglePressReleaseData($id);
        return view('../../modules/Users/Views/dashboard/addCompanyLink', $data);
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
            return redirect()->to(base_url().'/userdashboard/myPressRelease');
        }else{
            echo "Some Error occured!";exit;
        }
    }
}