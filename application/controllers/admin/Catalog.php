<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Catalog_model');
		$this->load->model('Product_model');
	}

	public function index()
	{
		
		$catalog = $this->Catalog_model->get_list();
		foreach ($catalog as $key => $value) {
			if($value->parent_id == 0){
				$catalog[$key]->loai = 'Là danh mục cha';
			}else{
				$catalog_cha = $this->Catalog_model->get_info($value->parent_id, 'name');
				$catalog[$key]->loai = $catalog_cha->name;
			}
		}
		
		// pre($catalog);
		$this->data['title'] = 'Danh sách danh mục';
		$this->data['add'] = 'catalog/add';
		$this->data['catalog'] = $catalog;
		$this->data['temp'] = 'admin/catalog/index';
		$this->load->view('admin/main', $this->data, FALSE);
	}
	function add()
	{
		$array['where'] = array('parent_id' => 0);
		$this->data['catalog_0'] = $this->Catalog_model->get_list($array);
		if($this->input->post()){
			$name = $this->input->post('name');
			$sort_order = $this->input->post('sort_order');
			$parent_id = $this->input->post('parent_id');
			$is_show = $this->input->post('is_show');
			$data_add = array(
				'name' => $name,
				'parent_id' => $parent_id,
				'sort_order' => $sort_order,
				'slug' => $this->slug($name),
				'is_show' => $is_show,
				'create_time' => $this->get_date()
			);

			if($this->Catalog_model->create($data_add)){
				$this->session->set_flashdata('message', 'Thêm mới thành công!');
                redirect(admin_url('catalog'));
			}else{
				$this->session->set_flashdata('message', 'Thêm mới thất bại!');
                redirect(admin_url('catalog'));
			}
		}
		$this->data['title'] = 'Thêm mới danh mục';
		$this->data['temp'] = 'admin/catalog/add';
		$this->load->view('admin/main', $this->data, FALSE);
	}
	function edit($id)
	{
		if(!$id){
			redirect(admin_url('catalog'));
			exit();
		}else if($id == 0){
			$this->session->set_flashdata('message', 'Không được sửa mục này!');
            redirect(admin_url('catalog'));
		}
		if($this->input->post()){
			$name = $this->input->post('name');
			$sort_order = $this->input->post('sort_order');
			$parent_id = $this->input->post('parent_id');
			$is_show = $this->input->post('is_show');
			$data = array(
				'name' => $name,
				'parent_id' => $parent_id,
				'sort_order' => $sort_order,
				'slug' => $this->slug($name),
				'is_show' => $is_show,
			);

			if($this->Catalog_model->update($id,$data)){
				$this->session->set_flashdata('message', 'Update thành công!');
                redirect(admin_url('catalog'));
			}else{
				$this->session->set_flashdata('message', 'Update thất bại!');
                redirect(admin_url('catalog'));
			}
		}
		$this->data['title'] = 'Update danh mục';
		$array['where'] = array('parent_id' => 0);
		$this->data['catalog_0'] = $this->Catalog_model->get_list($array);
		$this->data['catalog'] = $this->Catalog_model->get_info($id);
		$this->data['temp'] = 'admin/catalog/edit';
		$this->load->view('admin/main', $this->data, FALSE);

	}

	function del($id)
	{
		if(!$id){
			redirect(admin_url('catalog'));
			exit();
		}else if($id == 0){
			$this->session->set_flashdata('message', 'Không được xóa mục này!');
            redirect(admin_url('catalog'));
		}else{
			$where_product = array('where' => array('catalog_id' => $id));
			if($this->Product_model->get_total($where_product) > 0){
				$this->session->set_flashdata('message', 'Xóa thất bại, Vui lòng xóa hết sản phẩm thuộc danh mục trước! ID: ' . $id);
	            redirect(admin_url('catalog'));
			}else{
				if($this->Catalog_model->delete($id)){
					$this->session->set_flashdata('message', 'Xóa thành công! ID: ' . $id);
	                redirect(admin_url('catalog'));
				}else{
					$this->session->set_flashdata('message', 'Xóa thất bại! ID: ' . $id);
	                redirect(admin_url('catalog'));
				}
			}
		}
	}

}

/* End of file Catalog.php */
/* Location: ./application/controllers/Catalog.php */