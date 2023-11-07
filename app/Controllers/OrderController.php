<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\Order;
use App\Models\Status;
use App\Models\SKU;
use App\Models\Customer;
use App\Models\Item;

class OrderController extends BaseController
{
    // Variables
    private $root;

	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->root = 'order';
    }

    public function index()
    {
        $orderModel = new Order();
        $customerModel = new Customer();
        $data['root_page'] = ucfirst($this->root);
        $data['orders'] = $orderModel->findAll();
        foreach ($data['orders'] as $key => $value) {
            $data['orders'][$key]['customer'] = $customerModel->find($value['customerID']);
        }
        

        return view('include/default/header', $data)
        	.view('include/default/sidebar')
        	.view('include/default/navbar')
        	.view('pages/'.$this->root.'/index')
        	.view('include/default/footer');
    }

    public function takeOrder()
    {
        $orderModel = new Order();
        $statusModel = new Status();
        $customerModel = new Customer();
        $skuModel = new SKU();
        $data['root_page'] = ucfirst($this->root);
        $data['status'] = $statusModel->findAll();
        $data['customers'] = $customerModel->where('active', 1)->findAll();
        $data['skus'] = $skuModel->where('active', 1)->findAll();

        return view('include/default/header', $data)
            .view('pages/'.$this->root.'/modal')
            .view('include/default/sidebar')
            .view('include/default/navbar')
            .view('pages/'.$this->root.'/add')
            .view('include/default/footer');
    }

    public function store()
    {
        helper('form');
        $orderModel = new Order();
        $statusModel = new Status();
        $customerModel = new Customer();
        $skuModel = new SKU();
        $itemModel = new Item();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'customer' => 'required|numeric',
            'dt' => 'required',
            'status' => 'required|numeric',
        ])) {
            // Validation passed, save the customer
            $data = [
                'customerID' => $this->request->getPost('customer'),
                'dateOfDelivery' => $this->request->getPost('dt'),
                'status' => $this->request->getPost('status'),
                'amountDue' => $this->request->getPost('dueAmt'),
                'userID' => 1,
                'createdBy' => 1
            ];
            $orderModel->insert($data);
            $poID = $orderModel->insertID();

            $items = $this->request->getPost('items');
            $tamount = 0;
            $due = 0;
            if(count($items) > 0) {
                foreach ($items as $item => $value) {
                    $arr = explode('|', $value);
                    $sku = $skuModel->find($arr[0]);
                    $tamount = $sku['unitPrice'] * $arr[1];
                    $due+=$tamount;
                    $data = [
                        'poID' => $poID,
                        'skuID' => $arr[0],
                        'quantity' => $arr[1],
                        'price' => $tamount,
                        'userID' => 1
                    ];
                    $itemModel->insert($data);
                }
            }

            $orderModel->update($poID, ['amountDue' => $due]);
            session()->setFlashdata('success', 'Order placed.');
            return redirect()->to('orders');
        } else {
            session()->setFlashdata('error', 'Invalid order.');
            return redirect()->to('orders/new')->withInput();
        }
    }

    public function editOrder($id = null) 
    {
        helper('form');
        $orderModel = new Order();
        $statusModel = new Status();
        $customerModel = new Customer();
        $skuModel = new SKU();
        $itemModel = new Item();

        $data['order'] = $orderModel->find($id);
        $data['skus'] = $skuModel->where('active', 1)->findAll();
        $data['status'] = $statusModel->findAll();
        $data['customers'] = $customerModel->where('active', 1)->find($data['order']['customerID']);
        $data['items'] = $itemModel->where('poID', $data['order']['id'])->findAll();
        foreach ($data['items'] as $key => $value) {
            $data['items'][$key]['skuDet'] = $skuModel->find($value['skuID']);
        }
        $data['root_page'] = ucfirst($this->root);

        return view('include/default/header', $data)
            .view('pages/'.$this->root.'/modal')
            .view('include/default/sidebar')
            .view('include/default/navbar')
            .view('pages/'.$this->root.'/edit')
            .view('include/default/footer');
    }

    public function patch($id = null)
    {
        helper('form');
        $orderModel = new Order();
        $statusModel = new Status();
        $customerModel = new Customer();
        $skuModel = new SKU();
        $itemModel = new Item();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'customer' => 'required|numeric',
            'dt' => 'required',
            'status' => 'required|numeric',
        ])) {
            // Validation passed, save the customer
            $data = [
                'customerID' => $this->request->getPost('customer'),
                'dateOfDelivery' => $this->request->getPost('dt'),
                'status' => $this->request->getPost('status'),
                'amountDue' => $this->request->getPost('dueAmt'),
                'userID' => 1,
                'createdBy' => 1
            ];
            $orderModel->update($id, $data);
            $itemModel->where('poID', $id)->delete();

            $items = $this->request->getPost('items');
            $tamount = 0;
            $due = 0;
            if(count($items) > 0) {
                foreach ($items as $item => $value) {
                    $arr = explode('|', $value);
                    $sku = $skuModel->find($arr[0]);
                    $tamount = $sku['unitPrice'] * $arr[1];
                    $due+=$tamount;
                    $data = [
                        'poID' => $id,
                        'skuID' => $arr[0],
                        'quantity' => $arr[1],
                        'price' => $tamount,
                        'userID' => 1
                    ];
                    $itemModel->insert($data);
                }
            }

            $orderModel->update($id, ['amountDue' => $due]);
            session()->setFlashdata('success', 'Order update successs.');
            return redirect()->to('orders');
        } else {
            session()->setFlashdata('error', 'Invalid order.');
            return redirect()->to('orders/new')->withInput();
        }
    }
}
