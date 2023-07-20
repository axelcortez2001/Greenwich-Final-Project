<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->model('Inventory_model');
    }
    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            // Pass the user data to the view
            $data['user'] = $user;

            $categories = ['Special Offers', 'Pizza', 'Pasta', 'Group Meals', 'Solo Meals', 'Drinks'];
            $this->load->model('Inventory_model');

            foreach ($categories as $category) {
                $stocks[$category] = $this->Inventory_model->getStockByCategory($category);
            }
            // Check if the stock is zero and update the stock data
            foreach ($stocks as $category => &$categoryStocks) {
                foreach ($categoryStocks as &$stock) {
                    if ($stock->stock == 0) {
                        $stock->stock = 'Out of Stock';
                        $stock->stockColor = 'red'; // Set the text color to red
                    } else {
                        $stock->stockColor = 'green'; // Set the default text color
                    }
                }
            }

            // Pass the stocks data to the view
            $data['stocks'] = $stocks;

            $this->load->view('Inventory/Stocks', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('login');
        }
    }

    public function add()
    {
        $this->load->view('Inventory/Add_prod');
    }
    public function add_prod()
    {
        if (!empty($_FILES['img']['name'])) {
            $imageFileName = $_FILES['img']['name'];
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('img')) {
                $imageFilePath = $config['upload_path'] . $imageFileName;
            } else {
                $uploadError = $this->upload->display_errors();
                redirect('Inventory/Inventory/add?error=' . urlencode($uploadError));
                return;
            }
        } else {
            redirect('Inventory/Inventory/add?error=' . urlencode('No image file uploaded.'));
            return;
        }
        $data = array(
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'supplier' => $this->input->post('supplier'),
            'img' => $imageFileName,
            'category' => $this->input->post('category')
        );
        $this->Inventory_model->create_prod($data);
        redirect('Inventory/Inventory/add');
    }
    // Display all products
    public function all_products()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['products'] = $this->Inventory_model->get_all_products();
            $data['user'] = $user;
            $this->load->view('Inventory/Buy_products', $data);
        } else {
            redirect('login');
        }
    }


    public function purchase_prod($product_id)
    {
        $user = $this->session->userdata('user');
        $product = $this->Inventory_model->get_prodById($product_id);
        $stocks = $this->Inventory_model->get_stockById($product_id);
        if ($product) {
            $total_product = $this->input->post('total_product');
            $status = $this->input->post('Status');
            $total_amount = $product->price * $total_product;
            $date = date('Y-m-d H:i:s');
            $purchaseData = array(
                'product_id' => $product->product_id,
                'total_product' => $total_product,
                'total_amount' => $total_amount,
                'status' => $status,
                'date' => $date,
            );
            $this->Inventory_model->create_purchase($purchaseData);
            $newStock = $stocks->stock + $this->input->post('total_product');
            $this->Inventory_model->updateStock($product_id, $newStock);
            $this->User_model->log_audit_entry('Purchase Product ' . $product->name . ' with a total quantity of ' . $total_product, $user['emp_id'], $user['name'], $user['job_name']);
            redirect('Inventory/Inventory/purchases');
        }
    }
    //go to buy purchases view
    public function purchases()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['purchases'] = $this->Inventory_model->show_purchase();
            $this->load->view('Inventory/purchases', $data);
        } else {
            redirect('login');
        }
    }
}
