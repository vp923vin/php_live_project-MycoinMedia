<?php
/*
* Define Users Model
*/
namespace Modules\Users\Models;
use CodeIgniter\Model;


class OrderDataModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = [
        'id', 
        'user_id', 
        'user_role', 
        'product_id',
        'product_name', 
        'buyer_name', 
        'buyer_email', 
        'paid_amount', 
        'paid_amount_currency', 
        'txn_id', 
        'order_date',
        'payment_method', 
        'payment_status',
        'created',
    ];



    public function insertPaymentData($insert_data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('orders');
		$result = $builder->insert($insert_data);
        return $result;
    }
    
    public function paymentHistory($uid){
        $db = \Config\Database::connect();
        $table = 'orders';
        $result = $this->db->query("SELECT * From  $table where `user_id` = '$uid';")->getResult('array');

        return $result;

    }

    public function pressData()
    {
        $db = \Config\Database::connect();
        $table = 'orders';
        $result = $this->db->query("SELECT * FROM $table ;")->getResult('array');
        return $result;
    }

    public function getOrderData($id)
    {
        $db = \Config\Database::connect();
        $table = 'orders';
        $result =  $this->db->query("SELECT * FROM $table Where `user_id`= '$id';")->getResult('array');
        return $result;

    }

    public function orderData()
    {
        $db = \config\Database::connect();
        $table = 'orders';
        $result = $this->db->query("SELECT * FROM $table;")->getResult('array');
        return $result;
    }

    public function getPressData($id)
    {
        $db = \Config\Database::connect();
        $table = 'orders';
        $result = $this->db->query("SELECT * FROM $table Where `user_id` = '$id';")->getResult('array');
        return $result; 
    }

    public function getUserOrder($id)
    {
        $db = \Config\Database::connect();
        $table = 'orders';
        $result = $this->db->query("SELECT * From $table where `user_id` = '$id';")->getResult('array');
        return $result;
    }

    public function getSinglePressData($id)
    {
        $db = \Config\Database::connect();
        $table = 'orders';
        $result = $this->db->query("SELECT * FROM $table WHERE `user_id` = '$id' ORDER BY `id` DESC LIMIT 1;")->getResult('array');
        return $result;
    }
    
}