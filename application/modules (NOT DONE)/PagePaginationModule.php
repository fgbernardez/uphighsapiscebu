<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';

class PagePaginationModule extends CI_Controller {

    public $CI;
    public $config;

    public function __construct()
    {   
        // parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->library("pagination");
        $this->CI->load->model("HistoryModel");
        $this->CI->load->model("RequestModel");
        $this->CI->load->model("UserModel");
        $this->CI->load->model("StudentModel");

        $this->config["first_tag_open"] = "<li>";
        $this->config["first_tag_close"] = "</li>";
        $this->config["last_tag_open"] = "<li>";
        $this->config["last_tag_close"] = "</li>";
        $this->config["num_tag_open"] = "<li>";
        $this->config["num_tag_close"] = "</li>";
        $this->config["next_tag_open"] = "<li>";
        $this->config["next_tag_close"] = "</li>";
        $this->config["prev_tag_open"] = "<li>";
        $this->config["prev_tag_close"] = "</li>";
        $this->config["cur_tag_open"] = '<li> <a class="current">';
        $this->config["cur_tag_close"] = '</a></li>';
        
    }

    
    public function historyPaginate( ){

        $this->config["base_url"] = base_url( "admin/history" );
        $this->config["per_page"] = 30;
        $this->config["num_links"] = 10;
        $this->config["total_rows"] = $this->CI->HistoryModel->getAllHistory()->num_rows();
        $this->CI->pagination->initialize( $this->config );
        $data["histories"] = $this->CI->HistoryModel->getAllHistoryWithParam($this->config["per_page"], $this->CI->uri->segment(3));
        return $data;
    }


    public function requestPaginate( ){

        $this->config["base_url"] = base_url( "admin/request" );
        $this->config["per_page"] = 30;
        $this->config["num_links"] = 10;
        $this->config["total_rows"] = $this->CI->RequestModel->admingetallrequest()->num_rows();
        $this->CI->pagination->initialize( $this->config );
        $data["all_request"] = $this->CI->RequestModel->admingetallrequestWithParam($this->config["per_page"], $this->CI->uri->segment(3));
        // print("<pre>".print_r($data["all_request"]->result_array(),true)."</pre>");
        return $data;
    }

    

    public function requestTeacherPaginate( ){

        $this->config["base_url"] = base_url( "request" );
        $this->config["per_page"] = 30;
        $this->config["num_links"] = 10;
        $this->config["total_rows"] = $this->CI->RequestModel->teacherGetAllRequest( array( "teacher_id"=>$this->CI->session->userdata("user_id")) )->num_rows();
        $this->CI->pagination->initialize( $this->config );
        $data["all_request"] = $this->CI->RequestModel->teachergetallrequestWithParam(array( "teacher_id"=>$this->CI->session->userdata("user_id")), $this->config["per_page"], $this->CI->uri->segment(2));
        // print("<pre>".print_r($data["all_request"]->result_array(),true)."</pre>");
        return $data;
    }


    // public function manageStudentsPaginate( ){

    //     $this->config["base_url"] = base_url( "request" );
    //     $this->config["per_page"] = 30;
    //     $this->config["num_links"] = 10;
    //     $this->config["total_rows"] = $this->CI->RequestModel->teacherGetAllRequest( array( "teacher_id"=>$this->CI->session->userdata("user_id")) )->num_rows();
    //     $this->CI->pagination->initialize( $this->config );
    //     $data["all_request"] = $this->CI->RequestModel->teachergetallrequestWithParam(array( "teacher_id"=>$this->CI->session->userdata("user_id")), $this->config["per_page"], $this->CI->uri->segment(2));
    //     // print("<pre>".print_r($data["all_request"]->result_array(),true)."</pre>");
    //     return $data;
    // }

    public function manageStudentsPaginate( $search_student_key ){

        $this->config["base_url"] = base_url( "admin/manage-students" );
        $this->config["per_page"] = 20;
        $this->config["num_links"] = 10;
        $this->config["total_rows"] = $this->CI->StudentModel->getAllStudents("", "", $search_student_key)->num_rows();
        $this->CI->pagination->initialize( $this->config );
        $data["students"] = $this->CI->StudentModel->getAllStudentsWithParam($this->config["per_page"], $this->CI->uri->segment(3), $search_student_key);
        // print("<pre>".print_r($data["all_request"]->result_array(),true)."</pre>");
        return $data;
    }


    public function manageUsersPaginate( $search_usr_key = NULL){

        $this->config["base_url"] = base_url( "admin/manage-users" );
        $this->config["per_page"] = 20;
        $this->config["num_links"] = 10;
        $this->config["total_rows"] = $this->CI->UserModel->getUsers()->num_rows();
        $this->CI->pagination->initialize( $this->config );
        $data["users"] = $this->CI->UserModel->getUsersWithParam( $this->config["per_page"], $this->CI->uri->segment(3), $search_usr_key);
        // print("<pre>".print_r($data["all_request"]->result_array(),true)."</pre>");
        return $data;
    }

    
    
    

    

}

