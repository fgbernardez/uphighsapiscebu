<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/UserModule.php";

class AjaxRequestController extends MainController{

    public $response;

    public function __construct()
    {
        parent::__construct();
        $this->checkSession();
        $this->userModule = new UserModule();
        
    }

    public function checkSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            $data["status_code"] = 400;
            $data["msg"] = "Unauthorized user!";
            $this->returnJson( $data );
        }   

    }

    //get Users
    public function getUsers()
    {
        $data = $this->userModule->getUsers();
        $this->returnJson( $data );
    }

    //GET USERS BY USER TYPE
    public function getUsersBy( $user_type )
    {
        $data = $this->userModule->getUsersBy( $user_type );
        $this->returnJson( $data );
    }

    

    //add user
    public function addUser()
    {
        $input_data = $this->input->post();
        $this->response = $this->userModule->addUser( $input_data );
        $this->returnJson( $this->response );
    }


    //DELETE USER
    public function deleteUser()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->response = $this->userModule->deleteUser( $data );
        $this->returnJson( $this->response );
    }

    //GET SINGLE USER
    public function getSingleUser( $user_id ){
        
        $this->response = $this->userModule->getSingleUser( $user_id );
        $this->returnJson( $this->response );
    }

    //UPDATE USER
    public function updateUser()
    {
        $update_data = $this->input->post();
        $this->response = $this->userModule->updateUser( $update_data );
        $this->returnJson( $this->response );
        
    }
    


    


}