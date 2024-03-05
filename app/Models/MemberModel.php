<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'members';
    protected $allowedFields = ['mobile_no', 'ci', 'agree1', 'agree2', 'agree3',
                                'name', 'birthday', 'gender', 'city', 'town'];

    protected $useTimestamps = false;
}
