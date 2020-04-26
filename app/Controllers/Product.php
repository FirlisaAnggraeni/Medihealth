<?php

namespace App\Controllers;

use App\Models\Product as ModelProduct;

helper("filesystem");

class Product extends BaseController
{
	public function __construct()
	{
		$this->product = new ModelProduct();
	}

	public function create()
	{
		$product_id = $this->product->create($this->request->getPost());

		$banner = $this->request->getFile("banner");
		$data = ["banner" => "banner/$product_id.{$banner->getExtension()}"];

		$banner->move(FCPATH, $data["banner"], true);
		$this->product->edit($data, $product_id);

		return redirect()->to(base_url());
	}

	public function edit($id)
	{
		$data = $this->request->getPost();
		$banner = $this->request->getFile("banner");

		if ($banner->isValid()) {
			$data["banner"] = "banner/$id.{$banner->getExtension()}";
			$banner->move(FCPATH, $data["banner"], true);
		}

		$this->product->edit($data, $id);
		return redirect()->to(base_url("product/$id"));
	}

	public function destroy($id)
	{
		if (glob(FCPATH . "banner/$id.*")) {
			unlink(glob(FCPATH . "banner/$id.*")[0]);
		}

		$this->product->destroy($id);
		return redirect()->to(base_url());
	}
}
