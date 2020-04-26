<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart extends Model
{
    protected $table = 'cart';

    public function find($where = [])
    {
        return $this->db->table($this->table)->select("product.*, cart.*")
            ->where($where)
            ->join("product", "cart.product_id = product.id")
            ->join("cart_transaction", "cart_transaction.cart_id = cart.id", "left")
            ->where("cart_transaction.cart_id", null)
            ->get()->getResultArray();
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
