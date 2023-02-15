<?php
/*
* Define Auth Model
*/
namespace Modules\Auth\Models;
use CodeIgniter\Model;


class AuthModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'user_email',
        'user_password', 
        'user_role'
    ];

    

    function checkUser($table,$data) {
        $this->db->where($data);
        // $this->db->where('login_type', $password);
        $query = $this->db->get($table);
        $count_row = $query->num_rows();
        if ($count_row > 0){
            return TRUE;
        } else{
            return FALSE;
        }
    }
}

?>