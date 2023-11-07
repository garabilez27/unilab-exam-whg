<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class DashboardController extends BaseController
{
    // Variables
    private $root;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->root = 'dashboard';
    }

    public function index()
    {
        $data['root_page'] = ucfirst($this->root);

        return view('include/default/header', $data)
        	.view('include/default/sidebar')
        	.view('include/default/navbar')
        	.view('pages/'.$this->root.'/index')
        	.view('include/default/footer');
    }
}
