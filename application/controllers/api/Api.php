<?php

require APPPATH . 'libraries/REST_Controller.php';
require_once APPPATH . 'libraries/JWT.php';
include('App.php');

class cmd {
    const LOGIN = 1;
    const REGISTER = 2;
    const GET_LIST_PRODUCT = 3;

    const GET_INFO_ACCOUNT = 100;
}

class Api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_get(){

    }

    public function index_post(){
        $data = $this->post("data");
        $data_json = json_decode($data);
        $cmd = $data_json->cmd;
        $app_controller = new App();
        $res = $this;

        switch ($cmd){
            case cmd::LOGIN : return $app_controller->login($data_json, $res);
            case cmd::REGISTER : return $app_controller->register($data_json, $res);
            case cmd::GET_LIST_PRODUCT : return $app_controller->get_list_product($data_json, $res);

            default: break;
        }

        $signal = $this->post("signal");
        $app_controller->check_signal($signal, $data, $res);

        $app_controller->check_token($data_json->token, $data_json->user_id, $res);

        switch ($cmd){
            case cmd::GET_INFO_ACCOUNT : return $app_controller->get_info_account($data_json, $res);
            default: break;
        }
    }

}
