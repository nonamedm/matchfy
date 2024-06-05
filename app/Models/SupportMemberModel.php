<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportMemberModel extends Model
{
    // protected $tableName;
    protected $table = 'wh_support_members';
    protected $primaryKey = 'ci';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        // 준회원 구간
        'idx',
        'name',
        'birthday',
        'gender',
        'city',
        'town',
        'unique_code',
        'recommender_code',
        'mobile_no',
        'email',
        'password',
        'ci',
        'agree1',
        'agree2',
        'agree3',
        'grade',
        'status',
        'sns_type',
        'oauth_id',
        'os_type',
        'delete_yn',
        'last_access_dt',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function setTableName($table)
    {
        $this->table = $table;
    }

    public function getTableName()
    {
        return $this->table;
    }


    public function findByOauthId($oauthId, $providerName)
    {
        $existingUser = $this->where('sns_type', $providerName)
            ->where('oauth_id', $oauthId)
            ->first();

        return $existingUser;
    }
}
