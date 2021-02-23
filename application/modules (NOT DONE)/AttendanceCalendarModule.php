<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';

class AttendanceCalendarModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("AttendanceCalendarModel");
    }
    
    /*public function firsttolast($data) {
        $this->result = $this->CI->AttendanceCalendarModel->firsttolast($data);
        return $this->result;
	}*/
	
	public function add($data) {
        $this->result = $this->CI->AttendanceCalendarModel->add($data);
        return $this->result;
	}
	public function update($data) {
        $this->result = $this->CI->AttendanceCalendarModel->update($data);
        return $this->result;
	}
    public function get($data){
        $this->result = $this->CI->AttendanceCalendarModel->get($data);
        return $this->result;
    }
    public function getStudentTimesTardy( $data ){
        $this->result = $this->CI->AttendanceModel->getStudentTimesTardy( $data );
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

