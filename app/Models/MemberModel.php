<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    // protected $tableName;
    protected $table = 'members';
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
        'nickname',
        'video_profile_url',
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
        'temp_grade',
        'status',
        'sns_type',
        'oauth_id',
        'os_type',
        // 정회원 구간
        'married',
        'smoker',
        'bodyshape',
        'drinking',
        'religion',
        'mbti',
        'height',
        'stylish',
        'education',
        'school',
        'major',
        'job',
        'asset_range',
        'income_range',
        // 프리미엄 구간
        'father_birth_year',
        'father_job',
        'mother_birth_year',
        'mother_job',
        'siblings',
        'residence1',
        'residence2',
        'residence3',
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


    public function findByOauthId($oauthId, $providerName)
    {
        $existingUser = $this->where('sns_type', $providerName)
            ->where('oauth_id', $oauthId)
            ->first();

        return $existingUser;
    }
}
