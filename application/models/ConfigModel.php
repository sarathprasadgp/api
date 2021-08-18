<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigModel extends CI_Model {

    public function __contruct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function getRequestsCount($where)
	{
        $this->db->select('*');
        $this->db->from('requests_history');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
	}

    public function postRequests($data)
	{
        $this->db->insert('requests_history',$data);
        return $this->db->insert_id();
	}

    public function get($where)
	{
        $this->db->select('*');
        $this->db->from('config');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
	}

    public function put($data,$where)
    {
        $this->db->where($where);
        $this->db->update('config',$data);
        return $this->db->affected_rows();
    }

}