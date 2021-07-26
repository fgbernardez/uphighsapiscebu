<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/SubjectModule.php";

class SubjectController extends MainController{


    public $response;

    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
        $this->subjectModule = new SubjectModule();
        
    }

    
    public function checkSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            $data["status_code"] = 400;
            $data["msg"] = "Unauthorized user!";
            $this->returnJson( $data );
        }   

    }


    public function addSubject()
    {

        $input_sy = $this->input->post();
        $this->response = $this->subjectModule->addSubject( $input_sy  );
        $this->returnJson(  $this->response );
        
    }

    public function getSubjects()
    {

        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->subjectModule->getSubjects( $data  );
        $this->returnJson(  $this->response );
        
    }

    public function deleteSubject()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->subjectModule->deleteSubject( $input  );
        $this->returnJson(  $this->response );
    }

    public function getSingleSubject()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->subjectModule->getSingleSubject( $input  );
        $this->returnJson(  $this->response );
    }

    public function updateSubject()
    {

        $data = $this->input->post();
        $this->response = $this->subjectModule->updateSubject( $data  );
        $this->returnJson(  $this->response );
        
    }

    
 
}