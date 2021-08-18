<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductsModel extends CI_Model {

    public function __contruct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function get($id)
	{
        $this->db->select('*');
        $this->db->from('products');
        if($id){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query->result_array();
	}

    public function post($data)
	{
        $this->db->insert('products',$data);
        return $this->db->insert_id();
	}

    public function put($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('products',$data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('products');
        return $this->db->affected_rows();
    }

}