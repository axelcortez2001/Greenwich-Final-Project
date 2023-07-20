<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Job_model');
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['jobs'] = $this->Job_model->getJobs();
            $this->load->view('HR/Job_management', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('login');
        }
    }

    //Go to edit Job Salary
    public function edit($job_id)
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $data['jobs'] = $this->Job_model->getJobId($job_id);
            $this->User_model->log_audit_entry('Attempt to Edit Job ' . $job_id, $user['emp_id'], $user['name'], $user['job_name']);
            $this->load->view('HR/Edit_job', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('login');
        }
    }
    //Update Job
    public function update($job_id)
    {
        $user = $this->session->userdata('user');
        $data = array(
            'des' => $this->input->post('des'),
            'salary' => $this->input->post('salary'),
        );
        $this->User_model->log_audit_entry('Editted Job ' . $job_id, $user['emp_id'], $user['name'], $user['job_name']);
        $this->Job_model->update_job($job_id, $data);
        redirect('HR/Jobs');
    }
}
