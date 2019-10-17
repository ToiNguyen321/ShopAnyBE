<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
// require APPPATH . '/libraries/CreatorJwt.php';
class User extends REST_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index_post()
	{
		$params = $_REQUEST;
		// $username = $this->post('username');
		// $password = $this->post('password');
		// $password2 = $this->post('password2');
		$username = $this->post['username'];
		$password = $this->post['password'];
		$password2 = $this->post['password2'];
		if($password == $password2){
			$data = [
				'username' => $username,
				'password' => $password,
				'create_time' => $this->get_date()
			];
			if($this->User_model->create($data)){
				$res = new stdClass();
				$res->message = 'Thêm thành công';
				$res->success = false;
				$res->data = $data;
				// $respone = CreatorJwt::GenerateToken($res);
				$this->response($res, $this::HTTP_OK);
			}
			 
		}
	}
	public function index_get()
	{
		$res ="abchashdkasd";
		$this->response($res);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */