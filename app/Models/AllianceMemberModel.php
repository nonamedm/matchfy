<?php

namespace App\Models;

use CodeIgniter\Model;

class AllianceMemberModel extends Model
{
    protected $table            = 'wh_alliance_members';
    protected $primaryKey       = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'member_ci',
                                    'alliance_ci',
                                    'mobile_no',
                                    'company_name',
                                    'ceo_name',
                                    'gender',
                                    'delete_yn',
                                    'create_at',
                                    'update_at',
                                    'agree1',
                                    'agree2',
                                    'agree3',
                                    'extra1',
                                    'extra2',
                                    'extra3'
                                ];


    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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
