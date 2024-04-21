<?php

namespace App\Models;

use CodeIgniter\Model;

class MeetingPersonModel extends Model
{
    protected $table            = 'wh_meeting_person';
    protected $primaryKey       = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'idx',
        'member_ci',
        'scdl_type',
        'scdl_date',
        'number_of_people',
        'membership_fee',
        'create_at',
        'update_at',
        'delete_yn',
        'chat_room_ci',
        'extra_field1',
        'extra_field2',
        'extra_field3'
    ];


    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
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
