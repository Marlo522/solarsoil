<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GuestFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // If the user is logged in, restrict admins and sellers from public/guest pages
        if (session()->get('isLoggedIn')) {
            $userRole = session()->get('role');

            if ($userRole == 'admin') {
                return redirect()->to(base_url('/admin/dashboard'));
            } elseif ($userRole == 'seller') {
                return redirect()->to(base_url('/farmer/dashboard'));
            }
            
            // For consumers: restrict them from accessing login/register pages
            // Use segment(1) to get the first routing segment, which works even if the site is in a subfolder like /solarsoil/
            $firstSegment = service('uri')->getSegment(1);
            if ($userRole == 'consumer' && ($firstSegment == 'login' || $firstSegment == 'register')) {
                return redirect()->to(base_url('/'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing here
    }
}
