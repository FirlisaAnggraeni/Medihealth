<?php

namespace App\Controllers;

use App\Libraries\Alert;
use App\Models\User as ModelUser;

helper("admin");

class User extends BaseController
{
	public function __construct()
	{
		$this->user = new ModelUser();
	}

	public function login()
	{
		$data = $this->request->getPost();
		$data["password"] = md5($data["password"]);

		$user = $this->user->findOne($data);

		if ($user) {
			session()->set("user", $user);

			if (is_admin()) {
				return Alert::message("you logged as an admin")->redirect(base_url("/"));
			}

			return redirect()->to(base_url());
		}

		return Alert::message("user doesn't exist")->redirect(base_url("login"));
	}

	public function register()
	{
		$data = $this->request->getPost();
		$data["password"] = md5($data["password"]);

		$this->user->create($data);
		return redirect()->to(base_url("login"));
	}

	public function changePassword()
	{
		$user = session()->get("user");
		$old_password = md5($this->request->getPost("old_password"));
		$new_password = md5($this->request->getPost("new_password"));

		if ($old_password != $user["password"]) {
			return Alert::message("old password is wrong")->redirect(base_url("profile"));
		}

		$this->user->edit(["password" => $new_password], $user["id"]);
		return Alert::message("change password successfully, please login again")->redirect(base_url("logout"));
	}

	public function edit()
	{
		$this->user->edit($this->request->getPost(), session()->get("user")["id"]);
		return Alert::message("edit profile successfully, please login again")->redirect(base_url("logout"));
	}

	public function destroy()
	{
		$this->user->destroy(session()->get("user")["id"]);
		return redirect()->to(base_url("logout"));
	}
}
