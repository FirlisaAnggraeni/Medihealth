<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;

helper("admin");

class Web extends BaseController
{
	public function __construct()
	{
		$this->product = new Product();
		$this->transaction = new Transaction();
		$this->review = new Review();
		$this->cart = new Cart();
		$this->user = new User();
	}

	//--------------------------------------------------------------------
	public function home()
	{
		$products = $this->product->findLike($this->request->getGet());
		return view('content/index', ["products" => $products]);
	}

	//--------------------------------------------------------------------
	public function login()
	{
		$products = $this->product->findLike($this->request->getGet());
		return view("content/log/login", ["products" => $products]);
	}

	public function logout()
	{
		session()->remove("user");
		return redirect()->to(base_url("login"));
	}

	public function register()
	{
		$products = $this->product->findLike($this->request->getGet());
		return view("content/log/register", ["products" => $products]);
	}

	//--------------------------------------------------------------------
	public function about()
	{
		return view("content/about/index");
	}

	//--------------------------------------------------------------------
	public function profile()
	{
		return view("content/profile/index");
	}

	//--------------------------------------------------------------------
	public function detailProduct($id)
	{
		$product = $this->product->findOne(["id" => $id]);
		$reviews = $this->review->find(["product_id" => $product["id"]]);
		return view("content/product/detail", ["product" => $product, "reviews" => $reviews]);
	}

	public function createProduct()
	{
		return view("content/product/form");
	}

	public function editProduct($id)
	{
		$product = $this->product->findOne(["id" => $id]);
		return view("content/product/form", ["product" => $product]);
	}

	//--------------------------------------------------------------------
	public function cart()
	{
		$carts = $this->cart->find(["user_id" => session()->get("user")["id"]]);
		return view("content/cart/index", ["carts" => $carts]);
	}

	//--------------------------------------------------------------------
	public function transaction()
	{
		$transactions = $this->transaction->find(["user_id" => session()->get("user")["id"]]);
		return view("content/transaction/index", ["transactions" => $transactions]);
	}
}
