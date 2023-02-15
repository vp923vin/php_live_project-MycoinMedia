<?php

/*
*  Users Module User Dashboard Controller
*/

namespace Modules\Users\Controllers;
use CodeIgniter\Controller;
use Modules\AffiliateUsers\Models\WalletModel;
use Modules\Auth\Models\RegisterModel;

use Modules\Users\Models\ProductsPlanModel;


class MyCoinMediaController extends Controller
{
    public function index()
    {
        return view('../../modules/Users/Views/home');
    }

   

    public function about()
    {
        return view('../../modules/Users/Views/home');
    }

    public function pricing()
    {
        $model = new ProductsPlanModel();
        $data['products'] = $model->getProducts();

        return view('../../modules/Users/Views/pricing',$data);
    }

    public function billing($id)
    {

        if(session()->has('logged_in_user'))
        {
            $user = $_SESSION['logged_in_user'];
            // print_r($user); exit;
            $uid = $user['user_id'];
            $model = new RegisterModel();
            $data = $model->userData('users', $uid);
    
            $model2 = new ProductsPlanModel();
            $price = $model2->viewPricing($id);    

        }elseif(session()->has('logged_in_affiliate')){
            $user = $_SESSION['logged_in_affiliate'];
            // print_r($user); exit;
            $uid = $user['user_id'];
            $model = new RegisterModel();
            $data = $model->userData('users', $uid);
    
            $model2 = new ProductsPlanModel();
            $price = $model2->viewPricing($id); 

            // $model3 = new WalletModel();
            // $wallet_result = $model3->getwalletCurrentBalance($uid);

            // if($wallet_result[0]['wallet_balance'] >= $price[0]['price'])
            // {
                
            // }

        }else{
            return redirect()->to('/login');
        }
    
     

        return view('../../modules/Users/Views/billing', compact('data', 'price') );
    }

   
}