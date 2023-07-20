<?php

class Settings_model extends CI_Model
{
    public function get_audits($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('audit_log');
        return $query->result_array();
    }

    public function get_auditsById($emp_id, $limit, $offset)
    {
        $this->db->where('user_id', $emp_id);
        $this->db->limit($limit, $offset);
        $query = $this->db->get('audit_log');
        return $query->result_array();
    }
    public function get_url()
    {
        $query = $this->db->get('erp_url');
        return $query->result();
    }

    public function count_audits()
    {
        return $this->db->count_all('audit_log');
    }

    public function count_auditsById($emp_id)
    {
        $this->db->where('user_id', $emp_id);
        $this->db->from('audit_log');
        return $this->db->count_all_results();
    }
}
