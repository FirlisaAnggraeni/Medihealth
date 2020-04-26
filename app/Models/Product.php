<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'product';

    public function find($where = [])
    {
        return $this->getWhere($where)->getResultArray();
    }

    public function findLike($where = [])
    {
        return $this->db->table($this->table)->like($where)->get()->getResultArray();
    }

    public function findOne($where = [])
    {
        return $this->getWhere($where)->getRowArray();
    }

    public function create($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function edit($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, ['id' => $id]);
        return $query;
    }

    public function destroy($id)
    {
        $query = $this->db->table($this->table)->delete(['id' => $id]);
        return $query;
    }
}
