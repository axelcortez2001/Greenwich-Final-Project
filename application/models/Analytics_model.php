<?php
class Analytics_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //FOR SALES ANALYTICS
    public function get_daily_sales()
    {
        $this->db->select('date, SUM(total_amount) as dailysales');
        $this->db->group_by('date');
        $query = $this->db->get('order_transaction');
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null; // or return an empty array []
        }
    }

    public function get_monthly_sales()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(date, '%M') as month, SUM(total_amount) as sales FROM order_transaction GROUP BY DATE_FORMAT(date, '%M') ORDER BY MIN(date)");
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null; // or return an empty array []
        }
    }

    //FOR EXPENSE ANALYTICS
    public function get_daily_expenses(){
        {
            $this->db->select('date, SUM(total_amount) as dailysales');
            $this->db->group_by('date');
            $query = $this->db->get('product_purchase');
            
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return null; // or return an empty array []
            }
        }
    }
    public function get_monthly_expenses()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(date, '%M') as month, SUM(total_amount) as sales FROM product_purchase GROUP BY DATE_FORMAT(date, '%M') ORDER BY MIN(date)");
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null; // or return an empty array []
        }
    }
}
