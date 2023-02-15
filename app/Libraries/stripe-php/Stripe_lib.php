<?php 
// defined('BASEPATH') OR exit('No direct script access allowed'); 
 
/** 
 * 
 * Library for Stripe payment gateway. It helps to integrate Stripe payment gateway 
 * in CodeIgniter application. 
 * 
 * This library requires the Stripe PHP bindings and it should be placed in the third_party folder. 
 * It also requires Stripe API configuration file and it should be placed in the config directory. 
 *
 */ 
 
class Stripe_lib{ 
    var $CI; 
    var $api_error; 
     
    function __construct(){ 
        $this->api_error = ''; 
        // $this->CI =& get_instance(); 
        // $this->CI->load->config('stripe'); 
         
        // Include the Stripe PHP bindings library 
        require APPPATH .'Libraries/init.php'; 
         
        // Set API key 
        \Stripe\Stripe::setApiKey('sk_test_51LuZHTSEfCyX9y94ZzvNYKOLJT7FsH7bcAeWCnu7goQuPn4a4kk66WeY28HvvM23Uc1eR7vYjQq8aa7uMMiEJc8g00XOm3EKSM'); 
    } 
 
    function addCustomer($email, $token){ 
        try { 
            // Add customer to stripe 
            $customer = \Stripe\Customer::create(array( 
                'email' => $email, 
                'source'  => $token 
            )); 
            return $customer; 
        }catch(Exception $e) { 
            $this->api_error = $e->getMessage(); 
            return false; 
        } 
    } 
     
    function createCharge($customerId, $itemName, $itemPrice){ 
       
        // Convert price to cents 
        $itemPriceCents = ($itemPrice*100); 
        $currency = $this->CI->config->item('stripe_currency'); 
        
         
        try { 
            // Charge a credit or a debit card 
            $charge = \Stripe\Charge::create(array( 
                'customer' => $customerId, 
                'amount'   => $itemPriceCents, 
                'currency' => $currency, 
                'description' => $itemName 
            )); 
             
            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize(); 
            return $chargeJson; 
        }catch(Exception $e) { 
            $this->api_error = $e->getMessage(); 
            return false; 
        } 
    } 
}