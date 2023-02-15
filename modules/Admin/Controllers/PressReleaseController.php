<?php 
/*
 * Admin Module Press Release Controller
 */

namespace Modules\Admin\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\PressReleaseModel;
use Modules\Admin\Models\UserProfileModel;
use Modules\Users\Models\OrderDataModel;

class PressReleaseController extends Controller
{
    public function index()
    {
        $model = new PressReleaseModel();
        $data['press'] = $model->viewPressRelease();

       
        return view('../../modules/Admin/Views/dashboard/pressRelease', $data);
    }

    public function editPressRelease($id)
    {
        $model = new PressReleaseModel();
        $data['value'] = $model->editPress($id);
        // var_dump($data);exit;
        return view('../../modules/Admin/Views/dashboard/editPressRelease', $data);
    }

    public function updatePressRelease($id)
    {
        $model = new PressReleaseModel();
        $data = [
            
            'updated_links' => $this->request->getVar('links'),
            'status' => $this->request->getVar('status')

        ];
        // var_dump($data);exit;
        $result = $model->updatePress($id, $data);

        //get email and other details 
        $uid = $model->getUserId($id);
        // print_r($uid[0]['user_id']);exit;

        $data5 = $model->getDataForLinkStatusEmail($uid[0]['user_id']);

        // $model2 = new OrderDataModel();
        // $email = $model2->getUserOrder($uid[0]['user_id']);
        // echo "<pre>";
        // print_r($data5);
        // echo "</pre>";exit;

        
        if(!empty($data['updated_links']) && $data['status'] == 'completed'){
            
            // SMTP setup for order confirmation email to user
            $to  = ''.$data5[0]['user_email'].'';
            $subject = 'Order Status Details';
            $message = 'Hi '.$data5[0]['user_name'].',<br><br> 
                        You have purchased the products from our website and your 
                        order Status is activated and updated link detail is send in your email box.<br>
                            <strong>Here status of your purchase: </strong><br>
                            <strong>Status: </strong>'.$data['status'].', <br>
                            <strong>Updated Link: </strong>'.$data5[0]['updated_links'].'<br><br>
                        Thank You & Regards, <br>
                        MyCoinMedia.';
        
            // calling email services
            $email = \Config\Services::email();
            $email->setFrom('info@MyCoinMedia.com', 'Order-Info');
            $email->setTo($to);
            $email->setSubject($subject);
            $email->setMessage($message);
            $email->send();
        }

        $session = session();
        if($result)
        {
            $session->setFlashdata('update-press','Data updated successfully!');
            return redirect()->to('/dashboard/pressRelease');
        }
    }

    public function deletePressRelease($id)
    {
        $model = new PressReleaseModel();
        $result = $model->deletePress($id);
        // var_dump($result);exit;

        $session = session();
        if($result)
        {
            $session->setFlashdata('del-press','Data deleted successfully!');
            return redirect()->to('/dashboard/pressRelease');
        }
    }

    // public function pressDataInsert()
    // {

    // }

}