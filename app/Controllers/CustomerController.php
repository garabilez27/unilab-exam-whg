<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends BaseController
{
    // Variables
    private $root;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->root = 'customer';
    }

    public function index()
    {
        $customerModel = new Customer();
        $userModel = new User();
        $data['root_page'] = ucfirst($this->root);
        $data['customers'] = $customerModel->findAll();
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

        $customerModel = new Customer();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'lname' => 'required',
            'fname' => 'required',
            'mobile' => 'required|numeric|min_length[8]|max_length[10]',
            'city' => 'required',
            'selUser' => 'required|numeric',
        ])) {
            // Check for duplicate entry
            $fullname = $this->request->getPost('lname').','.$this->request->getPost('fname');
            $custRec = $customerModel->where('fullname', $fullname)->orWhere('mobileNumber', $this->request->getPost('mobile'))->findAll();
            if(count($custRec) > 0) {
                session()->setFlashdata('error', 'Duplicate entry. [Customer Name or Mobile Number]');
                return redirect()->to('customers');
            }

            // Validation passed, save the customer
            $data = [
                'firstname' => $this->request->getPost('fname'),
                'lastname' => $this->request->getPost('lname'),
                'fullname' => $fullname,
                'mobileNumber' => $this->request->getPost('mobile'),
                'city' => $this->request->getPost('city'),
                'userID' => $this->request->getPost('selUser'),
                'createdBy' => $this->request->getPost('selUser')
            ];

            $customerModel->insert($data);
            session()->setFlashdata('success', 'Customer data has been saved.');
            return redirect()->to('customers');
        } else {
            session()->setFlashdata('error', 'Please check your inputs.');
            return redirect()->to('customers')->withInput();
        }
    }

    public function edit($id = null) 
    {
        $customerModel = new Customer();
        $data = $customerModel->find($id);

        // Check if the customer data was found
        if ($data) {
            $customer = [
                'lname' => $data['lastname'],
                'fname' => $data['firstname'],
                'mobile' => $data['mobileNumber'],
                'city' => $data['city'],
                'status' => $data['active'],
                'uid' => $data['userID']
            ];

            // Set JSON response headers
            header('Content-Type: application/json');

            // Encode and send the customer data as JSON
            echo json_encode($customer);
        } else {
            // Handle the case where the customer is not found
            header('HTTP/1.1 404 Not Found');
            echo json_encode(['error' => 'Customer not found']);
        }
    }

    public function patch($id = null)
    {
        helper('form');
        $customerModel = new Customer();

        // Assuming $id is the identifier for the customer record you want to update

        if ($this->request->getMethod() === 'post' && $this->validate([
            'lname' => 'required',
            'fname' => 'required',
            'mobile' => 'required|numeric|min_length[8]|max_length[10]',
            'city' => 'required',
            'selUser' => 'required|numeric',
            'status' => 'required|numeric'
        ])) {
             $fullname = $this->request->getPost('lname').','.$this->request->getPost('fname');

            // Check for duplicate entry
            $curRec = $customerModel->find($id);
            if($curRec['fullname'] != $fullname || $curRec['mobileNumber'] != $this->request->getPost('mobile')) {
                $custRec = $customerModel->where('fullname', $fullname)->orWhere('mobileNumber', $this->request->getPost('mobile'))->findAll();
                if(count($custRec) > 0) {
                    session()->setFlashdata('error', 'Update failed! Customer details is already existing. [Customer Name or Mobile Number]');
                    return redirect()->to('customers');
                }
            }

            // Validation passed, update the customer
            $data = [
                'firstname' => $this->request->getPost('fname'),
                'lastname' => $this->request->getPost('lname'),
                'fullname' => ($this->request->getPost('lname') . ',' . $this->request->getPost('fname')),
                'mobileNumber' => $this->request->getPost('mobile'),
                'city' => $this->request->getPost('city'),
                'userID' => $this->request->getPost('selUser'),
                'active' => $this->request->getPost('status'),
            ];

            $customerModel->update($id, $data); // Assuming you're using the id to identify the record to update
            session()->setFlashdata('success', 'Customer data has been updated.');
            return redirect()->to('customers');
        } else {
            session()->setFlashdata('error', 'Please check your inputs.');
            return redirect()->to('customers')->withInput();
        }
    }
}
