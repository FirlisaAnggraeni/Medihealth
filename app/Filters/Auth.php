<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

helper("admin");

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $role = null)
    {
        if (!session()->has('user')) {
            return redirect()->to(base_url("login"));
        }

        if ($role) {
            if ($role[0] == "admin" && !is_admin()) {
                return redirect()->to(base_url());
            } else if ($role[0] == "guest" && is_admin()) {
                return redirect()->to(base_url());
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
