<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
    }
    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['users'] = $this->User_model->getAllUsers();
            $this->load->view('HR/employee_management', $data);
        } else {
            redirect('login');
        }
    }
    //Add Employee
    public function add()
    {
        $this->load->view('HR/Add_employee');
    }
    public function create_emp()
    {
        $user = $this->session->userdata('user');
        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone_no' => $this->input->post('phone_no'),
            'date_hired' => $this->input->post('date_hired'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'job_id' => $this->input->post('job_id'),
            'bank_acct' => $this->input->post('bank_acct'),
        );
        $this->User_model->log_audit_entry('Add Employee ' . $this->input->post('name'), $user['emp_id'], $user['name'], $user['job_name']);
        $this->User_model->create_employee($data);
        redirect('HR/Employee');
    }
    public function delete($emp_id)
    {
        $user = $this->session->userdata('user');
        $this->User_model->log_audit_entry('Delete Employee ' . $emp_id, $user['emp_id'], $user['name'], $user['job_name']);
        $this->User_model->delete_employee($emp_id);
        redirect('HR/Employee');
    }
    public function edit($emp_id)
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $this->User_model->log_audit_entry('Attempt to Edit Employee' . $emp_id, $user['emp_id'], $user['name'], $user['job_name']);
            $data['user'] = $this->User_model->getEmployeeById($emp_id);
            $this->load->view('HR/Edit_employee', $data);
        } else {
            redirect('login');
        }
    }
    public function update($emp_id)
    {
        $user = $this->session->userdata('user');
        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone_no' => $this->input->post('phone_no'),
            'date_hired' => $this->input->post('date_hired'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'job_id' => $this->input->post('job_id'),
            'bank_acct' => $this->input->post('bank_acct'),
        );
        $this->User_model->log_audit_entry('Editted Employee ' . $this->input->post('name'), $user['emp_id'], $user['name'], $user['job_name']);
        $this->User_model->update_employee($emp_id, $data);
        redirect('HR/Employee');
    }
}
