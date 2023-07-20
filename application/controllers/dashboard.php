<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function index()
    {
        // Retrieve the user data from the session
        $user = $this->session->userdata('user');
        if ($user) {
            // Pass the user data to the view
            $data['user'] = $user;
            $this->load->view('dashboard', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('login');
        }
    }
    public function logout()
    {
        $user = $this->session->userdata('user');
        $this->User_model->log_audit_entry('Logout', $user['emp_id'], $user['name'], $user['job_name']);
        $this->session->unset_userdata('user');
        redirect('login');
    }

    public function main_dashboard()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            // Pass the user data to the view
            $data['user'] = $user;
            $this->load->view('main_dashboard', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('login');
        }
    }
}
