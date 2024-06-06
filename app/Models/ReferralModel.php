<?php

namespace App\Models;

use CodeIgniter\Model;

class ReferralModel extends Model
{
    // protected $tableName;
    protected $table = 'wh_referral';
    protected $primaryKey = 'idx';
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
        'marital',
        'mobile_no',
        'city',
        'town',
        'height',
        'education',
        'job',
        'reason',
        'recommend_member_idx',
        'delete_yn'
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
}
