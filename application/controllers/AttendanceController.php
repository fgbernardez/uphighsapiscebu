<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/SchoolYearModule.php";
require_once APPPATH . "modules/GradeModule.php";
require_once APPPATH . "modules/AttendanceModule.php";
require_once APPPATH . "modules/AttendanceCalendarModule.php";

class AttendanceController extends MainController{


    public $response;

    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
        $this->attendanceModule = new AttendanceModule();
        $this->attendanceCalendarModule = new AttendanceCalendarModule();
        
    }

    public function checkSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            $data["status_code"] = 400;
            $data["msg"] = "Unauthorized user!";
            $this->returnJson( $data );
        }   

	}
	
	public function getMonthsClass () {
		$data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->attendanceCalendarModule->get($data);
        $this->returnJson( $this->response );
	}
    
    public function schoolDays()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->attendanceModule->schoolDays( $data );
        $this->returnJson( $this->response );
    }

    public function getStudentPresentDays()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->attendanceModule->getStudentPresentDays( $data );
        $this->returnJson( $this->response );
    }


    public function getStudentTimesTardy()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->attendanceModule->getStudentTimesTardy( $data );
        $this->returnJson( $this->response );
    }

    public function addSchoolDays()
    {
        $data = $this->input->post();
        $this->response = $this->attendanceModule->addSchoolDays( $data );
        $this->returnJson( $this->response );
    }


    public function addPresentDays()
    {
        $data = $this->input->post();
        $this->response = $this->attendanceModule->addPresentDays( $data );
        $this->returnJson( $this->response );
    }

    public function addTimesTardy()
    {
        $data = $this->input->post();
        $this->response = $this->attendanceModule->addTimesTardy( $data );
        $this->returnJson( $this->response );
    }

    
}
