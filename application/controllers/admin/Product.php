<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Catalog_model');
		$this->load->model('Producer_model');
		$this->load->library('Upload_library');
	}

	public function index()
	{
		$feild = 'a.id, a.name, a.price, a.title, a.discount, a.content, a.image, a.imageList, a.view, a.create_time, b.name catalog, c.name producer';
		$input['join'] = array(
		 	array('catalog b', 'b.id = a.catalog_id'),
			array('producer c', 'c.id = a.producer_id'),
		);
		$products = $this->Product_model->get_list($input, $feild);

		// pre(json_decode($product[0]->imageList));
		$this->data['title'] = 'Danh sách sản phẩm';
		$this->data['add'] = 'product/add';
		$this->data['products'] = $products;
		$this->data['temp'] = 'admin/product/index';
		$this->load->view('admin/main', $this->data, FALSE);
	}
	function add()
	{
		
		if($this->input->post()){
			$path = './public/image/product';
			$path_thum = './public/image/product/thump'
			$image = $this->upload_library->upload($path, 'image');
			if($image == false){
				$input['image'] = 'noImage.jpg';
			}else{
				$input['image'] = $this->upload_library->upload($path_thum, $path . $image->file_name);
			}
			
			$imageList = $this->upload_library->upload_file($path, 'imageList');
			$input['imageList'] = json_encode($imageList);
			$input['name'] = $this->input->post('name');
			$input['title'] = $this->input->post('title');
			$input['price'] = $this->input->post('price');
			$input['discount'] = $this->input->post('discount');
			$input['content'] = $this->input->post('content');
			$input['producer_id'] = $this->input->post('producer_id');
			$input['catalog_id'] = $this->input->post('catalog_id');
			$input['view'] = 0;
			$input['create_time'] = $this->get_date();

			if($this->Product_model->create($input)){
				$this->session->set_flashdata('message', 'Thêm mới thành công!');
                redirect(admin_url('product'));
			}else{
				$this->session->set_flashdata('message', 'Thêm mới thất bại!');
                redirect(admin_url('product'));
			}
		}
		$array['where'] = array('parent_id' => 0);
		$catalogs = $this->Catalog_model->get_list($array);
		foreach ($catalogs as $key => $catalog) {
			$array_tmp['where'] = array('parent_id' => $catalog->id);
			$catalog_list = $this->Catalog_model->get_list($array_tmp);
			$catalog->catalog_list = $catalog_list;
		}
		// pre($catalogs);
		$this->data['catalogs'] = $catalogs;
		$this->data['producers'] = $this->Producer_model->get_list();
		$this->data['title'] = 'Thêm mới sản phẩm';
		$this->data['temp'] = 'admin/product/add';
		$this->load->view('admin/main', $this->data, FALSE);
	}
	function edit($id)
	{
		// pre(is_numeric($id));
		if(!$id || !is_numeric($id) ){
			redirect(admin_url('product'));
			exit();
		}
		if($this->input->post()){
			$path = './public/image/product';

			$image = $this->upload_library->upload($path, 'image');
			if($image != false){
				$input['image'] = $image->file_name;
			}
			
			$imageList = $this->upload_library->upload_file($path, 'imageList');
			if(count($imageList) > 0){
				$input['imageList'] = json_encode($imageList);
			}
			
			$input['name'] = $this->input->post('name');
			$input['title'] = $this->input->post('title');
			$input['price'] = $this->input->post('price');
			$input['discount'] = $this->input->post('discount');
			$input['content'] = $this->input->post('content');
			$input['producer_id'] = $this->input->post('producer_id');
			$input['catalog_id'] = $this->input->post('catalog_id');

			if($this->Product_model->update($id,$input)){
				$this->session->set_flashdata('message', 'Update thành công!');
                redirect(admin_url('product'));
			}else{
				$this->session->set_flashdata('message', 'Update thất bại!');
                redirect(admin_url('product'));
			}
		}

		$array['where'] = array('parent_id' => 0);
		$catalogs = $this->Catalog_model->get_list($array);
		foreach ($catalogs as $key => $catalog) {
			$array_tmp['where'] = array('parent_id' => $catalog->id);
			$catalog_list = $this->Catalog_model->get_list($array_tmp);
			$catalog->catalog_list = $catalog_list;
		}
		$this->data['catalogs'] = $catalogs;
		$this->data['producers'] = $this->Producer_model->get_list();

		$this->data['product'] = $this->Product_model->get_info($id);
		$this->data['temp'] = 'admin/product/edit';
		$this->load->view('admin/main', $this->data, FALSE);

	}

	function del($id)
	{
		if(!$id){
			redirect(admin_url('product'));
			exit();
		}else{
			if($this->Product_model->delete($id)){
				$this->session->set_flashdata('message', 'Xóa thành công! ID: ' . $id);
                redirect(admin_url('product'));
			}else{
				$this->session->set_flashdata('message', 'Xóa thất bại! ID: ' . $id);
                redirect(admin_url('product'));
			}
		}
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */