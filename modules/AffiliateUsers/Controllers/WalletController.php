<?php

/*
*  Affiliate Users Module Add Money Wallet Controller
*/

namespace Modules\AffiliateUsers\Controllers;
use CodeIgniter\Controller;
use Modules\AffiliateUsers\Models\WalletModel;

class WalletController extends Controller 
{
    public function index()
    {
        return view('../../modules/AffiliateUsers/Views/addMoney/addMoneyWallet');
    }
    public function addWalletMoney()
    {
        if(session()->has('logged_in_affiliate')){
            require_once('app/Libraries/stripe-php/init.php');
            $stripeSecret = getenv('stripe.secret');

            $amount = $this->request->getVar('amount');

            \Stripe\Stripe::setApiKey($stripeSecret);

            $stripe = \Stripe\Charge::create([
                "amount"       => $amount * 10,     // change the amount currently is set based on indian currency
                "currency"     => "inr", 
                "source"       => $this->request->getVar('stripeToken'),
                "description"  => "Test payment from MyCoinMedia",
               

            ]);

            $data = array(
                'success' => true,
                'data' => $stripe
            );
            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;

            $user = $_SESSION['logged_in_affiliate'];
            $uid = $user['user_id'];

            //  money added in wallet 
            $insert_data = array(
                'user_id'       => $uid,
                'amount'        => $stripe['amount'],
                'type'          => 'in',
                'message'       => 'money added in wallet',
                'wallet_txn_id' => $stripe['id'],
                'added_on'      => date('Y-m-d H:i:s')
            );

            $model = new WalletModel();
            $result = $model->insertWalletData($insert_data);

            $data1 = $model->getwalletData($uid);
            $balance = 0;
            foreach($data1 as  $key){
                if ($key['type'] == 'in')
                {

                   $balance = $balance + $key['amount'];
                   $model->updateBal($balance, $key['id']);
                   
                }
                elseif($key['type'] == 'out')
                {
                    $balance = $balance - $key['amount'];
                    $model->updateBal($balance, $key['id']);
                }
            }
            
            $session = session();
            if($result)
            {
                $session->setFlashdata('wallet-msg', 'Money added in your wallet succesfully!.');
                return redirect()->to(base_url().'/affiliatedashboard');
            }
        }
        return view('../../modules/AffiliateUsers/Views/addMoney/addedMoney');
    }
}