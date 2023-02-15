<?php
/*
*  Affiliate User Module Affiliate Dashboard Controller
*/

namespace Modules\AffiliateUsers\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\PressReleaseModel;
use Modules\Users\Models\ProductsPlanModel;

class AffiliateDashboardController extends Controller
{
    public function index(){
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }

        $user = $_SESSION['logged_in_affiliate'];
        $uid = $user['user_id'];

        $model = new PressReleaseModel();
        $data['press'] = $model->getPressReleaseData($uid);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;
        return view('../../modules/AffiliateUsers/Views/affiliatedashboard', $data);
    }

   
    public function logout()
    {
        if(session()->has('logged_in_affiliate')){
            session()->remove('logged_in_affiliate');
            session()->destroy();
            return redirect()->to(base_url() . '/login');
        }
        
    }

}