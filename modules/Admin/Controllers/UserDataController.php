<?php 

/*
 * Admin Module User Data Controller
 * 
 */
namespace Modules\Admin\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\UserProfileModel;
use Modules\Admin\Models\UsersModel;

class UserDataController extends Controller 
{
    public function index()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }
        
        $model = new UsersModel();
        $data['order'] = $model->orderData();
        return view('../../modules/Admin/Views/dashboard/userOrderHistory',$data);
    }
    public function userProfileData()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }

        $model = new UserProfileModel();
        $data['users'] = $model->getUserData();
        return view('../../modules/Admin/Views/dashboard/UserData', $data);

    }
}