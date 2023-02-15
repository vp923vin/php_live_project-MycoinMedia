<?php

/*
 *  Admin Module Add Prdoucts Model 
 */

namespace Modules\Admin\Models;
use CodeIgniter\Model;

class AddProductsModel extends Model
{
    protected $table = 'products';
    protected $allowedFields = [
        'id',
        'name',
        'price',
        'currency',
        'sevices',
        'validity',
        'status',

    ];

    public function insertProduct($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('products');
        $result = $builder->insert($data);
        return $result;
    }

    public function get_product($table,$id)
    {
        $db = \Config\Database::connect();
        $result = $this->db->query("SELECT * FROM $table WHERE `id` = '$id';")->getResult('array');
        return $result;
    }

    public function update_product($data, $id)
    {
        $name =  $data['name'];
        $price = $data['price'];
        $currency = $data['currency'];
        $services = $data['services'];
        $validity = $data['validity'];

        $db = \Config\Database::connect();
        $table = 'products';
        $result = $this->db->query("UPDATE $table SET 
        `name` = '$name',
        `price` = '$price',
        `currency` = '$currency',
        `services` = '$services',
        `validity` = '$validity'
        WHERE `id`= '$id';");
        return $result;

    }

    public function delete_product($id)
    {
        $db = \config\Database::connect();
        $table = 'products';
        $result = $this->db->query("DELETE from $table where `id` = '$id'");
        return $result;
    }

}