<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';
require_once APPPATH . 'modules/UserModule.php';

class SubjectModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("SubjectModel");
        
    }

   

    //ADD SUBJECT
    public function addSubject( $data )
    {
        $this->result = $this->CI->SubjectModel->addSubject($data);
        return $this->result;
    }

    //GET SUBJECTS
    public function getSubjects( $data )
    {
        $this->result = $this->CI->SubjectModel->getSubjects($data);
        return $this->result;
    }

    public function getAllSubjectsGroupBySubjectName() {
        $this->result = $this->CI->SubjectModel->getAllSubjectsGroupBySubjectName();
        return $this->result;
    }

    public function deleteSubject( $data )
    {
        $this->result = $this->CI->SubjectModel->deleteSubject($data);
        return $this->result;
    }
    
    public function getSingleSubject( $data )
    {
        $this->result = $this->CI->SubjectModel->getSingleSubject($data);
        return $this->result;
    }
    
    public function updateSubject( $data )
    {
        $this->result = $this->CI->SubjectModel->updateSubject($data);
        return $this->result;
    }

    public function getTeacherSubjectsAssign( $data )
    {
        $this->result = $this->CI->SubjectModel->getTeacherSubjectsAssign($data);
        return $this->result;
    }

    public function checkSubjectExist($data){
        $this->result = $this->CI->SubjectModel->checkSubjectExist($data);
        return $this->result;
    }
    
    
    
    // //GET Users by user type
    // public function getUsersBy( $user_type )
    // {
    //     $this->result = $this->CI->UserModel->getUsersBy( $user_type );
    //     return $this->result;
    // }
    
    
    // //ADD USER
    // public function addUser( $user_data ){
    //     $this->result = $this->CI->UserModel->addUser( $user_data );
    //     return $this->result;

    // }

    // //DELETE USER
    // public function deleteUser( $user_data ){
    //     $this->result = $this->CI->UserModel->deleteUser( $user_data );
    //     return $this->result;
    // }

    // //GET SINGLE USER
    // public function getSingleUser( $user_id ){
    //     $this->result = $this->CI->UserModel->getSingleUser( $user_id );
    //     return $this->result;

    // }

    // //UPDATE USER
    // public function updateUser( $update_data ){
    //     $this->result = $this->CI->UserModel->updateUser( $update_data );
    //     return $this->result;
    // }

}