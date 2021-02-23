<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

class UserModel extends CI_Model{

    private $response;

    public function login($data)
    {
        $data["password"] = md5( $data["password"] );
        $que = $this->db->where($data)->get("users");
        if( $que->num_rows() > 0 )
        {
            $user_data = $que->result_array();
            if( $user_data[0]["active"] == 1 ){
                $this->response["code"] = 200; 
                $this->response["msg"] = "Successfully login!"; 
                $this->response["usr_data"] = $que->result_array(); 
                $this->response["status"] = "callout-success"; 
            } else {
                $this->response["code"] = 203; 
                $this->response["msg"] = "User is no longer active"; 
                $this->response["usr_data"] = NULL; 
                $this->response["status"] = "callout-danger"; 
            }

        } else {
            
            $this->response["code"] = 204; 
            $this->response["msg"] = "Invalid username or password!"; 
            $this->response["usr_data"] = NULL;
            $this->response["status"] = "callout-danger"; 

        }
        return $this->response;
    }


    //get All Users
    public function getAllUsers()
    {
        return $this->db->get("users")->result_array();
    }

    //get Users
    public function getUsers()
    {
        return $this->db->get("users");
    }

    public function getUsersWithParam(  $per_page, $segment, $search_usr_key = NULL )
    {
        if( $search_usr_key == NULL ){
            return $this->db->get("users", $per_page, $segment);
        } else {
            $this->db->like( "first_name", $search_usr_key );
            $this->db->or_like( "last_name", $search_usr_key );
            $this->db->or_like( "email", $search_usr_key );
            $this->db->or_like( "user_type", $search_usr_key );
            return $this->db->get("users", $per_page, $segment);
            
        }
        
    }


    //GET USERS BY USER TYPE
    public function getUsersBy( $user_type )
    {
        return $this->db->where( "user_type", $user_type )->get("users")->result_array();
    }
    

    public function createadminuser( $data ){
        $data["active"] = 1;
        $data["user_type"] = "admin";
        $data["password"] = md5( $data["password"] );
        $this->db->insert( "users", $data );
        $this->response["code"] = 201;
        $this->response["status"] = "callout-success"; 
        $this->response["msg"] = "Successfully created admin user!";
        return $this->response;
        
    }
    
    //ADD USER
    public function addUser( $user_data ){

        $check = $this->db->where( "email", $user_data["email"] )->get("users");
        if( $check->num_rows() == 0 ){
            $user_data["password"] = md5( "uphssapis2019" );
            $this->db->insert( "users", $user_data );
            $this->response["code"] = 201;
            $this->response["status"] = "callout-success"; 
            $this->response["msg"] = "Successfully created user!";
        } else {
            $this->response["code"] = 203;
            $this->response["msg"] = "User is already exist!";
            $this->response["status"] = "callout-warning"; 
        }
        return $this->response;
    }

    //DELETE USER
    public function deleteUser( $user_data ){
        $this->db->where( $user_data );
        $this->db->delete("users");
        $this->response["code"] = 200;
        $this->response["status"] = "callout-success"; 
        $this->response["msg"] = "Successfully deleted user!";
        return $this->response;
    }

    //GET SINGLE USER
    public function getSingleUser( $user_id ){
        $this->db->select("*");
        $this->db->where( "user_id", $user_id );
        
        $this->response["code"] = 200;
        $this->response["status"] = "callout-success"; 
        $this->response["msg"] = "OK!";
        $this->response["user_data"] = $this->db->get("users")->result_array();
        return $this->response;
    }

    //UDPATE USER
    public function updateUser( $update_data )
    {
        $this->db->where('user_id', $update_data["user_id"]);
        $this->db->update('users', $update_data);
        $this->response["code"] = 201;
        $this->response["status"] = "callout-success"; 
        $this->response["msg"] = "Successfully updated user!";
        return $this->response;
        
    }

    public function updateProfile( $data ){

        if( isset($data["retype_password"]) && isset( $data["password"] ) ){
            unset( $data["retype_password"] );
            $data["password"] = md5( $data["password"] );
        }

        $this->db->where('user_id', $data["user_id"]);
        $this->db->update('users', $data);
        $this->response["code"] = 200;
        $this->response["status"] = "callout-success"; 
        $this->response["msg"] = "Successfully updated profile!";
        $this->response["usr_data"] = $this->db->where('user_id', $data["user_id"])->get("users")->result_array()[0];
        return $this->response;
	}
	
	//GET SUPERADMIN USER
	public function getSuperAdminUser()
	{
		$arrCon = array("active" => 1, "user_type" => "superadmin");
		return $this->db->select("first_name, last_name")->where($arrCon)->limit(1)->get("users");
	}


}
?>
