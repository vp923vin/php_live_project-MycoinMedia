<?php

/*
*  Users Module Stripe payment Controller
*/
namespace Modules\Users\Controllers;
use CodeIgniter\Controller;
use Modules\AffiliateUsers\Models\WalletModel;
use Modules\Users\Models\OrderModel;
use Modules\Auth\Models\RegisterModel;
use Modules\Users\Models\OrderDataModel;
use Modules\Users\Models\ProductsPlanModel;
use Modules\Admin\Models\PressReleaseModel;

use CodeIgniter\HTTP\RequestInterface;

class StripeController extends Controller
{
    public function index()
    {
        return view('../../modules/Users/Views/mystripe');
    }

    public function stripe($id)
    {
        if (session()->has('logged_in_user'))
        {
            $model = new OrderModel();
            $data['products'] = $model->getRows($id);

            return view('../../modules/Users/Views/stripe/stripepayment', $data);
        }
        elseif(session()->has('logged_in_affiliate'))
        {
            $model = new OrderModel();
            $data['products'] = $model->getRows($id);
            
            $user = $_SESSION['logged_in_affiliate'];
            $uid = $user['user_id'];
            
            $model01 = new WalletModel();
            $wallet_result = $model01->getwalletCurrentBalance($uid);

            if(!empty($wallet_result) && $wallet_result[0]['wallet_balance'] >= ($data['products'][0]['price']*10)){

                $model2 = new RegisterModel();
                $userdata = $model2->userData('users', $uid);

                $wallet_id = uniqid('wallet_', TRUE);
                // insert data into db
                $insert_data = array(
                    'user_id'               => $userdata[0]['user_id'],
                    'user_role'             => $userdata[0]['user_role'],
                    'product_id'            => $id,
                    'product_name'          => $data['products'][0]['name'],
                    'buyer_name'            => $userdata[0]['user_name'],
                    'buyer_email'           => $userdata[0]['user_email'],
                    'paid_amount'           => $data['products'][0]['price']*10,
                    'paid_amount_currency'  => 'inr', // change to this $data['products'][0]['currency'] 
                    'order_date'            => date('Y-m-d'),
                    'txn_id'                => ''.$wallet_id.'',
                    'payment_status'        => 'succeeded',
                    'payment_method'        => 'wallet',
                    'created'               => date('Y-m-d H:i:s')
                );
                
                $model3 = new OrderDataModel();
                $model3->insertPaymentData($insert_data);

                // inseting into press release database
                $data4 = $model3->getSinglePressData($userdata[0]['user_id']);  
                $inserData = array(
                    'order_id'      => $data4[0]['id'],
                    'package_id'    => $data4[0]['product_id'],
                    'package_name'  => $data4[0]['product_name'],
                    'user_id'       => $userdata[0]['user_id'],
                    'user_email'    => $data4[0]['buyer_email'],
                    'company_name'  => $userdata[0]['company_name'],
                    'user_name'     => $userdata[0]['user_name'],
                    'created_at'    => date('Y-m-d H:i:s')
                );
                $model4 = new PressReleaseModel();
                $model4->pressDataInsert($inserData);

                // wallet balance is being updated
                $balance  = $wallet_result[0]['wallet_balance'] - $insert_data['paid_amount'];
                // insert wallet data into database   
                $insert_data1 = array(
                    'user_id'         => $uid,
                    'amount'          => $insert_data['paid_amount'],
                    'type'            => 'out',
                    'message'         => 'product purchase',
                    'wallet_balance'  => $balance, 
                    'wallet_txn_id'   => ''.$insert_data['txn_id'].'',
                    'added_on'        => date('Y-m-d H:i:s')
                );
                $model = new WalletModel();
                $model->insertWalletData($insert_data1);

                // SMTP setup for order confirmation email to user
                $to  = 'vppracticemail@gmail.com'; // '.$insert_data['buyer_email'].'
                $subject = 'Order Purchase Details';
                $message = 'Hi '.$insert_data['buyer_name'].',<br><br>
                            You have purchased the Order. This is order Confirmation email that you have succesfully puchased the product.<br><br>
                                <strong>Here these are your order details:</strong><br>
                                <strong>Product Name: </strong>'.$insert_data['product_name'].',<br>
                                <strong>Paid Amount: </strong>'.$insert_data['paid_amount'].',<br>
                                <strong>Paid Amount Currency: </strong>'.$insert_data['paid_amount_currency'].',<br>
                                <strong>Transaction Id: </strong>'.$insert_data1['wallet_txn_id'].',<br>
                                <strong>Payment Method: </strong> Wallet,<br>
                                <strong>Payment Status: </strong>'.$insert_data['payment_status'].',<br>
                                <strong>Order Date: </strong>'.$insert_data1['added_on'].',<br>
                                Please Wait For link 24 Hours to activate your package.Sorry for Waiting!.<br><br>
                            Thank You, Purchasing our Product and use the purchased sevices to it\'s fullest.<br><br>
                            Regards,<br>
                            MyCoinMedia';
                
                // calling email services
                $email = \Config\Services::email();

                $email->setFrom('info@MyCoinMedia.com', 'Order-Info');
                $email->setTo($to);
                $email->setSubject($subject);
                $email->setMessage($message);
                if($email->send()){
                    session()->setFlashdata('email-send-confirm','Order Success and order details send via email.');
                    return redirect()->to(base_url().'/affiliatedashboard');
                }else{
                    $data = $email->printDebugger(['headers']);
                    print_r($data);
                }


            }else{

                $model = new OrderModel();
                $data['products'] = $model->getRows($id);

                return view('../../modules/Users/Views/stripe/stripepayment', $data);
            }
        }
    }

