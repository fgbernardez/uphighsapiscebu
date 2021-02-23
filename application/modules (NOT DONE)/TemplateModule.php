<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class TemplateModule extends MY_Controller {
    
    private $ci;

    public function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->model("RequestModel");
        $this->ci->load->model("SchoolYearModel");
        
    }

    public function adminTemplate( $temp, $data = NULL )
    {
        $req["pending_request"] = $this->ci->RequestModel->getRequestByStatus( array( "req_status"=>"Pending" ) )->num_rows();
        $req["schoolyears"] =  $this->ci->SchoolYearModel->getSchoolYears();
        $this->ci->load->view("includes/head");
        $this->ci->load->view("includes/header");
        $this->ci->load->view("includes/sidebar", $req);
        $this->ci->load->view("admin/".$temp, $data );
        $this->ci->load->view("includes/bottom");
        $this->ci->load->view("includes/footer");
    }

    public function teacherTemplate( $temp, $data = NULL )
    {
        $req["pending_request"] = $this->ci->RequestModel->getRequestByStatus( array( "req_status"=>"Pending", "teacher_id"=> $this->ci->session->userdata("user_id") ) )->num_rows();
        $req["schoolyears"] =  $this->ci->SchoolYearModel->getSchoolYears();
        $this->ci->load->view("includes/head");
        $this->ci->load->view("includes/header");
        $this->ci->load->view("includes/sidebar", $req);
        $this->ci->load->view("teacher/".$temp, $data);
        $this->ci->load->view("includes/bottom");
        $this->ci->load->view("includes/footer");
    }

    public function loginTemplate()
    {
            $this->ci->load->view("includes/head");
            $this->ci->load->view("login");
            $this->ci->load->view("includes/footer");
    }


    public function createadminuser()
    {
            $this->ci->load->view("includes/head");
            $this->ci->load->view("createadminuser");
            $this->ci->load->view("includes/footer");
    }


    public function page404()
    {
        $this->ci->load->view("includes/head");
        $this->ci->load->view("404page");
        $this->ci->load->view("includes/footer");
    }




}