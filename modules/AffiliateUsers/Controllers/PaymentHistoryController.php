<?php

/*
*  Affiliate Users Module Affiliate payment Histroy Controller
*/

namespace Modules\AffiliateUsers\Controllers;
use CodeIgniter\Controller;
use Modules\Users\Models\OrderDataModel;

class PaymentHistoryController extends Controller 
{
    public function index()
    {
        if(!session()->has('logged_in_affiliate')){
            return redirect()->to('/login');
        }
        $user = $_SESSION['logged_in_affiliate'];
        $uid = $user['user_id'];
        // var_dump($uid) ;exit;
        $model = new OrderDataModel();
        $data['info'] = $model->paymentHistory($uid);
        // var_dump($data['info']);exit;
        return view('../../modules/AffiliateUsers/Views/dashboard/paymentHistory',$data);
    }


}