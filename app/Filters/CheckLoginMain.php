<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckLoginMain implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) 
    {
        $session = session();
        if(!$session->has('ci')) {
            // AJAX
            if ($request->isAJAX()) {
                return service('response')->setJSON(['error' => "접근 권한 없음."], 403)->setStatusCode(403);
            }  else { //페이지
                return redirect()->to('/mo');
            }
        };
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}

