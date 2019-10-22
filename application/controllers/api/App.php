<?php
class App{
    private $jwt_key = "jwt_key_app";
    private $signal_key = "salt";

    public function __construct(){
        //Do your magic here
//        $this->load->model('content_model');
    }

    private function jwt_encode($data){
        return JWT::encode($data, $this->jwt_key);
    }

    public function jwt_decode($jwt){
        try{
            $decode = JWT::decode($jwt, $this->jwt_key, array('HS256'));
        }
        catch (Exception $e){
            return false;
        }
        return $decode;
    }

    public function api_response_success($data, $res){
        $res->response(array('status' => 1, 'message' => "", "data" => $data));
    }

    public function api_response_error($msg, $res){
        $res->response(array('status' => 2, 'message' => $msg));
    }

    public function api_response_invalid($res){
        $res->response(array('status' => 3, 'message' => ""));
    }

    public function check_signal($signal, $data, $res){
        $data = str_replace(array('"', ' ', "\\"), array('','',''), $data);
        $signal_check = md5(md5($data).$this->signal_key);
        if($signal != $signal_check){
            return $this->api_response_invalid($res);
        }
    }

    public function check_token($token, $user_id, $res){
        $token = $this->jwt_decode($token);
        if(!$token || $token->user_id != $user_id){
            return $this->api_response_invalid($res);
        }
    }


    //login canf check token truoc
    public function login($req, $res){
        $username = $req->username;
        $password = $req->password;
        //check username, password

        //gen jwt token
        $data = array(
            'username' => $username,
            'user_id' => 1
        );
        $token = $this->jwt_encode($data);
        $data['token'] = $token;
        $this->api_response_success($data, $res);
    }


    public function register($req, $res){
        $username = $req->username;
        $password = $req->password;
        $res(array('username' => $username));
    }

    //get list danh muc khong can token
    //$res = $this
    public function get_list_product($data, $res){
        $res->load->model('Catalog_model');
        $res->load->model('Product_model');

        $page = isset($data->page) ? $data->page : 1;
        $limit = 10;
        $catalog_input = array();
        $catalog_input['where']['is_show'] = 1;
        if(isset($data->idCatalog)){
            $catalog_input['where']['id'] = $data->idCatalog;
        }
        $data_catalog = $res->Catalog_model->get_list($catalog_input);

        foreach ($data_catalog as $catalog) {
            $feild = 'product.id, product.name, product.price, product.title, product.discount, product.content, product.image, product.imageList, product.view, product.rate,  product.create_time, b.name catalog, c.name producer';
            $input['limit'] = array($limit , ($page - 1) * $limit);
            $input['where'] = array(
                "product.catalog_id" => $catalog->id,
                "b.is_show" => 1
            );
            if(isset($data->nameSearch)){
                $input['like'] = array("product.name", trim($data->nameSearch));
            }
            $input['join'] = array(
                array('catalog b', 'b.id = product.catalog_id'),
                array('producer c', 'c.id = product.producer_id'),
            );
            $products = $res->Product_model->get_list($input, $feild);
            $catalog->products = $products;
        }
        
        $this->api_response_success($data_catalog, $res);
    }
    public function get_product($data, $res){
        $res->load->model('Product_model');
        $feild = 'product.id, product.name, product.price, product.title, product.discount, product.content, product.image, product.imageList, product.view, product.create_time, product.rate, b.name catalog, c.name producer';
        if(isset($data->idProduct) && is_numeric($data->idProduct)){
            $input['where'] = array("product.id" => $data->idProduct);
        }else if(isset($data->idProduct) && is_array($data->idProduct)){
            $input['where_in'] = array("product.id", $data->idProduct);
        }else if(isset($data->nameSearch)){
            $input['like'] = array("product.name", trim($data->nameSearch));
            $page = isset($data->page) ? $data->page : 1;
            $limit = 10;
            $input['limit'] = array($limit , ($page - 1) * $limit);
        }else{
            $input['order'] = array('product.create_time','DESC');
        }
        
        $input['join'] = array(
            array('catalog b', 'b.id = product.catalog_id'),
            array('producer c', 'c.id = product.producer_id'),
        );
        $products = $res->Product_model->get_list($input, $feild);
        $this->api_response_success($products, $res);
    }
}