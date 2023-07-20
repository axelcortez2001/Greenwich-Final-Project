<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytics extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Order_model');
        $this->load->model('Analytics_model');
        $this->load->model('Inventory_model');
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['daily_sales'] = $this->Analytics_model->get_daily_sales();
            $data['monthly_sales'] = $this->Analytics_model->get_monthly_sales();

            $transactions = $this->Order_model->get_ordertransactions();
            $cartItems = [];
            if (!empty($transactions)) {
                foreach ($transactions as $transaction) {
                    $cartItems[$transaction->trans_id] = unserialize($transaction->cart_data);
                }
            }
            $topSales = [];
            if (!empty($cartItems)) {
                foreach ($cartItems as $items) {
                    foreach ($items as $item) {
                        $productId = $item['id'];
                        $quantity = $item['qty'];

                        if (isset($topSales[$productId])) {
                            $topSales[$productId] += $quantity;
                        } else {
                            $topSales[$productId] = $quantity;
                        }
                    }
                }
            }
            arsort($topSales, SORT_NUMERIC);
            // Get the top 5 products
            $topProducts = array_slice($topSales, 0, 5, true);
            //Retrieve product names
            $labels = [];
            foreach ($topProducts as $productId => $quantity) {
                $product = $this->Inventory_model->get_prodById($productId);
                if ($product) {
                    $labels[$productId] = $product->name;
                }
            }
            $data['transactions'] = $transactions;
            $data['cartItems'] = $cartItems;
            $data['labels'] = $labels;
            $data['topProducts'] = $topProducts;
            if (empty($transactions) || empty($cartItems)) {
                $data['noSalesMessage'] = 'No sales have been made.';
            }
            $this->load->view('Analytics/Sale_Analytics', $data);
        } else {
            redirect('login');
        }
    }
    public function Expense()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['daily_expense'] = $this->Analytics_model->get_daily_expenses();
            $data['monthly_expense'] = $this->Analytics_model->get_monthly_expenses();
            $this->load->view('Analytics/Expense_Analytics', $data);
        } else {
            redirect('login');
        }
    }
    public function all()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['daily_expense'] = $this->Analytics_model->get_daily_expenses();
            $data['monthly_expense'] = $this->Analytics_model->get_monthly_expenses();
            $data['daily_sales'] = $this->Analytics_model->get_daily_sales();
            $data['monthly_sales'] = $this->Analytics_model->get_monthly_sales();
            $this->load->view('Analytics/All_Analytics', $data);
        } else {
            redirect('login');
        }
    }
}
