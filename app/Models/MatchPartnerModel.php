<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchPartnerModel extends Model
{
    // protected $tableName;
    protected $table = 'wh_match_partner';
    protected $primaryKey = 'member_ci';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        // 준회원 구간
        'idx',
        'member_ci',
        'partner_gender',
        'animal_type1',
        'animal_type2',
        'animal_type3',
        'height',
        'stylish',
        'married',
        'smoker',
        'drinking',
        'religion',
        'mbti',
        'education',
        'job',
        'asset_range',
        'income_range',
        'father_birth_year',
        'father_job',
        'mother_birth_year',
        'mother_job',
        'siblings',
        'residence1',
        'residence2',
        'residence3',
        'delete_yn', 'last_access_dt'
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
