<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitchen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index(){
        $this->load->view('Kitchen/Kitchen_management');
    }
}
?>
