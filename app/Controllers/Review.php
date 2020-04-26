<?php

namespace App\Controllers;

use App\Models\Review as ModelReview;

class Review extends BaseController
{
	public function __construct()
	{
		$this->review = new ModelReview();
	}

	public function create($product_id)
	{
		$data = [
			"review" 		=> $this->request->getPost("review"),
			"user_id"		=> session()->get("user")["id"],
			"product_id"	=> $product_id,
		];

		$this->review->create($data);
		return redirect()->to(base_url("product/$product_id"));
	}

	public function destroy($id)
	{
		$review = $this->review->findOne(["id" => $id]);
		$this->review->destroy($id);

		return redirect()->to(base_url("product/$review[product_id]"));
	}
}
