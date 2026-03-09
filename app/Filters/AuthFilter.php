<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        // Check if roles are provided for this route
        if ($arguments && is_array($arguments)) {
            $userRole = session()->get('role');
            
            // If the user's role is not in the allowed roles for this route
            if (!in_array($userRole, $arguments)) {
                // Return a 401 Unauthorized response using the custom error_401 view
                return \Config\Services::response()
                    ->setStatusCode(401)
                    ->setBody(view('errors/html/error_401', ['message' => 'You do not have permission to access that page.']));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}
