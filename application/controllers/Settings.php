<?php
class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Settings_model');
        $this->load->library('session');
    }
    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $url = $this->Settings_model->get_url();
            $data['url'] = $url;
            $data['user'] = $user;
            $this->load->view('Settings', $data);
        } else {
            redirect('login');
        }
    }
    public function auditlogs($emp_id)
    {
        $user = $this->session->userdata('user');
        if ($user) {
            $this->load->library('pagination');

            //configuration for all audits
            $config_all = array();
            $config_all['base_url'] = site_url('Settings/auditlogs/' . $emp_id);
            $config_all['total_rows'] = $this->Settings_model->count_audits();
            $config_all['per_page'] = 10;
            $config_all['uri_segment'] = 4;
            $config_all['num_links'] = 3;
            $config_all['full_tag_open'] = '<ul class="pagination">';
            $config_all['full_tag_close'] = '</ul>';
            $config_all['first_link'] = '&laquo; First';
            $config_all['first_tag_open'] = '<li>';
            $config_all['first_tag_close'] = '</li>';
            $config_all['last_link'] = 'Last &raquo;';
            $config_all['last_tag_open'] = '<li>';
            $config_all['last_tag_close'] = '</li>';
            $config_all['next_link'] = 'Next &raquo;';
            $config_all['next_tag_open'] = '<li>';
            $config_all['next_tag_close'] = '</li>';
            $config_all['prev_link'] = '&laquo; Previous';
            $config_all['prev_tag_open'] = '<li>';
            $config_all['prev_tag_close'] = '</li>';
            $config_all['cur_tag_open'] = '<li class="active"><a href="#">';
            $config_all['cur_tag_close'] = '</a></li>';
            $config_all['num_tag_open'] = '<li>';
            $config_all['num_tag_close'] = '</li>';
            $this->pagination->initialize($config_all);

            // Get the current page number for all audits
            $page_all = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

            // Retrieve all audit logs with pagination
            $allaudits = $this->Settings_model->get_audits($config_all['per_page'], $page_all);

            // Generate pagination links for all audits
            $pagination_allaudits = $this->pagination->create_links();

            // Pagination configuration for my audits
            $config_my = array();
            $config_my['base_url'] = site_url('Settings/auditlogs/' . $emp_id);
            $config_my['total_rows'] = $this->Settings_model->count_auditsById($emp_id);
            $config_my['per_page'] = 10;
            $config_my['uri_segment'] = 4;
            $config_my['num_links'] = 3;
            $config_my['full_tag_open'] = '<ul class="pagination">';
            $config_my['full_tag_close'] = '</ul>';
            $config_my['first_link'] = '&laquo; First';
            $config_my['first_tag_open'] = '<li>';
            $config_my['first_tag_close'] = '</li>';
            $config_my['last_link'] = 'Last &raquo;';
            $config_my['last_tag_open'] = '<li>';
            $config_my['last_tag_close'] = '</li>';
            $config_my['next_link'] = 'Next &raquo;';
            $config_my['next_tag_open'] = '<li>';
            $config_my['next_tag_close'] = '</li>';
            $config_my['prev_link'] = '&laquo; Previous';
            $config_my['prev_tag_open'] = '<li>';
            $config_my['prev_tag_close'] = '</li>';
            $config_my['cur_tag_open'] = '<li class="active"><a href="#">';
            $config_my['cur_tag_close'] = '</a></li>';
            $config_my['num_tag_open'] = '<li>';
            $config_my['num_tag_close'] = '</li>';
            $this->pagination->initialize($config_my);

            // Get the current page number for my audits
            $page_my = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

            // Retrieve my audit logs with pagination
            $myaudits = $this->Settings_model->get_auditsById($emp_id, $config_my['per_page'], $page_my);

            // Generate pagination links for my audits
            $pagination_myaudits = $this->pagination->create_links();

            $data['allaudits'] = $allaudits;
            $data['myaudits'] = $myaudits;
            $data['pagination_allaudits'] = $pagination_allaudits;
            $data['pagination_myaudits'] = $pagination_myaudits;
            $data['user'] = $user;
            $this->load->view('AuditLogs', $data);
        } else {
            redirect('login');
        }
    }
}
