<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchFactorModel extends Model
{
    // protected $tableName;
    protected $table = 'wh_match_factor';
    protected $primaryKey = 'member_ci';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'idx',
        'member_ci',
        'group1',
        'group2',
        'group3',
        'group4',
        'group5',
        'first_factor',
        'first_factor_point',
        'second_factor',
        'second_factor_point',
        'third_factor',
        'third_factor_point',
        'fourth_factor',
        'fourth_factor_point',
        'fifth_factor',
        'except1',
        'except2',
        'except1_detail',
        'except2_detail',
        'except3',
        'except4',
        'except5',
        'delete_yn',
        'last_access_dt'
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
