<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportRewordModel extends Model
{
    // protected $tableName;
    protected $table = 'wh_support_reward';
    protected $primaryKey = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        // 준회원 구간
        'idx',
        'ci',
        'recommender_ci',
        'reward_type',
        'check',
        'reward_title',
        'reward_date',
        'reward_meeting_idx',
        'reward_meeting_members',
        'reward_meeting_percent',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $rewardDateField = 'reward_date';
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
}
