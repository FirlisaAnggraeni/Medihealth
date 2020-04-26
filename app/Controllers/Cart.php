<?php

namespace App\Controllers;

use App\Libraries\Alert;
use App\Models\Cart as ModelCart;
use App\Models\Product as ModelProduct;

class Cart extends BaseController
{
	public function __construct()
	{
		$this->cart = new ModelCart();
		$this->product = new ModelProduct();
	}

	public function add($product_id)
	{
		$data = [
			"product_id" 	=> $product_id,
			"user_id" 		=> session()->get("user")["id"],
			"qty"			=> 1
		];
		$this->cart->create($data);

		$product = $this->product->findOne(["id" => $product_id]);
		$this->product->edit(["stock" => $product["stock"] - 1], $product_id);

		Alert::message("add to cart successfully")->redirect(base_url("product/$product_id"));
	}

	public function edit($id)
	{
		$cart = $this->cart->findOne(["id" => $id]);
		$product = $this->product->findOne(["id" => $cart["product_id"]]);

		$this->cart->edit($this->request->getPost(), $id);
		$this->product->edit(["stock" => ($product["stock"] + $cart["qty"] - $this->request->getPost("qty"))], $product["id"]);

		return redirect()->to(base_url("cart"));
	}

	public function destroy($id)
	{
		$cart = $this->cart->findOne(["id" => $id]);
		$product = $this->product->findOne(["id" => $cart["product_id"]]);

		$this->cart->destroy($id);
		$this->product->edit(["stock" => ($product["stock"] + $cart["qty"])], $product["id"]);

		return redirect()->to(base_url("cart"));
	}
}
