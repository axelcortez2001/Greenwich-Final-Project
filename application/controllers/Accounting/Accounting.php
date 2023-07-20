<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Accounting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->model('Accounting_model');
        $this->load->model('Order_model');
    }
    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['transactions'] = $this->Accounting_model->gettransactions();
            $data['sales'] = $this->Order_model->get_totalsales();
            $data['expenses'] = $this->Accounting_model->get_AllExpenses();
            $data['income'] = $this->Accounting_model->get_AllExpenses();
            $data['total_cash'] = $this->Accounting_model->get_cash();
            $this->load->view('Accounting/purchases', $data);
        } else {
            redirect('login');
        }
    }
    public function show_purchases()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['expenses'] = $this->Accounting_model->get_AllExpenses();
            $this->load->view('Accounting/purchases', $data);
        } else {
            redirect('login');
        }
    }
    public function getPending()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['transactions'] = $this->Accounting_model->gettransactions();
            $data['sales'] = $this->Order_model->get_totalsales();
            $data['expenses'] = $this->Accounting_model->get_AllExpenses();
            $data['income'] = $this->Accounting_model->get_AllExpenses();
            $data['total_cash'] = $this->Accounting_model->get_cash();
            $this->load->view('Accounting/purchases', $data);
        } else {
            redirect('login');
        }
    }
    //pay purchase through cash
    public function pay_purchase($purchase_id)
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $this->Accounting_model->pay_purchase($purchase_id);
            $this->User_model->log_audit_entry('Pay purchase ' . $purchase_id . ' through Cash', $user['emp_id'], $user['name'], $user['job_name']);
            redirect('Accounting/Accounting');
        } else {
            redirect('login');
        }
    }
    //pay pruchase through card
    public function pay_purchaseCard($purchase_id)
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $this->Accounting_model->pay_purchaseCard($purchase_id);
            $this->User_model->log_audit_entry('Pay purchase ' . $purchase_id . 'through card', $user['emp_id'], $user['name'], $user['job_name']);
            redirect('Accounting/Accounting');
        } else {
            redirect('login');
        }
    }

    //show sale transactions
    public function show_sales()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            // Pass the user data to the view
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['sales'] = $this->Order_model->get_totalsales();
            $transactions = $this->Order_model->get_ordertransactions();
            $data['expenses'] = $this->Accounting_model->get_AllExpenses();
            $data['income'] = $this->Accounting_model->get_AllExpenses();
            $data['total_cash'] = $this->Accounting_model->get_cash();
            $cartItems = array();

            foreach ($transactions as $transaction) {
                $cartItems[$transaction->trans_id] = unserialize($transaction->cart_data);
            }

            $data['transactions'] = $transactions;
            $data['cartItems'] = $cartItems;

            $this->load->view('Accounting/Sale', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('login');
        }
    }

    //show payroll view
    public function show_payroll()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['sales'] = $this->Order_model->get_totalsales();
            $data['Emp'] = $this->Accounting_model->getEmp();
            $data['EmpSal'] = $this->Accounting_model->get_HRExpenses();
            $data['expenses'] = $this->Accounting_model->get_AllExpenses();
            $data['income'] = $this->Accounting_model->get_AllExpenses();
            $data['total_cash'] = $this->Accounting_model->get_cash();
            $this->load->view('Accounting/payroll', $data);
        } else {
            redirect('login');
        }
    }
    public function show_payrollByEmp($emp_id)
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['sales'] = $this->Order_model->get_totalsales();
            $data['PayEmp'] = $this->Accounting_model->getEmpById($emp_id);
            $data['GetPay'] = $this->Accounting_model->get_payrollById($emp_id);
            $data['expenses'] = $this->Accounting_model->get_AllExpenses();
            $data['income'] = $this->Accounting_model->get_AllExpenses();
            $data['total_cash'] = $this->Accounting_model->get_cash();
            $error = $this->input->get('error');
            $success = $this->input->get('success');
            if ($error) {
                $data['error'] = $error;
            } else if ($success) {
                $data['success'] = $success;
            }
            $this->User_model->log_audit_entry('View payroll of ' . $emp_id, $user['emp_id'], $user['name'], $user['job_name']);
            $this->load->view('Accounting/pay_payroll', $data);
        } else {
            redirect('login');
        }
    }
    public function show_addpayroll($emp_id)
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['sales'] = $this->Order_model->get_totalsales();
            $data['PayEmp'] = $this->Accounting_model->getEmpById($emp_id);
            $data['expenses'] = $this->Accounting_model->get_AllExpenses();
            $data['income'] = $this->Accounting_model->get_AllExpenses();
            $data['total_cash'] = $this->Accounting_model->get_cash();
            $this->load->view('Accounting/add_payroll', $data);
        } else {
            redirect('login');
        }
    }
    public function addpayroll()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $emp_id = $this->input->post('emp_id');
            $pay_salary = $this->input->post('pay_salary');
            $sa = $this->Accounting_model->get_cash();;
            $remaining_sale = $sa['total_cash'];
            $pays = array(
                'emp_id' => $this->input->post('emp_id'),
                'job_id' => $this->input->post('job_id'),
                'from' => $this->input->post('from'),
                'to' => $this->input->post('to'),
                'date' => $this->input->post('date'),
                'pay_salary' => $this->input->post('pay_salary'),
                'type' => 'Cash',
            );
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['sales'] = $this->Order_model->get_totalsales();
            $data['PayEmp'] = $this->Accounting_model->getEmpById($emp_id);
            if ($remaining_sale >= $pay_salary) {
                $this->Accounting_model->create_payroll($pays);
                $this->User_model->log_audit_entry('Successfully added ' .$this->input->post('pay_salary') . ' cash payroll to ' . $emp_id, $user['emp_id'], $user['name'], $user['job_name']);
                redirect('Accounting/Accounting/show_payrollByEmp/' . $emp_id . '?success=' . urlencode('Payroll Save!'));
            } else {
                $this->User_model->log_audit_entry('Failed to add ' .$this->input->post('pay_salary') . ' cash payroll to ' . $emp_id, $user['emp_id'], $user['name'], $user['job_name']);
                $url = 'Accounting/Accounting/show_payrollByEmp/' . $emp_id . '?error=' . urlencode('Not Enough Cash');
                redirect($url);
            }
        } else {
            redirect('login');
        }
    }
    public function addpayrollCard()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $emp_id = $this->input->post('emp_id');
            $currentDate = date('Y-m-d');
            $oneMonthBefore = date('Y-m-d', strtotime('-1 month', strtotime($currentDate)));
            $from = $oneMonthBefore;
            $to = $currentDate;
            $date = $currentDate;
            $pays = array(
                'emp_id' => $this->input->post('emp_id'),
                'job_id' => $this->input->post('job_id'),
                'from' =>  $from,
                'to' =>  $to,
                'date' => $date,
                'pay_salary' => $this->input->post('pay_salary'),
                'type' => 'Card',
            );
            $data['user'] = $user;
            $data['Pending'] = $this->Accounting_model->getPending();
            $data['sales'] = $this->Order_model->get_totalsales();
            $data['PayEmp'] = $this->Accounting_model->getEmpById($emp_id);
            $this->Accounting_model->create_payroll($pays);
            $this->User_model->log_audit_entry('Successfully added' .$this->input->post('pay_salary') . 'card payroll to ' . $emp_id, $user['emp_id'], $user['name'], $user['job_name']);
            redirect('Accounting/Accounting/show_payrollByEmp/' . $emp_id . '?success=' . urlencode('Payroll Save!'));
        } else {
            redirect('login');
        }
    }
}
