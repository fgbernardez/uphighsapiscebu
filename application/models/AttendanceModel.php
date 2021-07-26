<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

class AttendanceModel extends CI_Model{

    private $response;


    public function checkExistSchoolDays( $data ){
        $exist = $this->db->where( $data )->get( "attendance" );
        return $exist;
    }

    public function checkExistPresentDays( $data ){
        $exist = $this->db->where( $data )->get( "attendance" );
        return $exist;
    }

    public function checkExistTimesTardy( $data ){
        $exist = $this->db->where( $data )->get( "attendance" );
        return $exist;
    }

    public function schoolDays( $data )
    {
        if( $this->checkExistSchoolDays($data)->num_rows() != 0 ){
			$resData = $this->checkExistSchoolDays($data)->result_array()[0];
			$resData["total"] = $resData["january"] + $resData["february"] + $resData["march"] + $resData["april"] + $resData["may"] + $resData["june"] + $resData["july"] + $resData["august"] + $resData["september"] + $resData["october"] + $resData["november"] + $resData["december"];
            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["data"] = $resData;
			$this->response["status"] = "callout-danger";
        } else {
            $month["january"] = 0;
            $month["february"] = 0;
            $month["march"] = 0;
            $month["april"] = 0;
            $month["may"] = 0;
            $month["june"] = 0;
            $month["july"] = 0;
            $month["august"] = 0;
            $month["september"] = 0;
            $month["october"] = 0;
            $month["november"] = 0;
            $month["december"] = 0;
            $month["total"] = 0;
            $this->response["code"] = "203";
            $this->response["msg"] = "NO school days found!";
            $this->response["data"] = $month;
            $this->response["status"] = "callout-danger";
        }
        return $this->response;
    }

    public function getStudentPresentDays( $data )
    {
        if( $this->checkExistPresentDays($data)->num_rows() != 0 ){
			$resData = $this->checkExistPresentDays($data)->result_array()[0];
			$resData["total"] = $resData["january"] + $resData["february"] + $resData["march"] + $resData["april"] + $resData["may"] + $resData["june"] + $resData["july"] + $resData["august"] + $resData["september"] + $resData["october"] + $resData["november"] + $resData["december"];
            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["data"] = $resData;
			$this->response["status"] = "callout-danger";
			
        } else {
            $month["january"] = 0;
            $month["february"] = 0;
            $month["march"] = 0;
            $month["april"] = 0;
            $month["may"] = 0;
            $month["june"] = 0;
            $month["july"] = 0;
            $month["august"] = 0;
            $month["september"] = 0;
            $month["october"] = 0;
            $month["november"] = 0;
            $month["december"] = 0;
            $month["total"] = 0;
            $this->response["code"] = "203";
            $this->response["msg"] = "NO days present found!";
            $this->response["data"] = $month;
            $this->response["status"] = "callout-danger";
        }
        return $this->response;
    }


    public function getStudentTimesTardy( $data )
    {
        if( $this->checkExistTimesTardy( $data )->num_rows() != 0 ){
			$resData = $this->checkExistTimesTardy( $data )->result_array()[0];
			$resData["total"] = $resData["january"] + $resData["february"] + $resData["march"] + $resData["april"] + $resData["may"] + $resData["june"] + $resData["july"] + $resData["august"] + $resData["september"] + $resData["october"] + $resData["november"] + $resData["december"];
            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["data"] = $resData;
            $this->response["status"] = "callout-danger";
        } else {
            $month["january"] = 0;
            $month["february"] = 0;
            $month["march"] = 0;
            $month["april"] = 0;
            $month["may"] = 0;
            $month["june"] = 0;
            $month["july"] = 0;
            $month["august"] = 0;
            $month["september"] = 0;
            $month["october"] = 0;
            $month["november"] = 0;
            $month["december"] = 0;
            $month["total"] = 0;
            $this->response["code"] = "203";
            $this->response["msg"] = "NO times tardy found!";
            $this->response["data"] = $month;
            $this->response["status"] = "callout-danger";
        }
        return $this->response;
    }


    public function addSchoolDays( $data ){
		$checExist = array( "sy_id" => $data["sy_id"], "grade_level" => $data["grade_level"], "student_id" => $data["student_id"], "attendance_type" => $data["attendance_type"]);
        if( $this->checkExistSchoolDays($checExist)->num_rows() != 0 ){
            $this->db->where($checExist);
            $this->db->update( "attendance", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully updated school days!";
            $this->response["status"] = "callout-success";
        } else {
            // $this->db->where( $check );
            $this->db->insert( "attendance", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully school days!";
            $this->response["status"] = "callout-success";
        }
        return $this->response;
    }


    public function addPresentDays( $data ){
		$checExist = array( "sy_id" => $data["sy_id"], "grade_level" => $data["grade_level"], "student_id" => $data["student_id"], "attendance_type" => $data["attendance_type"]);
        if( $this->checkExistPresentDays($checExist)->num_rows() != 0){
            $this->db->where($checExist);
            $this->db->update("attendance", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully present days!";
            $this->response["status"] = "callout-success";
        } else {
            // $this->db->where( $check );
            $this->db->insert("attendance", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully present days!";
            $this->response["status"] = "callout-success";
        }
        return $this->response;
    }


    public function addTimesTardy( $data ){
		$checExist = array( "sy_id" => $data["sy_id"], "grade_level" => $data["grade_level"], "student_id" => $data["student_id"], "attendance_type" => $data["attendance_type"]);
        if( $this->checkExistTimesTardy($checExist)->num_rows() != 0){
            $this->db->where($checExist);
            $this->db->update( "attendance", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully times tardy!";
            $this->response["status"] = "callout-success";
        } else {
            // $this->db->where( $check );
            $this->db->insert( "attendance", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully times tardy!";
            $this->response["status"] = "callout-success";
        }
        return $this->response;
    }

    
}
