<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/StudentModule.php";
require_once APPPATH . "modules/RequestModule.php";

class RequestController extends MainController{


    public $response;

    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
        $this->studentModule = new StudentModule();
        $this->requestModule = new RequestModule();
        
    }

    
    public function checkSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            $data["status_code"] = 400;
            $data["msg"] = "Unauthorized user!";
            $this->returnJson( $data );
        }   
    }

    public function teacherRequestList()
    {
        $this->response = $this->requestModule->teacherGetAllRequest( array( "teacher_id"=>$this->session->userdata("user_id") ) )->result_array();
        $this->returnJson(  $this->response );
    }

    public function getSingleRequest()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->requestModule->getSingleRequest( $data );
        $this->returnJson( $this->response->result_array()[0] );
    }


    public function updateRequest()
    {
        $data = $this->input->post();
        $this->response = $this->requestModule->updateRequest( $data );
        $this->returnJson( $this->response );
    }

    public function deleteRequest()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->requestModule->deleteRequest( $data );
        $this->returnJson( $this->response );
    }



    

    

    public function admingetallrequest()
    {
        $data = $this->input->post();
        $this->response = $this->requestModule->admingetallrequest()->result_array();
        $this->returnJson( $this->response );
    }




}