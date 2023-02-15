<?php

/*
*  Users Module User Payment History Controller
*/
namespace Modules\Users\Controllers;
use CodeIgniter\Controller;
use Modules\Users\Models\OrderDataModel;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        if(!session()->has('logged_in_user')){
            return redirect()->to('/login');
        }
        $user = $_SESSION['logged_in_user'];
        $uid = $user['user_id'];

        $model = new OrderDataModel();
        $data['info'] = $model->paymentHistory($uid);

        // var_dump($data['info']);exit;
        return view('../../modules/Users/Views/dashboard/payHistory', $data);

    }
   
}