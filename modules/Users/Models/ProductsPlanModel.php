<?php
/*
* Define Users Model
*/
namespace Modules\Users\Models;
use CodeIgniter\Model;

class ProductsPlanModel extends Model
{
    protected $table = 'products';
    protected $allowedFields = ['id','name','price', 'currency', 'services' , 'validity', 'status'];


    public function viewProductData($pid)
    {
        $db = \Config\Database::connect();
        $result = $this->db->query("SELECT * From  `products` where `id` = '$pid';")->getResult('array');

        return $result;

    }

    public function getProductData()
    {
        $db = \Config\Database::connect();
        $table = 'products';
        $result = $this->db->query("SELECT * From $table;");
        return $result;
    }

    public function getProducts()
    {
        $db = \Config\Database::connect();
        $table = 'products';
        $result = $this->db->query("SELECT * From $table;")->getResult('array');
        return $result;
    }


    public function viewPricing($id)
    {
        $db = \Config\Database::connect();
        $table = 'products';
        $result = $this->db->query("SELECT * FROM $table WHERE `id` = '$id';")->getResult('array');
        return $result;
    }



    
}
