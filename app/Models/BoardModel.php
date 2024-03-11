<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardModel extends Model
{
    // protected $tableName;
    protected $table;
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['title', 'content', 'author', 'update_author', 'created_at', 'updated_at', 'used', 'hit', 'likes', 'bigo1', 'bigo2', 'bigo3', 'board_type','created_at_range'];

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

    public function increaseHit($id) {
        // 이미 생성된 BoardModel 인스턴스 사용
        $this->set('hit', 'hit+1', FALSE); // 조회수 1 증가
        $this->where('id', $id); // 해당 ID의 레코드에 대해
        $this->update($this->tableName); // 업데이트 실행
    }
}
