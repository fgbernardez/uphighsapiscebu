<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';

class GradeModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("GradeModel");
        
    }

    

    //GET SINGLE STUDENT GRADE
    public function getStudentSingleGrade( $data ){
        $this->result = $this->CI->GradeModel->getStudentSingleGrade( $data );
        return $this->result;
    }

    //GET SINGLE STUDENT BEHAVIOR
    public function getStudentSingleBehavior( $data ){
        $this->result = $this->CI->GradeModel->getStudentSingleBehavior( $data );
        return $this->result;
    }

    public function getStudentSingleGradingBehavior( $data ){
        $this->result = $this->CI->GradeModel->getStudentSingleGradingBehavior( $data );
        return $this->result;
    }
    
    public function getStudentBehavior( $data ){
        $this->result = $this->CI->GradeModel->getStudentBehavior( $data );
        return $this->result;
    }
    
    
    public function updateGrade( $data ){
        $this->result = $this->CI->GradeModel->updateGrade( $data );
        return $this->result;
    }
    public function updateBehavior( $data ){
        $this->result = $this->CI->GradeModel->updateBehavior( $data );
        return $this->result;
    }
    public function getTeacherSubjectStudents( $data, $subject_id )
    {
        $this->result = $this->CI->GradeModel->getTeacherSubjectStudents( $data, $subject_id );
        return $this->result;
    }

    //FROM ADMIN CONTROLLER
    public function getStudentAllSubjectGrades( $data )
    {
        $this->result = $this->CI->GradeModel->getStudentAllSubjectGrades( $data);
        return $this->result;
    }

    public function viewStudentGrades( $sy_id, $grade_level ){
        $this->result = $this->CI->GradeModel->viewStudentGrades( $sy_id, $grade_level );
        return $this->result;
    }
    
    public function addAverage( $data )
    {
        $this->result = $this->CI->GradeModel->addAverage( $data);
        return $this->result;
    }

    public function getStudentGradeAverage( $data )
    {
        $this->result = $this->CI->GradeModel->getStudentGradeAverage( $data);
        return $this->result;
    }

    public function getSummaryOfGradesByPeriod($data, $period) {
        $this->result = $this->CI->GradeModel->getSummaryOfGradesByPeriod( $data, $period);
        return $this->result;
    }

    

    
}

