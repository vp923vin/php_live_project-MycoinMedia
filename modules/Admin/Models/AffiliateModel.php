<?php
/*
*  Admin Module Affiliate Model
*/
namespace Modules\Admin\Models;
use CodeIgniter\Model;

class AffiliateModel extends Model
{
    protected $table = 'orders';
    protected $allowedFields = [
        'id', 
        'user_id', 
        'user_role', 
        'product_id', 
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

    public function  orderData()
    {
        $user = 'affiliate';
        $db = \Config\Database::connect();
        $table = 'orders';
        $result = $this->db->query("SELECT * FROM  $table where `user_role`= '$user'; ")->getResult('array');
        return $result;
    }
}