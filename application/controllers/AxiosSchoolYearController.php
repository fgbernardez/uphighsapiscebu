<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/SchoolYearModule.php";

class AxiosSchoolYearController extends MainController{


    public $response;

    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
        $this->schoolYearModule = new SchoolYearModule();
        
    }

    
    public function checkSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            $data["status_code"] = 400;
            $data["msg"] = "Unauthorized user!";
            $this->returnJson( $data );
        }   

    }


    public function createSY()
    {

        $input_sy = $this->input->post();
        $this->response = $this->schoolYearModule->createSY( $input_sy  );
        $this->returnJson(  $this->response );
        
    }

    public function getSchoolYears()
    {
        $this->response = $this->schoolYearModule->getSchoolYears();
        $this->returnJson(  $this->response );
    }


    public function deleteSY()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->schoolYearModule->deleteSY( $data );
        $this->returnJson( $this->response );
    }

    public function getSingleSY()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->schoolYearModule->getSingleSY( $data );
        $this->returnJson( $this->response );
    }

    public function updateSY()
    {
        $update_sy = $this->input->post();
        $this->response = $this->schoolYearModule->updateSY( $update_sy  );
        $this->returnJson(  $this->response );
    }

    // 

    public function addStudent()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // var_dump($data);
        $this->response = $this->schoolYearModule->addStudent( $data  );
        $this->returnJson(  $this->response );
    }

    public function getStudentsSchoolYear()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->schoolYearModule->getStudentsSchoolYear( $data  );
        $this->returnJson(  $this->response );
    }



    public function getStudentsToAdd()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // var_dump($data);
        $this->response = $this->schoolYearModule->getStudentsToAdd( $data  );
        $this->returnJson(  $this->response );
    }
    

    // GET TEACHER TO ASSIGN THE SUBJECT
    public function getTeachersToAssign()
    {
        $this->response = $this->schoolYearModule->getTeachersToAssign();
        $this->returnJson(  $this->response );
    }

    public function getDateDeadline(){
        $this->response = $this->schoolYearModule->getDeadlineForSubmitGrade()->result_array();
        $this->returnJson(  $this->response );
    }

    
    // REMOVE STUDENT
    public function removeStudentingradelevel()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->schoolYearModule->removeStudentingradelevel( $data  );
        $this->returnJson(  $this->response );
    }
}