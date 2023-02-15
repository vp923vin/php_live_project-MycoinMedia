<?php
/*
* Define Users Model
*/
namespace Modules\Users\Models;
use CodeIgniter\Model;

class ProfileModel extends Model
{   
    protected $table = 'users';
    protected $allowedFields = [
        'user_id',
        'user_name',
        'user_email',
        'user_mobile', 
        'user_password', 
        'user_address' , 
        'user_country',
        'company_name',
        'company_address',
        'company_country',
        'company_website',
        'company_other_details'
    ];

    public function ProfileData($uid)
    {
        $db = \Config\Database::connect();
        $table = 'users';
        $result = $this->db->query("SELECT * from $table where `user_id` = '$uid';")->getResult('array');
        return $result;
    }
    
    public function update_data($id, $data)
    {
        $uname = $data['user_name'];
        $uemail = $data['user_email'];
        $umobile = $data['user_mobile'];
        // $upass = $data['user_password'];  
        $uaddress = $data['user_address'];
        $ucountry = $data['user_country'];
        $uprofile = $data['user_profile_pic'];
        $cname = $data['company_name'];
        $caddress = $data['company_address'];
        $ccountry = $data['company_country'];
        $cweb = $data['company_website'];
        $cod = $data['company_other_details'];

        $db = \Config\Database::connect();
        $table = 'users';
        $result = $this->db->query("UPDATE $table SET 
                                    `user_name` = '$uname',
                                    `user_email` = '$uemail',
                                    `user_mobile` = '$umobile', 
                                    
                                    `user_address` = '$uaddress', 
                                    `user_country` = '$ucountry',
                                    `user_profile_pic` = '$uprofile',
                                    `company_name` = '$cname',
                                    `company_address` = '$caddress',
                                    `company_country` = '$ccountry',
                                    `company_website` = '$cweb',
                                    `company_other_details` = '$cod'
                                    where `user_id`= '$id'; ");
        return $result;
    }

    public function insert_data($uid, $data)
    {
        $cname = $data['company_name'];
        $uname = $data['user_name'];
        $umobile = $data['user_mobile'];
        $uemail = $data['user_email'];
        $db = \Config\Database::connect();
        $table = 'users';
        $result = $this->db->query("UPDATE $table SET
                                    `user_name` = '$uname',
                                    `user_mobile` = '$umobile',
                                    `user_email` = '$uemail',
                                    `company_name` = '$cname'
                                    where `user_id`= '$uid';");
        return $result;

    }

    public function updateCompany($uid, $data)
    {
        $uname = $data['user_name'];
        $uemail = $data['user_email'];
        $umobile = $data['user_mobile'];
        $cname = $data['company_name'];
        $caddress = $data['company_address'];
        $ccountry = $data['company_country'];
        $cweb = $data['company_website'];
        $cod = $data['company_other_details'];

        $db = \Config\Database::connect();
        $table = 'users';
        $result = $this->db->query("UPDATE $table SET 
                                    `user_name` = '$uname',
                                    `user_email` = '$uemail',
                                    `user_mobile` = '$umobile', 
                                    `company_name` = '$cname',
                                    `company_address` = '$caddress',
                                    `company_country` = '$ccountry',
                                    `company_website` = '$cweb',
                                    `company_other_details` = '$cod'
                                    where `user_id`= '$uid'; ");
        return $result;

    }
}