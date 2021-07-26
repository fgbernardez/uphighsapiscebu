<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

class SubjectModel extends CI_Model{

    private $response;

    public function checkSubjectExist( $data ){
            
        $que_check = $this->db->where($data)->get("subjects");
        return $que_check;
    }

    public function addSubject( $data ){

        $check_arr = array( "sy_id"=> $data["sy_id"], "grade_level"=> $data["grade_level"], "subject_name"=> $data["subject_name"] );

        if( $this->checkSubjectExist( $check_arr )->num_rows() == 0 ){
            $this->db->insert( "subjects", $data );
            $this->response["code"] = 200;
            $this->response["status"] = "callout-success"; 
            $this->response["msg"] = "Successfully created subject!";
        } else {
            $this->response["code"] = 203;
            $this->response["status"] = "callout-warning"; 
            $this->response["msg"] = "Subject is already exist!";
        }

        return $this->response;
    }

    public function getAllSubjectsGroupBySubjectName() {

        $this->db->select("subject_name");
        $this->db->group_by("subject_name");
        $this->response = $this->db->get("subjects");
        return $this->response;
    }

    public function getSubjects( $data ){
        if( $this->checkSubjectExist( $data )->num_rows() > 0 ){

            $this->db->select("*");
            $this->db->where($data);
            $this->db->from("subjects");
            $this->db->join("users", "users.user_id = subjects.assigned_teacher", "left");

            $this->response["code"] = 200;
            $this->response["msg"] = "OK";
            $this->response["data"] = $this->db->get()->result_array();
        } else {
            $this->response["code"] = 203;
            $this->response["msg"] = "No data found!";
            $this->response["data"] = null;
        }
        return $this->response;
    }

    public function deleteSubject( $data ){

        if( $this->checkSubjectExist( $data )->num_rows() > 0 ){
            $this->db->where( $data );
            $this->db->delete( "subjects" );
            $this->response["code"] = 200;
            $this->response["status"] = "callout-success"; 
            $this->response["msg"] = "Successfully created subject!";

        } else {
            $this->response["code"] = 204;
            $this->response["status"] = "callout-danger"; 
            $this->response["msg"] = "Error occured to delete subject!";
        }        
        return $this->response;
    }

    public function getSingleSubject( $data ){

        if( $this->checkSubjectExist( $data )->num_rows() > 0 ){

            $this->response["code"] = 200;
            $this->response["msg"] = "OK";
            $this->response["data"] = $this->db->where($data)->get("subjects")->result_array();
        } else {
            $this->response["code"] = 204;
            $this->response["status"] = "callout-danger"; 
            $this->response["msg"] = "Error occured!";
        }
        return $this->response;
    }

    public function updateSubject( $data ){

        if( $this->checkSubjectExist( array("subject_id"=>$data["subject_id"]) )->num_rows() > 0 ){

            $this->db->where(array("subject_id"=>$data["subject_id"]));
            $this->db->update("subjects", $data);
            $this->response["code"] = 200;
            $this->response["msg"] = "Successfully updated subject!";
            $this->response["status"] = "callout-success"; 

        } else {
            $this->response["code"] = 204;
            $this->response["status"] = "callout-danger"; 
            $this->response["msg"] = "Error occured to update!";
        }
        return $this->response;
    }

    public function getTeacherSubjectsAssign( $data ){

        $this->db->where($data);
        $this->response = $this->db->get("subjects");
        return $this->response;

    }

    
   
}

?>
