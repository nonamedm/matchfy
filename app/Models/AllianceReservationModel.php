<?php

namespace App\Models;

use CodeIgniter\Model;

class AllianceReservationModel extends Model
{
    protected $table            = 'wh_alliance_reservation';
    protected $primaryKey       = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'wh_alliance_idx', 
                                    'member_ci',
                                    'alliance_name', 
                                    'customer_name', 
                                    'customer_contact',
                                    'number_of_people', 
                                    'reservation_amount', 
                                    'reservation_datetime',
                                    'reservation_date', 
                                    'reservation_time', 
                                    'delete_yn', 
                                    'reg_date'
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
