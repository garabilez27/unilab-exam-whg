<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\SKU;
use App\Models\User;

class SKUController extends BaseController
{
    // Variables
    private $root;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->root = 'sku';
    }

    public function index()
    {
        $skuModel = new SKU();
        $userModel = new User();
        $data['root_page'] = ucfirst($this->root);
        $data['skus'] = $skuModel->findAll();
        $data['users'] = $userModel->findAll();

        return view('include/default/header', $data)
            .view('pages/'.$this->root.'/add-modal')
            .view('pages/'.$this->root.'/edit-modal')
        	.view('include/default/sidebar')
        	.view('include/default/navbar')
        	.view('pages/'.$this->root.'/index')
        	.view('include/default/footer');
    }

    public function store()
    {
        helper('form');
        $skuModel = new SKU();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required|numeric',
            'selUser' => 'required'
        ])) {
            // Check for duplicate entry
            $skuRec = $skuModel->where('name', $this->request->getPost('name'))->orWhere('code', $this->request->getPost('code'))->findAll();
            if(count($skuRec) > 0) {
                session()->setFlashdata('error', 'Duplicate entry. [SKU Name or Code]');
                return redirect()->to('skus');
            }

            // Validation passed, save the customer
            $image = $this->request->getFile('image');

            // Generate a unique image name
            $imageName = $image->getRandomName();

            $data = [
                'name' => $this->request->getPost('name'),
                'code' => $this->request->getPost('code'),
                'unitPrice' => $this->request->getPost('price'),
                'img' => $imageName,
                'userID' => $this->request->getPost('selUser'),
                'createdBy' => $this->request->getPost('selUser')
            ];

            $skuModel->insert($data);
            // Move the image to the public/uploads directory
            $image->move(ROOTPATH . 'public/assets/img/sku', $imageName);

            session()->setFlashdata('success', 'SKU has been saved.');
            return redirect()->to('skus');
        } else {
            session()->setFlashdata('error', 'Please check your inputs.');
            return redirect()->to('skus')->withInput();
        }
    }

    public function edit($id = null) 
    {
        $skuModel = new SKU();
        $data = $skuModel->find($id);

        // Check if the customer data was found
        if ($data) {
            $sku = [
                'name' => $data['name'],
                'code' => $data['code'],
                'price' => $data['unitPrice'],
                'status' => $data['active'],
                'uid' => $data['userID']
            ];

            // Set JSON response headers
            header('Content-Type: application/json');

            // Encode and send the customer data as JSON
            echo json_encode($sku);
        } else {
            // Handle the case where the customer is not found
            header('HTTP/1.1 404 Not Found');
            echo json_encode(['error' => 'Customer not found']);
        }
    }

    public function patch($id = null)
    {
        helper('form');
        $skuModel = new SKU();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required|numeric',
            'selUser' => 'required|numeric',
            'status' => 'required|numeric'
        ])) {
            // Check for duplicate entry
            $curRec = $skuModel->find($id);
            if($curRec['name'] != $this->request->getPost('name') || $curRec['code'] != $this->request->getPost('code')) {
                $skuRec = $skuModel->where('name', $this->request->getPost('name'))->orWhere('code', $this->request->getPost('code'))->findAll();
                if(count($skuRec) > 0) {
                    session()->setFlashdata('error', 'Duplicate entry. [SKU Name or Code]');
                    return redirect()->to('skus');
                }
            }

            $data = [
                'name' => $this->request->getPost('name'),
                'code' => $this->request->getPost('code'),
                'unitPrice' => $this->request->getPost('price'),
                'userID' => $this->request->getPost('selUser'),
                'active' => $this->request->getPost('status'),
            ];

            // Validation passed, save the customer
            $image = $this->request->getFile('image');

            if ($image->isValid()) {
                // Generate a unique image name
                $imageName = $image->getRandomName();

                // Move the image to the public/uploads directory
                $image->move(ROOTPATH . 'public/assets/img/sku', $imageName);

                // Remove old image
                $oldImg = FCPATH.'assets/img/sku/'.$curRec['img'];
                unlink($oldImg);

                $data['img'] = $imageName;
            }

            $skuModel->update($id, $data);

            session()->setFlashdata('success', 'SKU has been updated successfully.');
            return redirect()->to('skus');
        } else {
            session()->setFlashdata('error', 'Please check your inputs.');
            return redirect()->to('skus')->withInput();
        }
    }
}
