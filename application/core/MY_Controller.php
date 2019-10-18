<?php
Class MY_Controller extends CI_Controller
{
    private $user_credential;
    public $data = array();

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $new_url = $this->uri->segment(1);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //pre ($new_url);
//         switch ($new_url) {
//             case 'admin' :
//                 {
//                     $this->load->model('menu_access_model');
//                     $this->_islogin();
//                     $a = $this->data['admin'] = $this->session->userdata('admin');
// //                pre($a->UserID);
// //                pre($admin);
//                     if ($this->session->userdata('admin')) {
//                         /*lưu session menu_access*/
//                         $input = array();
//                         $input['where'] = array(
//                             'employee_id' => $this->session->userdata('admin')->id
//                         );
//                         $menu_access = $this->menu_access_model->get_list($input, '', '');
//                         $access = array();
//                         foreach ($menu_access as $value) {
//                             $access[$value->menu_id] = $value->access;
//                         }

// //                $this->data['menu_access'] = $this->session->userdata('admin');

//                         $this->session->set_userdata('menu_access', $access);
// //                $access = $this->session->userdata('menu_access');
// //                pre($access[1]);

//                         /*lưu session menu_access*/
//                     }
//                     break;
//                 }

//             default:
//                 {

//                 }
        // }
    }

    protected function _islogin()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login') {
            redirect(base_url('admin/login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login') {
            redirect(base_url('admin/tktongquan'));
        }
    }
    protected function get_date()
    {
        return date('Y/m/d H:i:s');
        // return now(); 
    }
    protected function slug($str = '')
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}