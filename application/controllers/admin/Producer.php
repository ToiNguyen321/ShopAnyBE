<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Producer_model');

	}

	public function index()
	{
		
		$producer = $this->Producer_model->get_list();
		// pre($producer);
		$this->data['title'] = 'Danh sách hãng sản phẩm';
		$this->data['add'] = 'producer/add';
		$this->data['producer'] = $producer;
		$this->data['temp'] = 'admin/producer/index';
		$this->load->view('admin/main', $this->data, FALSE);
	}
	function add()
	{
		if($this->input->post()){
			$name = $this->input->post('name');
			$content = $this->input->post('content');
			$data_add = array(
				'name' => $name,
				'content' => $content,
				'slug' => $this->slug($name),
				'create_time' => $this->get_date()
			);

			if($this->Producer_model->create($data_add)){
				$this->session->set_flashdata('message', 'Thêm mới thành công!');
                redirect(admin_url('producer'));
			}else{
				$this->session->set_flashdata('message', 'Thêm mới thất bại!');
                redirect(admin_url('producer'));
			}
		}
		$this->data['title'] = 'Thêm mới hãng sản phẩm';
		$this->data['temp'] = 'admin/producer/add';
		$this->load->view('admin/main', $this->data, FALSE);
	}
	function edit($id)
	{
		if(!$id){
			redirect(admin_url('producer'));
			exit();
		}
		if($this->input->post()){
			$name = $this->input->post('name');
			$content = $this->input->post('content');
			$data = array(
				'name' => $name,
				'content' => $content,
				'slug' => $this->slug($name),
			);

			if($this->Producer_model->update($id,$data)){
				$this->session->set_flashdata('message', 'Update thành công!');
                redirect(admin_url('producer'));
			}else{
				$this->session->set_flashdata('message', 'Update thất bại!');
                redirect(admin_url('producer'));
			}
		}
		$this->data['title'] = 'Update hãng sản phẩm';
		$this->data['producer'] = $this->Producer_model->get_info($id);
		$this->data['temp'] = 'admin/producer/edit';
		$this->load->view('admin/main', $this->data, FALSE);

	}

	function del($id)
	{
		if(!$id){
			redirect(admin_url('producer'));
			exit();
		}else{
			if($this->Producer_model->delete($id)){
				$this->session->set_flashdata('message', 'Xóa thành công! ID: ' . $id);
                redirect(admin_url('producer'));
			}else{
				$this->session->set_flashdata('message', 'Xóa thất bại! ID: ' . $id);
                redirect(admin_url('producer'));
			}
		}
	}

}

/* End of file producer.php */
/* Location: ./application/controllers/producer.php */