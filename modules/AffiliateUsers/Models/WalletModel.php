<?php
/*
 *  Affiliate Users Module Wallet Money Model   
 */

namespace Modules\AffiliateUsers\Models;
use CodeIgniter\Model;

class WalletModel extends Model 
{
    protected $table = 'wallet';
    protected $allowedfields = [
        'id',
        'user_id',
        'amount',
        'type',
        'message',
        'wallet_balance',
        'wallet_txn_id',
        'added_on'
    ];

    public function insertWalletData($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('wallet');
        $result = $builder->insert($data);
        return $result;
    }

    public function getwalletData($uid)
    {
        $db = \Config\Database::connect();
        $table = 'wallet';
        $result = $this->db->query("SELECT * FROM $table where `user_id` = '$uid' ;")->getResult('array');
        return $result;
    }

    public function updateBal($balance, $id)
    {
        $db = \Config\Database::connect();
        $table = 'wallet';
        $result  = $this->db->query("UPDATE $table SET `wallet_balance` = '$balance' where `id` = '$id';");
        return $result;

    }

    public function getwalletCurrentBalance($uid)
    {
        $db = \Config\Database::connect();
        $table = 'wallet';
        $result = $this->db->query("SELECT * FROM $table where `user_id` = '$uid' order by `id` DESC LIMIT 1;")->getResult('array');
        return $result;
        
    }
}