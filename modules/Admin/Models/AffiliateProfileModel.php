<?php 
/*
 *  Admin Module Affiliate Profile Data 
 * 
 */
namespace Modules\Admin\Models;
use CodeIgniter\Model;

class AffiliateProfileModel extends Model
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


    public function getAffiliateData()
    {
        $user = 'affiliate';
        $db = \Config\Database::connect();
        $table = 'users';
        $result = $this->db->query("SELECT * From $table WHERE `user_role`= '$user';")->getResult('array');
        return $result;
    }


}