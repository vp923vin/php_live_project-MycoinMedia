<?php 
/*
 * Admin Module Press Release Model
 */

namespace Modules\Admin\Models;
use CodeIgniter\Model;

class PressReleaseModel extends Model 
{
    protected $table = 'press_release';
    protected $allowedFields = [
        'release_number',
        'order_id',
        'package_id',
        'package_name',
        'user_id',
        'company_name',
        'company_link',
        'user_name',
        'user_email',
        'updated_links',
        'status',
        'pr_updated_date',
        'note',
        'crated_at',

    ];

        
    public function viewPressRelease()
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("SELECT * FROM $table ;")->getResult('array');
        return $result;
    } 

    public function editPress($id)
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("SELECT * FROM $table WHERE `release_number` = '$id';")->getResult('array');
        return $result;

    } 

    public function updatePress($id, $data)
    {
       
        $links = $data['updated_links'];
        $status = $data['status'];
        
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("UPDATE $table SET 
                                    `updated_links` = '$links',
                                    `status` = '$status'
                                    WHERE `release_number` = '$id';");

        return $result;
    }

    public function deletePress($id)
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("DELETE FROM $table Where `release_number` = '$id';");
        return $result;
    }

    public function pressDataInsert($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('press_release');
        $result = $builder->insert($data);
        return $result;
    }

    public function getPressReleaseData($uid)
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("SELECT * FROM $table Where `user_id` = '$uid';")->getResult('array');
        return $result;
    }

    public function getSinglePressReleaseData($id)
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("SELECT * FROM $table Where `release_number` = '$id';")->getResult('array');
        return $result;
    }

    public function addingNote($id, $data)
    {
        $note = $data['note'];
        
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("UPDATE $table Set 
        `note` = '$note'
        Where `release_number` = '$id';");
        
        return $result;
    }

    public function getUserId($id)
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("SELECT `user_id` from $table where `release_number` = '$id';")->getResult('array');
        // print_r($result);exit;
        return $result;
    }

    public function getDataForLinkStatusEmail($id)
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("SELECT * FROM $table where `user_id` = '$id' order by `release_number` DESC LIMIT 1;")->getResult('array');
        return $result;
    }

    public function updatelink($id, $data)
    {
        $companyLink = $data['company_link']; 
        $status = $data['status'];
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("UPDATE $table SET `company_link` = '$companyLink', `status` = '$status' WHERE `release_number` = '$id' ; ");
        return $result;
        
    }

    public function getCurrentUserPressData($uid)
    {
        $db = \Config\Database::connect();
        $table = 'press_release';
        $result = $this->db->query("SELECT * From $table where `user_id` = '$uid';")->getResult('array');
        return $result;
    }
}