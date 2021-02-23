<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

class StudentModel extends CI_Model{

    private $response;

   
    // public function updateUser( $update_data )
    // {
    //     $this->db->where('user_id', $update_data["user_id"]);
    //     $this->db->update('users', $update_data);
    //     $this->response["code"] = 201;
    //     $this->response["status"] = "callout-success"; 
    //     $this->response["msg"] = "Successfully updated user!";
    //     return $this->response;
        
    // }

    public function checkStudentExist( $data ){
        
        $check_que = $this->db->where( $data )->get( "students" );
        return $check_que;

    }

    public function getStudents(){

        $students_res = array();
        $students = $this->db->get("students")->result_array();
        foreach( $students as $std ){
            $get_current_grade_level =  $this->db->select("*")
            ->from( "schoolyear_students" )
                ->where("schoolyear_students.student_id", $std["student_id"])
                ->join( "schoolyear", "schoolyear.sy_id = schoolyear_students.sy_id" )
                ->order_by( "schoolyear_students.sy_std_id", "DESC" )
                ->limit(1)
                ->get()->result_array();
            if( $get_current_grade_level == null ){
                $std["grade_level"]= "None";
                $std["schoolyear"]= "None";
            } else {
                $std["schoolyear"] = $get_current_grade_level[0]["start_year"] ." - ".$get_current_grade_level[0]["end_year"];
                $std["grade_level"] = $get_current_grade_level[0]["grade_level"];
            }
            array_push( $students_res, $std );
        }
        return $students_res;
        
        // $this->response = $this->db->get("students")->result_array();
        // return $this->response;
        
    }


    public function getAllStudents(){
        return $this->db->select("TIMESTAMPDIFF(YEAR,students.birthdate, CURDATE()) AS age", false)->get("students");
        // $this->db->select("TIMESTAMPDIFF(YEAR,a.date_birth, CURDATE()) AS age", false);
    }
    
    public function getAllStudentsWithParam( $per_page, $segment, $search_student_key ){


        if( $per_page == null && $per_page == null && $search_student_key != null){

            $this->db->select("*, TIMESTAMPDIFF(YEAR, students.birthdate ,NOW()) AS age");
            $this->db->from( "schoolyear_students" );
            $this->db->where( $search_student_key );
            $this->db->join( "students", "students.student_id = schoolyear_students.student_id" );
            return $this->db->get();

        } else if( $per_page != null && $per_page != null && $search_student_key != null){

            $this->db->select("*, TIMESTAMPDIFF(YEAR, students.birthdate ,NOW()) AS age");
            $this->db->from( "schoolyear_students" );
            $this->db->where( $search_student_key );
            $this->db->join( "students", "students.student_id = schoolyear_students.student_id" );
            return $this->db->get();

        } else if( $per_page != null && $per_page != null && $search_student_key == null){

            return $this->db->select("*, TIMESTAMPDIFF(YEAR, students.birthdate ,NOW()) AS age")->get("students", $per_page, $segment);


        }

    }
    



    public function addStudent( $data ){

        if( $this->checkStudentExist( array("first_name" => $data["first_name"], "last_name" => $data["last_name"]) )->num_rows() == 0  ){
            
            $this->db->insert( "students", $data );
            $this->response["code"] = 200;
            $this->response["msg"] = "Successfully added new student!";
            $this->response["status"] = "success";
        } else {
            $this->response["code"] = 203;
            $this->response["msg"] = $data["last_name"].' '.$data["first_name"]. ' is already exist!';
            $this->response["status"] = "warning";
        }
        return $this->response;
    }

    public function updateStudent( $data ){

        if( $this->checkStudentExist( array("student_id" => $data["student_id"]) )->num_rows() > 0  ){

            $this->db->where( "student_id", $data["student_id"] );
            $this->db->update( "students", $data );
            $this->response["code"] = 200;
            $this->response["msg"] = "Successfully updated student!";
            $this->response["status"] = "success";
        } else {
            $this->response["code"] = 204;
            $this->response["msg"] = 'Error occured to update student!';
            $this->response["status"] = "danger";
        }
        return $this->response;
    }

    public function deleteStudent( $data )
    {
        if( $this->checkStudentExist( $data )->num_rows() > 0  ){

            $this->db->where($data);
            $this->db->delete('students');
            $this->response["code"] = 200;
            $this->response["msg"] = "Successfully deleted student!";
            $this->response["status"] = "success";
            
        } else {
            $this->response["code"] = 204;
            $this->response["msg"] = 'Error to occured to delete student!';
            $this->response["status"] = "danger";
        }

        return $this->response;
        
    }


}
?>
