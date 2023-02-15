<?php
/*
* Define Admin Module Test Controller
*/

namespace Modules\Admin\Controllers;
use CodeIgniter\Controller;
// use Modules\Admin\Models\RegisterModel as ModelsRegisterModel;
use Modules\Admin\Models\RegisterModel;

class TestController extends Controller{
    public function index()
    {
        $model = new RegisterModel();
        $data['info'] = $model->displayData('users');
        return view('../../modules/Admin/Views/test', $data);
    }
    // public function getData(){


    // }
}