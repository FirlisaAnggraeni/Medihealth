<?php

namespace App\Models;

use CodeIgniter\Model;

class CartTransaction extends Model
{
    protected $table = 'cart_transaction';

    public function find($where = [])
    {
        return $this->db->table($this->table)->select("product.*, cart.*")
            ->where($where)
            ->join("cart", "cart_transaction.cart_id = cart.id")
            ->join("product", "cart.product_id = product.id")
            ->get()->getResultArray();
    }

    public function findByUserId($user_id)
    {
        return $this->db->table($this->table)
            ->join("transaction", "cart_transaction.transaction_id = transaction.id")
            ->where("user_id", $user_id)
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

    public function destroyByCart($id)
    {
        $query = $this->db->table($this->table)->delete(['cart_id' => $id]);
        return $query;
    }

    public function destroyByTransaction($id)
    {
        $query = $this->db->table($this->table)->delete(['transaction_id' => $id]);
        return $query;
    }
}
