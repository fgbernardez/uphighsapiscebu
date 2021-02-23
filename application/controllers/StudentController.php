<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/StudentModule.php";

class StudentController extends MainController{


    public $response;

    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
        $this->studentModule = new StudentModule();
        
    }

    
    public function checkSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            $data["status_code"] = 400;
            $data["msg"] = "Unauthorized user!";
            $this->returnJson( $data );
        }   

    }


    public function getStudents()
    {
        $this->response = $this->studentModule->getStudents();
        $this->returnJson(  $this->response );
    }

    public function getSingleStudent()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->studentModule->getSingleStudent( $data );
        $this->returnJson( $this->response[0] );
    }

    public function addStudent()
    {
        $input = $this->input->post();
        $this->response = $this->studentModule->addStudent( $input  );
        $this->returnJson(  $this->response );
    }
    public function updateStudent()
    {
        $input = $this->input->post();
        $this->response = $this->studentModule->updateStudent( $input  );
        $this->returnJson(  $this->response );
    }

    

    public function deleteStudent()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->studentModule->deleteStudent( $data );
        $this->returnJson( $this->response );
    }
    


}