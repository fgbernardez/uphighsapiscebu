<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';

class AttendanceModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("AttendanceModel");
        
    }

    public function schoolDays( $data ){
        $this->result = $this->CI->AttendanceModel->schoolDays( $data );
        return $this->result;
    }


    public function getStudentPresentDays( $data ){
        $this->result = $this->CI->AttendanceModel->getStudentPresentDays( $data );
        return $this->result;
    }

    public function getStudentTimesTardy( $data ){
        $this->result = $this->CI->AttendanceModel->getStudentTimesTardy( $data );
        return $this->result;
    }

    public function addSchoolDays( $data ){
        $this->result = $this->CI->AttendanceModel->addSchoolDays( $data );
        return $this->result;
    }


    public function addPresentDays( $data ){
        $this->result = $this->CI->AttendanceModel->addPresentDays( $data );
        return $this->result;
    }


    public function addTimesTardy( $data ){
        $this->result = $this->CI->AttendanceModel->addTimesTardy( $data );
        return $this->result;
    }


    
    

    
}

