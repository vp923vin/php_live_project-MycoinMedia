<?php

/*
*  Users Module PR History Controller
*/

namespace Modules\Users\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\PressReleaseModel;

class PrHistoryController extends Controller
{
    public function index()
    {
        if(!session()->has('logged_in_user')){
            return redirect()->to('/login');
        }

        $user = $_SESSION['logged_in_user'];
        $uid = $user['user_id'];

        $model = new PressReleaseModel();
        $data['press'] = $model->getCurrentUserPressData($uid);

        return view('../../modules/Users/Views/dashboard/prHistory', $data);
    }
}