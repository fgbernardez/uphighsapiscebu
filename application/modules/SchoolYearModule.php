<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolYearModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;

    
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("SchoolYearModel");
        
    }


    public function createSY( $input ){

        if( is_numeric($input["start_year"]) && is_numeric($input["end_year"]) ){
            if( $input["start_year"] > $input["end_year"] ){
                $this->result["code"] = 203;
                $this->result["msg"] = "Please input a valid year!";
                $this->result["status"] = "callout-warning"; 
            } else if( ($input["end_year"] - $input["start_year"]) != 1){
                $this->result["code"] = 203;
                $this->result["msg"] = "Please input a valid year!";
                $this->result["status"] = "callout-warning"; 
            } else {
                $this->result = $this->CI->SchoolYearModel->createSY( $input );
            }
        } else {
            $this->result["code"] = 203;
            $this->result["msg"] = "Please input a valid year!";
            $this->result["status"] = "callout-warning"; 
        }
        return $this->result;
    }
    
    public function updateDeadlineSubmitGrade( $data ){

        $this->result = $this->CI->SchoolYearModel->updateDeadlineSubmitGrade( $data );
        return $this->result;
    }

    public function getDeadlineForSubmitGrade()
    {
        $this->result = $this->CI->SchoolYearModel->existDeadline();
        return $this->result;
    }

    public function getSchoolYears(){
        $this->result = $this->CI->SchoolYearModel->getSchoolYears();
        return $this->result;
    }


    public function deleteSY( $data ){
        $this->result = $this->CI->SchoolYearModel->deleteSY( $data );
        return $this->result;
    }


    public function getSingleSY( $data ){
        $this->result = $this->CI->SchoolYearModel->getSingleSY( $data );
        return $this->result;
    }

    public function updateSY( $update_sy ){

        if( is_numeric($update_sy["start_year"]) && is_numeric($update_sy["end_year"]) ){
            if( $update_sy["start_year"] > $update_sy["end_year"] ){
                $this->result["code"] = 203;
                $this->result["msg"] = "Please input a valid year!";
                $this->result["status"] = "callout-warning"; 
            } else if( ($update_sy["end_year"] - $update_sy["start_year"]) != 1){
                $this->result["code"] = 203;
                $this->result["msg"] = "Please input a valid year!";
                $this->result["status"] = "callout-warning"; 
            } else {
                $this->result = $this->CI->SchoolYearModel->updateSY( $update_sy );
            }
        } else {
            $this->result["code"] = 203;
            $this->result["msg"] = "Please input a valid year!";
            $this->result["status"] = "callout-warning"; 
        }
        return $this->result;
    }

    public function checkSYexist( $sy_id )
    {
        $this->result = $this->CI->SchoolYearModel->getSchoolYear( array( "sy_id" => $sy_id ) );
        // var_dump( $this->result );
        return $this->result;
    }

    public function addStudent( $data )
    {
        $this->result = $this->CI->SchoolYearModel->addStudent( $data );
        return $this->result;
    }

    public function getStudentsSchoolYear( $data )
    {
        $this->result = $this->CI->SchoolYearModel->getStudentsSchoolYear( $data );
        return $this->result;
    }

    public function getStudentsSchoolYearFromAdminController( $sy_id, $grade_level )
    {
        $this->result = $this->CI->SchoolYearModel->getStudentsSchoolYearFromAdminController( $sy_id, $grade_level );
        return $this->result;
    }


    public function getStudentsToAdd( $data )
    {
        $this->result = $this->CI->SchoolYearModel->getStudentsToAdd( $data );
        return $this->result;
    }

    public function getTeachersToAssign()
    {
        $this->result = $this->CI->SchoolYearModel->getTeachersToAssign();
        return $this->result;
    }


    //FROM ADMIN CONTROLLER REQUEST
    public function getSchoolYearSubjects( $data )
    {
        $this->result = $this->CI->SchoolYearModel->getSchoolYearSubjects( $data );
        return $this->result;
	}
	
	public function viewTeachers ($data) {
		$this->result = $this->CI->SchoolYearModel->viewTeachers($data);
        return $this->result;
	}
    
    //FROM ADMIN CONTROLLER CHECK IF STUDENT EXIST ON SCHOOL YEAR
    public function checkIfStudentExistInSchoolYear($data){
        $this->result = $this->CI->SchoolYearModel->checkIfStudentExistInSchoolYear( $data );
        return $this->result;
    }

    //FROM TEACHER CONTROLLER
    public function getTeacherSubjectStudents( $data )
    {
        $this->result = $this->CI->SchoolYearModel->getTeacherSubjectStudents( $data );
        return $this->result;
    }

    public function removeStudentingradelevel( $data )
    {
        $this->result = $this->CI->SchoolYearModel->removeStudentingradelevel( $data );
        return $this->result;
    }

    
    
    
}



