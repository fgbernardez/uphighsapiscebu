<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

class RequestModel extends CI_Model{

    private $response;

   
    //public function updateUser( $update_data )
    //{
      //  $this->db->where('user_id', $update_data["user_id"]);
     //   $this->db->update('users', $update_data);
     //   $this->response["code"] = 201;
     //   $this->response["status"] = "callout-success"; 
     //  $this->response["msg"] = "Successfully updated user!";
     //    return $this->response;
        
    //}

    public function checkExistRequest( $data ){
        
        $check_que = $this->db->where( $data )->get( "request" );
        return $check_que;

    }


    

    public function admingetallrequest( ){
        $this->db->select("*, students.first_name AS 'std_first_name', students.last_name AS 'std_last_name'");
        $this->db->from( "request" );
        $this->db->join( "students", "students.student_id = request.student_id", "left" );
        $this->db->join( "subjects", "subjects.subject_id = request.subject_id", "left" );
        $this->db->join( "schoolyear", "schoolyear.sy_id = request.sy_id", "left" );
        $this->db->join( "users", "users.user_id = request.teacher_id", "left" );
        $this->db->order_by("request_id", "desc");
        return $this->db->get();
    }

    public function admingetallrequestWithParam($per_page, $segment ){
        $this->db->select("*, students.first_name AS 'std_first_name', students.last_name AS 'std_last_name'");
        $this->db->from( "request" );
        $this->db->join( "students", "students.student_id = request.student_id", "left" );
        $this->db->join( "subjects", "subjects.subject_id = request.subject_id", "left" );
        $this->db->join( "schoolyear", "schoolyear.sy_id = request.sy_id", "left" );
        $this->db->join( "users", "users.user_id = request.teacher_id", "left" );
        $this->db->order_by("request_id", "desc");
        $this->db->limit( $per_page, $segment );
        return $this->db->get();
    }

    

    public function teacherGetAllRequest( $data ){

        $this->db->select("*");
        $this->db->where( $data );
        $this->db->from( "request" );
        $this->db->join( "students", "students.student_id = request.student_id", "left" );
        $this->db->join( "subjects", "subjects.subject_id = request.subject_id", "left" );
        $this->db->join( "schoolyear", "schoolyear.sy_id = request.sy_id", "left" );
        $this->db->order_by("request_id", "desc");
        return $this->db->get();

    }

    public function teachergetallrequestWithParam( $data,$per_page, $segment ){

        $this->db->select("*");
        $this->db->where( $data );
        $this->db->from( "request" );
        $this->db->join( "students", "students.student_id = request.student_id", "left" );
        $this->db->join( "subjects", "subjects.subject_id = request.subject_id", "left" );
        $this->db->join( "schoolyear", "schoolyear.sy_id = request.sy_id", "left" );
        $this->db->order_by("request_id", "desc");
        $this->db->limit( $per_page, $segment );
        return $this->db->get();
    }

    public function addRequest( $data ){


        $check_arr = array( "grading" => $data["grading"], "student_id"=> $data["student_id"], "subject_id"=>$data["subject_id"], "sy_id"=>$data["sy_id"], "teacher_id"=>$data["teacher_id"] );
        $res_check = $this->db->where( $check_arr )->order_by("request_id", "DESC")->limit(1)->get( "request" )->result_array();
        // var_dump( $res_check);
        if( $res_check != null ){
            if( $res_check[0]["req_status"] == "Pending" ){
                $this->response["code"] = 204;
                $this->response["msg"] = "You still have pending request for this student!";
                $this->response["status"] = "warning";
            // } else if( $res_check[0]["req_status"] == "Declined" || $res_check[0]["req_status"] == "Accepted"  ){

            } else if( $res_check[0]["request_attempt"] >= 2){
                $data["request_attempt"] = $res_check[0]["request_attempt"] + 1;
                $this->db->insert( "request", $data );
                $this->response["code"] = 200;
                $this->response["msg"] = "You have exceeded the attempt in editing this grade!";
                $this->response["status"] = "warning";

            } else {
                $data["request_attempt"] = $res_check[0]["request_attempt"] + 1;
                $this->db->insert( "request", $data );
                $this->response["code"] = 200;
                $this->response["msg"] = "Successfully request!";
                $this->response["status"] = "success";
            }
            

        }else {
            $data["request_attempt"] = 1;
            $this->db->insert( "request", $data );
            $this->response["code"] = 200;
            $this->response["msg"] = "Successfully request!";
            $this->response["status"] = "success";
        }

        return $this->response;


    }
    public function getSingleRequest( $data ){
        $this->db->select("*");
        $this->db->where( $data );
        $this->db->from( "request" );
        $this->db->join( "students", "students.student_id = request.student_id", "left" );
        $this->db->join( "subjects", "subjects.subject_id = request.subject_id", "left" );
        $this->db->join( "schoolyear", "schoolyear.sy_id = request.sy_id", "left" );
        return $this->db->get();
    }

    
    public function getRequest( $data ){
        return $this->db->where($data)->get( "request" );
    }    


    public function updateRequest( $data ){


        if( isset( $data["req_status"] ) ){
            if( $data["req_status"] == "Pending" || $data["req_status"] == "Declined" ){
                $data["deadline_date"] = "";
            }
        }

        if( $this->checkExistRequest( array( "request_id"=> $data["request_id"] ) )->num_rows() > 0){
            $this->db->where(array( "request_id"=> $data["request_id"] )  );
            $this->db->update( "request", $data );
            $this->response["code"] = 200;
            $this->response["msg"] = "Successfully update request!";
            $this->response["status"] = "callout-success";
        } else {
            $this->response["code"] = 200;
            $this->response["msg"] = "Error occured!";
            $this->response["status"] = "callout-danger";
        }
        return $this->response;
    }


    public function deleteRequest( $data ){
        if( $this->checkExistRequest( $data )->num_rows() > 0){
            $this->db->query("SET FOREIGN_KEY_CHECKS=0;");
            $this->db->where("request_id", $data["request_id"]);
            $this->db->delete( "request" );
            $this->response["code"] = 200;
            $this->response["msg"] = "Successfully delete request!";
            $this->response["status"] = "callout-success";
        } else {
            $this->response["code"] = 200;
            $this->response["msg"] = "Error occured!";
            $this->response["status"] = "callout-danger";
        }
        
    }


    public function getRequestByStatus( $data ){

        $get_res = $this->db->where( $data )->get("request");
        return $get_res;
        
    }

    


}
?>
