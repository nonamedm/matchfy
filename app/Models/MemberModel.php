<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    // protected $tableName;
    protected $table = 'members';
    protected $primaryKey       = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'idx', 'name', 'birthday', 'gender', 'city', 'town', 'profile_url', 'video_profile_url',
        'unique_code', 'recommender_code', 'mobile_no', 'ci', 'agree1', 'agree2', 'agree3',
        'grade', 'status', 'sns_type', 'os_type', 'married', 'smoker', 'drinking', 'religion',
        'mbti', 'height', 'stylish', 'education', 'school', 'major', 'job', 'asset_range',
        'income_range', 'father_birth_year', 'father_job', 'mother_birth_year', 'mother_job',
        'siblings', 'residence1', 'residence2', 'residence3', 'delete_yn', 'last_access_dt', 'reg_dt'
    ];
                                
    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    
}