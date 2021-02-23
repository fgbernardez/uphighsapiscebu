<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'modules/TemplateModule.php';
require_once APPPATH . 'modules/UserModule.php';

class UserModule extends CI_Controller {

    private $model;
    private $CI;
    private $result;
    public function __construct()
    {   
        $this->CI =& get_instance();
        $this->CI->load->model("UserModel");
        
    }

    public function login($data)
    {
        $res = $this->CI->UserModel->login( $data );
        return $res;
    }

    
    public function createadminuser($data)
    {
        $res = $this->CI->UserModel->createadminuser( $data );
        return $res;
    }

    //GET All users
    public function getAllUsers()
    {
        $this->result = $this->CI->UserModel->getAllUsers();
        return $this->result;
    }


    //GET Users
    public function getUsers()
    {
        $this->result = $this->CI->UserModel->getUsers();
        return $this->result;
    }

    //GET Users by user type
    public function getUsersBy( $user_type )
    {
        $this->result = $this->CI->UserModel->getUsersBy( $user_type );
        return $this->result;
    }
    
    
    //ADD USER
    public function addUser( $user_data ){
        $this->result = $this->CI->UserModel->addUser( $user_data );
        return $this->result;

    }

    //DELETE USER
    public function deleteUser( $user_data ){
        $this->result = $this->CI->UserModel->deleteUser( $user_data );
        return $this->result;
    }

    //GET SINGLE USER
    public function getSingleUser( $user_id ){
        $this->result = $this->CI->UserModel->getSingleUser( $user_id );
        return $this->result;
    }

    //UPDATE USER
    public function updateUser( $update_data ){
        $this->result = $this->CI->UserModel->updateUser( $update_data );
        return $this->result;
    }


    public function updateProfile( $data ){
        $this->result = $this->CI->UserModel->updateProfile( $data );
        return $this->result;
	}
	
	public function getSuperAdminUser()
	{
		$this->result = $this->CI->UserModel->getSuperAdminUser();
        return $this->result;
	}


}
