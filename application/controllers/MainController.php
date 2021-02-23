<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';
require_once APPPATH . 'modules/UserModule.php';


class MainController extends CI_Controller {

    public $template;
    public $userModule;
    public $response;

    public function __construct(){
        parent::__construct();
        $this->template = new TemplateModule();
        $this->userModule = new UserModule();
        $this->response = array();
    }

    public function createAdminUser()
    {

        if( $this->userModule->getAllUsers() == null ){
            $input = $this->input->post();
            if( $input != null ){
                $res = $this->userModule->createadminuser($input);
                redirect( base_url( "login" ) );
            }
            $this->template->createadminuser();
        } else {
            redirect( base_url( "login" ) );
        }
    }

    //Set Session
    public function setSessionUserData( $data )
    {
        $this->session->set_userdata( $data );
    }

    //Login
    public function login()
    {
        $this->load->library('session');

        if( $this->userModule->getAllUsers() == null ){
            redirect( base_url( "createadminuser" ) );
        } else if ($this->input->post()){
            $input = $this->input->post();
            $this->response = $this->userModule->login( $input );
            if( isset($this->response["usr_data"]) ){
                $this->setSessionUserData( $this->response["usr_data"][0] );
                $this->session->set_flashdata($this->response); 
            }
            
            $this->session->set_flashdata("msg", $this->response["msg"]); 
            $this->session->set_flashdata("status", $this->response["status"]); 

        }
        
        if( $this->session->userdata( "user_type" ) ){
            if( $this->session->userdata( "user_type" ) == "admin" || $this->session->userdata( "user_type" ) == "superadmin" ){
                redirect("admin");
            } else if( $this->session->userdata( "user_type" ) == "teacher" ){
                redirect("/");
            }
        }

        $this->template->loginTemplate();
    }

    //Logout
    public function logout()
    {
        session_destroy();
        redirect( base_url( "login" ) );
    }

    //LOGIN AJAX
    public function proccessLogin()
    {
        $input = $this->input->post();
        $this->response = $this->userModule->login( $input );
        if( isset($this->response["usr_data"]) ){
            $this->setSessionUserData( $this->response["usr_data"][0] );
        }
        echo json_encode($this->response);
    }

    

    //RETURN JSON
    public function returnJson( $data )
    {   
        // $this->output->set_status_header($status_code)->set_content_type('application/json')->set_output( json_encode( $data ) );
        // $data["status_code"] = $status_code;
        echo json_encode( $data ); exit;
    }
    
}


