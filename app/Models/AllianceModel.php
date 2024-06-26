<?php

namespace App\Models;

use CodeIgniter\Model;

class AllianceModel extends Model
{
    protected $table            = 'wh_alliance';
    protected $primaryKey       = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'member_ci',
                                    'alliance_ci',
                                    'alliance_ceo_num',
                                    'alliance_type',
                                    'company_contact',
                                    'email',
                                    'company_name',
                                    'representative_name',
                                    'address',
                                    'detailed_address',
                                    'representative_contact',
                                    'business_day',
                                    'business_hour_start',
                                    'business_hour_end',
                                    'detailed_content',
                                    'alliance_application',
                                    'alliance_pay',
                                    'delete_yn',
                                    'create_at',
                                    'update_at',
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
