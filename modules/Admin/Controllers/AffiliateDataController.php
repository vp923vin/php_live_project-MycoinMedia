<?php 

/*
 * Admin Module Affiliate Data Controller
 * 
 */
namespace Modules\Admin\Controllers;
use CodeIgniter\Controller;
use Modules\Admin\Models\AffiliateModel;
use Modules\Admin\Models\AffiliateProfileModel;

class AffiliateDataController extends Controller 
{
    public function index()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }
        
        $model = new AffiliateModel();
        $data['order'] = $model->orderData();
        return view('../../modules/Admin/Views/dashboard/affiliateOrderHistory',$data);
    }
    public function affiliateProfileData()
    {
        if(!session()->has('logged_in_admin')){
            return redirect()->to('/login');
        }

        $model = new AffiliateProfileModel();
        $data['users'] = $model->getAffiliateData();
        return view('../../modules/Admin/Views/dashboard/AffiliateData', $data);

    }
}