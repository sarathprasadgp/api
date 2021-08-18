 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Products extends REST_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel', '', true);	
	}

	public function index_get($id = 0)
	{
		if($this->limit('get')){
			$result=$this->ProductsModel->get($id);
			if($result){
				$this->response($result, REST_Controller::HTTP_OK);
			}else{
				$this->response(['Product Not Found'], REST_Controller::HTTP_NO_CONTENT);
			}
			
		}
	}

	public function index_post()
	{
		if($this->limit('post')){
			$data = $this->input->post();
			if($data){
				$result = $this->ProductsModel->post($data);
				$this->response(['Product addded successfully.'], REST_Controller::HTTP_OK);
			}else{
				$this->response(['Please fill in the form'], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function index_put($id='')
	{
		if($this->limit('put')){
			$data = $this->input->get();
			if($id!=''){
				$result = $this->ProductsModel->put($data,$id);
				$this->response(['Product updated successfully.'], REST_Controller::HTTP_OK);
			}else{
				$this->response(['Product Id Missing'], REST_Controller::HTTP_BAD_REQUEST);
			}
			
		}

	}

	public function index_delete($id)
	{
		if($this->limit('delete')){
			$result = $this->ProductsModel->delete($id);
			$this->response(['Product deleted successfully.'], REST_Controller::HTTP_OK);
		}
	}

	public function limit($method='')
	{
		$this->load->model('ConfigModel', '', true);
		$time_limit = 1; //for one minute

		$config_where = array("name" => 'allowed_requests',"status" => 1);
		$result_array = $this->ConfigModel->get($config_where);
		if($result_array){
			$allowed_requests = $result_array[0]['value'];
		}else{
			$allowed_requests = 'unlimited';
		}
		
		$request_history['method'] 			= $method;
		$request_history['ip_address'] 		= $this->input->ip_address();
		$request_history['time'] 			= time();

        if($allowed_requests!='unlimited'){
			$where_time = time() - ($time_limit*60);
			$where = array("time >=" => $where_time);
			$limit_count = $this->ConfigModel->getRequestsCount($where);
			if($limit_count < $allowed_requests)
			{
				$this->ConfigModel->postRequests($request_history);
				return true;
			}else{
				return $this->response(['You have reached maximum number of request, please try after some time'], REST_Controller::HTTP_OK);
			}
		}else{
			return true;
		}
	}

}
