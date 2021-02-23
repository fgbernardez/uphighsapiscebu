<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';

class RequestModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("RequestModel");
    }
    public function addRequest( $data ){
        $this->result = $this->CI->RequestModel->addRequest( $data );
        return $this->result;
    } 
    
    public function teacherGetAllRequest( $data ){
        $this->result = $this->CI->RequestModel->teacherGetAllRequest( $data );
        return $this->result;
    } 

    public function getSingleRequest( $data ){
        $this->result = $this->CI->RequestModel->getSingleRequest( $data );
        return $this->result;
    } 

    public function getRequest( $data ){
        $this->result = $this->CI->RequestModel->getRequest( $data );
        return $this->result;
    } 

    public function getRequestByStatus( $data ){
        $this->result = $this->CI->RequestModel->getRequestByStatus( $data );
        return $this->result;
    } 

    public function updateRequest( $data ){
        $this->result = $this->CI->RequestModel->updateRequest( $data );
        return $this->result;
    } 

    public function deleteRequest( $data ){
        $this->result = $this->CI->RequestModel->deleteRequest( $data );
        return $this->result;
    } 

    public function admingetallrequest(){
        $this->result = $this->CI->RequestModel->admingetallrequest( );
        return $this->result;
    } 



    
    

    
    

   
}