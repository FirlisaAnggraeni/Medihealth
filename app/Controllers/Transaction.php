<?php

namespace App\Controllers;

use App\Models\Transaction as ModelTransaction;
use App\Models\CartTransaction as ModelCartTransaction;
use App\Models\Cart as ModelCart;

class Transaction extends BaseController
{
	public function __construct()
	{
		$this->transaction = new ModelTransaction();
		$this->cart_transaction = new ModelCartTransaction();
		$this->cart = new ModelCart();
	}

	public function buy()
	{
		$transaction = [
			"user_id"	=> session()->get("user")["id"],
			"datetime"	=> date("Y-m-d h:i:s"),
		];

		$transaction_id = $this->transaction->create($transaction);
		
		$carts = $this->cart->find(["user_id" => session()->get("user")["id"]]);
		foreach ($carts as $cart) {
			$cart_transaction = [
				"cart_id" => $cart["id"],
				"transaction_id" => $transaction_id
			];
			$this->cart_transaction->create($cart_transaction);
		} 

		return redirect()->to(base_url("transaction"));
	}
}