    public function payment()
    {
        //  this payment function has session for user and affiliate user
        if(session()->has('logged_in_user'))
        {
            // calling stripe library  
            require_once('app/Libraries/stripe-php/init.php');

            // setting stripe secert key
            $stripeSecret = getenv('stripe.secret');

            // calling request services to get the form data
            $request = \Config\Services::request();

            $id = $request->getPost('pro_id');

            // getting ordermodel to for products 
            $model = new orderModel();
            $data['products'] = $model->getRows($id);

            $productname = $data['products'][0]['name']; 
            $amount = (float)$data['products'][0]['price'];

            // setting stripe class and stripe secert key
            \Stripe\Stripe::setApiKey($stripeSecret);

            // sending payment data to stripe to create token and genrate transaction id
            $stripe = \Stripe\Charge::create([
                "amount" => $amount * 10,     // change the amount currently is set based on indian currency
                "currency" => "inr",         // change inr to usd i.e. Dollar
                "source" => $request->getVar('stripeToken'),
                "description" => "Test payment from MyCoinMedia"

            ]);

            // after successfull payment, you can store payment related information into your database

            // getting user data 
            $user = $_SESSION['logged_in_user'];
            $uid = $user['user_id'];


            $model2 = new RegisterModel();
            $userdata = $model2->userData('users', $uid);

            // get stripe data after successful payment and then store it to the database
            $data = array(
                'success' => true,
                'data' => $stripe
            );

            $amount = $stripe['amount'];
            $currency = $stripe['currency'];
            $status = $stripe['status'];
            $transaction = $stripe['id'];
            $paymethod = $stripe['payment_method_details']['card']['brand'];

            // insert data into db
            $insert_data = array(
                'user_id'               => $userdata[0]['user_id'],
                'user_role'             => $userdata[0]['user_role'],
                'product_id'            => $id,
                'product_name'          => $productname,
                'buyer_name'            => $userdata[0]['user_name'],
                'buyer_email'           => $userdata[0]['user_email'],
                'paid_amount'           => $amount,
                'paid_amount_currency'  => $currency, 
                'order_date'            => date('Y-m-d'),
                'txn_id'                => $transaction,
                'payment_status'        => $status,
                'payment_method'        => $paymethod,
                'created'               => date('Y-m-d H:i:s')
            );

            $model3 = new OrderDataModel();
            $model3->insertPaymentData($insert_data);
            
            // inseting into press release database
            $data4 = $model3->getSinglePressData($userdata[0]['user_id']);
            
            $inserData = array(
                'order_id'      => $data4[0]['id'],
                'package_id'    => $data4[0]['product_id'],
                'package_name'  => $data4[0]['product_name'],
                'user_id'       => $userdata[0]['user_id'],
                'user_email'    => $data4[0]['buyer_email'],
                'company_name'  => $userdata[0]['company_name'],
                'user_name'     => $userdata[0]['user_name'],
                'created_at'    => date('Y-m-d H:i:s')
            );

            $model4 = new PressReleaseModel();
            $model4->pressDataInsert($inserData); 

            // SMTP setup for order confirmation email to user
            $to  = 'vppracticemail@gmail.com';
            $subject = 'Order Purchase Details';
            $message = 'Hi '.$insert_data['buyer_name'].',<br><br>
                        You have purchased the Order. This is order Confirmation email that you have succesfully puchased the product.<br><br>
                            <strong>Here these are your order details:</strong><br>
                            <strong>Product Name: </strong>'.$insert_data['product_name'].',<br>
                            <strong>Paid Amount: </strong>'.$insert_data['paid_amount'].',<br>
                            <strong>Paid Amount Currency: </strong>'.$insert_data['paid_amount_currency'].',<br>
                            <strong>Transaction Id: </strong>'.$insert_data['txn_id'].',<br>
                            <strong>Payment Method: Card</strong>('.$insert_data['payment_method'].'),<br>
                            <strong>Payment Status: </strong>'.$insert_data['payment_status'].',<br>
                            <strong>Order Date: </strong>'.$insert_data['order_date'].',<br>
                            Please Wait For link 24 Hours to activate your package.Sorry for Waiting!.<br><br>
                        Thank You, Purchasing our Product and use the purchased sevices to it\'s fullest.<br><br>
                        Regards,<br>
                        MyCoinMedia';
            
            // calling email services
            $email = \Config\Services::email();
            $email->setFrom('info@MyCoinMedia.com', 'Order-Info');
            $email->setTo($to);
            $email->setSubject($subject);
            $email->setMessage($message);
            if($email->send()){
                session()->setFlashdata('email-send-confirm','Order Success and order details send via email.');
                return redirect()->to(base_url().'/userdashboard');
            }else{
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }

            // return view('../../modules/Users/Views/payment');
        
        }
        elseif(session()->has('logged_in_affiliate'))
        {
            // calling stripe library  
            require_once('app/Libraries/stripe-php/init.php');

            // setting stripe secert key
            $stripeSecret = getenv('stripe.secret');

            // getting session user data 
            $user = $_SESSION['logged_in_affiliate'];
            $uid = $user['user_id']; 

             // calling request services to get the form data
            $request = \Config\Services::request();
            $id = $request->getPost('pro_id');

            // getting ordermodel to for products
            $model = new orderModel();
            $data['products'] = $model->getRows($id);
            $productname = $data['products'][0]['name'];
            $amount = (float)$data['products'][0]['price'];

            // setting stripe class and stripe secert key
            \Stripe\Stripe::setApiKey($stripeSecret);

            // sending payment data to stripe to create token and genrate transaction id
            $stripe = \Stripe\Charge::create([
                "amount" => $amount * 10, // change the amount currently is set based on indian currency
                "currency" => "inr", // change inr to usd i.e. Dollar
                "source" => $request->getVar('stripeToken'),
                "description" => "Test payment from MyCoinMedia"

            ]);

            // after successfull payment, you can store payment related information into your database
            $model2 = new RegisterModel();
            $userdata = $model2->userData('users', $uid);

            // get stripe data after successful payment and then store it to the database
            $data = array(
                'success' => true,
                'data' => $stripe
            );
            
            $amount = $stripe['amount'];
            $currency = $stripe['currency'];
            $status = $stripe['status'];
            $transaction = $stripe['id'];
            $paymethod = $stripe['payment_method_details']['card']['brand'];


            // insert data into db
            $insert_data = array(
                'user_id'               => $userdata[0]['user_id'],
                'user_role'             => $userdata[0]['user_role'],
                'product_id'            => $id,
                'product_name'          => $productname,
                'buyer_name'            => $userdata[0]['user_name'],
                'buyer_email'           => $userdata[0]['user_email'],
                'paid_amount'           => $amount,
                'paid_amount_currency'  => $currency, 
                'order_date'            => date('Y-m-d'),
                'txn_id'                => $transaction,
                'payment_status'        => $status,
                'payment_method'        => $paymethod,
                'created'               => date('Y-m-d H:i:s')
            );

            $model3 = new OrderDataModel();
            $model3->insertPaymentData($insert_data);

            // inseting into press release database
            $data4 = $model3->getSinglePressData($userdata[0]['user_id']);  
            $inserData = array(
                'order_id'      => $data4[0]['id'],
                'package_id'    => $data4[0]['product_id'],
                'package_name'  => $data4[0]['product_name'],
                'user_id'       => $userdata[0]['user_id'],
                'user_email'    => $data4[0]['buyer_email'],
                'company_name'  => $userdata[0]['company_name'],
                'user_name'     => $userdata[0]['user_name'],
                'created_at'    => date('Y-m-d H:i:s')
            );
            $model4 = new PressReleaseModel();
            $model4->pressDataInsert($inserData);

           
            // here if wallet doesn't have sufficient amount of money the payment is done through your bank account
            session()->setFlashdata('wallet-not-sufficient', 'You don\'t have enough Money in your wallet, So payment is done via your card,
            if want to use wallet then please add money in your wallet and make easy flawless transactions.');

            // SMTP setup for order confirmation email to user
            $to  = 'vppracticemail@gmail.com';
            $subject = 'Order Purchase Details';
            $message = 'Hi '.$insert_data['buyer_name'].',<br><br>
                        You have purchased the Order. This is order Confirmation email that you have succesfully puchased the product.<br><br>
                            <strong>Here these are your order details:</strong><br>
                            <strong>Product Name: </strong>'.$insert_data['product_name'].',<br>
                            <strong>Paid Amount: </strong>'.$insert_data['paid_amount'].',<br>
                            <strong>Paid Amount Currency: </strong>'.$insert_data['paid_amount_currency'].',<br>
                            <strong>Transaction Id: </strong>'.$insert_data['txn_id'].',<br>
                            <strong>Payment Method: Card</strong>('.$insert_data['payment_method'].'),<br>
                            <strong>Payment Status: </strong>'.$insert_data['payment_status'].',<br>
                            <strong>Order Date: </strong>'.$insert_data['order_date'].',<br>
                            Please Wait For link 24 Hours to activate your package.Sorry for Waiting!.<br><br>
                        Thank You, Purchasing our Product and use the purchased sevices to it\'s fullest.<br><br>
                        Regards,<br>
                        MyCoinMedia';
            
            // calling email services
            $email = \Config\Services::email();
            $email->setFrom('info@MyCoinMedia.com', 'Order-Info');
            $email->setTo($to);
            $email->setSubject($subject);
            $email->setMessage($message);
            if($email->send()){
                session()->setFlashdata('email-send-confirm','Order Success and order details send via email.');
                return redirect()->to(base_url().'/affiliatedashboard');
            }else{
                $data = $email->printDebugger(['headers']);
                print_r($data);
            }

        }
        else
        {
            // if session doen't have user and affiliate user the go back to the login page
            return redirect()->to('/login');
        }

    }
}
