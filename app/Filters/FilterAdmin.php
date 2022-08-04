<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        //cek apakah role id = 1 atau super admin
        if (!in_groups('admin')) {
            //jika tidak 
            session()->setFlashdata('pesan', 'Tidak dapat mengakses halaman tersebut!');
            return redirect()->to(site_url('/pages'));
            // throw new \CodeIgniter\Exceptions\PageNotFoundException("Maaf Anda Bukan Super Admin");
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
