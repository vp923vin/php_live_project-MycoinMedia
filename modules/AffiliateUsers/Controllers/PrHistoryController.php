<?php

/*
*  Affiliate Users Module PR History Controller
*/

namespace Modules\AffiliateUsers\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\PressReleaseModel;

class PrHistoryController extends Controller
{
    public function index()
    {
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }

        $user = $_SESSION['logged_in_affiliate'];
        $uid = $user['user_id'];

        $model = new PressReleaseModel();
        $data['press'] = $model->getCurrentUserPressData($uid);

        return view('../../modules/AffiliateUsers/Views/dashboard/prHistory', $data);
    }
}