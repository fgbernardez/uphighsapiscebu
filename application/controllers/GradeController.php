<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/SchoolYearModule.php";
require_once APPPATH . "modules/GradeModule.php";

class GradeController extends MainController{


    public $response;

    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
        $this->schoolYearModule = new SchoolYearModule();
        $this->gradeModule = new GradeModule();
        
    }

    public function checkSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            $data["status_code"] = 400;
            $data["msg"] = "Unauthorized user!";
            $this->returnJson( $data );
        }   

    }

    public function updateGrade()
    {
        $invalidInputGradeResponse = array(
            "code" => "204",
            "msg" => "Invalid grade!",
            "status" => "callout-danger"
        );

        $input_sy = $this->input->post();
        if( isset($input_sy["quarter_first"]) && ($input_sy["quarter_first"] < 69 || $input_sy["quarter_first"] > 100)){
            $this->returnJson($invalidInputGradeResponse);
        } else if( isset( $input_sy["quarter_second"] )  && ($input_sy["quarter_second"] < 69 || $input_sy["quarter_second"] > 100)){
            $this->returnJson($invalidInputGradeResponse);
        } else if( isset( $input_sy["quarter_third"] )  && ($input_sy["quarter_third"] < 69 || $input_sy["quarter_third"] > 100)){
            $this->returnJson($invalidInputGradeResponse);
        } else if( isset( $input_sy["quarter_fourth"] ) && ($input_sy["quarter_fourth"] < 69 || $input_sy["quarter_fourth"] > 100)){
            $this->returnJson($invalidInputGradeResponse);
        } else {
            $this->response = $this->gradeModule->updateGrade( $input_sy  );
            $this->returnJson(  $this->response );
        }


    }

    public function updateBehavior()
    {
        $input_sy = $this->input->post();
        $this->response = $this->gradeModule->updateBehavior( $input_sy  );
        $this->returnJson(  $this->response );
    }


    
    
    public function getStudentSingleGrade()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->gradeModule->getStudentSingleGrade( $data );
        $this->returnJson( $this->response );
    }


    public function getStudentSingleBehavior()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->gradeModule->getStudentSingleBehavior( $data );
        $this->returnJson( $this->response );
    }

    public function getStudentSingleGradingBehavior()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->gradeModule->getStudentSingleGradingBehavior( $data );
        $this->returnJson( $this->response );
    }

    public function getStudentBehavior()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->gradeModule->getStudentBehavior( $data );
        $this->returnJson( $this->response );
    }



    

    
    public function addAverage()
    {
        $data = $this->input->post();
        $this->response = $this->gradeModule->addAverage( $data );
        $this->returnJson( $this->response );
    }

    public function getStudentGradeAverage()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->gradeModule->getStudentGradeAverage( $data );
        $this->returnJson( $this->response );
    }



    
    

    
}