<?php
/*
* Define Auth Register Model
*/
namespace Modules\Auth\Models;

use CodeIgniter\Model;
class RegisterModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'user_id',
        'user_name',
        'user_email', 
        'user_mobile', 
        'user_password', 
        'user_address', 
        'user_country', 
        'user_role'
    ];

    
    public function insertData($data)
    {
        $db = \Config\Database::connect();
		$builder = $db->table('users');
		$result = $builder->insert($data);
		return $result;
    }

    public function userData($table, $uid){
        $db = \Config\Database::connect();
        $result = $this->db->query("SELECT * from $table where `user_id` = '$uid';")->getResult('array');
        return $result;
    }


}
