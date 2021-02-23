<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';

class StudentModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("StudentModel");
        
    }

   
    public function getStudents()
    {
        $this->result = $this->CI->StudentModel->getStudents();
        return $this->result;
    }

    //GET SINGLE STUDENT
    public function getSingleStudent( $data ){
        $this->result = $this->CI->StudentModel->checkStudentExist( $data );
        return $this->result->result_array();
    }   

    //ADD STUDENT
    public function addStudent( $student_data ){
        $this->result = $this->CI->StudentModel->addStudent( $student_data );
        return $this->result;
    }

    //UPDATE STUDENT
    public function updateStudent( $student_data ){
        $this->result = $this->CI->StudentModel->updateStudent( $student_data );
        return $this->result;
    }
    


    
    // DELETE STUDENT
    public function deleteStudent( $data ){
        $this->result = $this->CI->StudentModel->deleteStudent( $data );
        return $this->result;
    }

   
}