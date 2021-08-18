<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Config extends REST_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->model('ConfigModel', '', true);
	}

	public function index_get()
	{
        $result=$this->ConfigModel->get(array());
        $this->response($result, REST_Controller::HTTP_OK);
	}


	public function limit_put($limit=6,$status=1)
	{
        $data['value'] = $limit;
        $data['status'] = $status;
        $where = array("name" => "allowed_requests");
        $result = $this->ConfigModel->put($data,$where);
        $this->response(['limit updated successfully.'], REST_Controller::HTTP_OK);
	}

    public function index_put()
	{
        $this->response(['Not Found'], REST_Controller::HTTP_NOT_FOUND);
	}

    public function index_post()
	{
        $this->response(['Not Found'], REST_Controller::HTTP_NOT_FOUND);
	}

    public function index_delete()
	{
        $this->response(['Not Found'], REST_Controller::HTTP_NOT_FOUND);
	}

}
