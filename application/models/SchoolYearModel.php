<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

class SchoolYearModel extends CI_Model{

    private $response;


    public function checkExistSchoolYear( $data ){
        $exist = $this->db->where( $data )->get( "schoolyear" )->num_rows();
        return $exist;
    }

    public function getSchoolYear( $data )
    {
        $this->response = $this->db->where( $data )->get("schoolyear")->result_array();
        return $this->response;
        
	}
	
    public function existDeadline(){
        return $this->db->get("grade_deadline");
    }
    public function updateDeadlineSubmitGrade( $data ){
        if( $this->existDeadline()->num_rows() == 0 ){
            $this->db->insert( "grade_deadline", $data );
        }else {
            $this->db->where("gd_id", $this->existDeadline()->result_array()[0]["gd_id"] );
            $this->db->update( "grade_deadline" , $data);
        }
    }

    public function createSY( $input ){

        if( $this->checkExistSchoolYear( $input ) == 0 ){
            $this->db->insert( "schoolyear", $input );
            if( $this->db->insert_id() != null or $this->db->insert_id() != 0 ){

                $this->response["code"] = "200";
                $this->response["msg"] = "Successfully added new school year!";
                $this->response["status"] = "callout-success";
            } else {
                $this->response["code"] = "204";
                $this->response["msg"] = "Error occured of creating school year";
                $this->response["status"] = "callout-danger";
            }

        } else {
            $this->response["code"] = "203";
            $this->response["msg"] = "SY ".$input["start_year"]."-".$input["end_year"]." is already exist";
            $this->response["status"] = "callout-warning";
        }
        

        return $this->response;

    }

    public function getSchoolYears()
    {
        return $this->db->order_by( 'sy_id', 'DESC' )->get("schoolyear")->result_array();
    }

    public function deleteSY( $data ){

        if( $this->checkExistSchoolYear( $data ) > 0 ){
            $this->db->where( $data );
            $this->db->delete( "schoolyear");
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully deleted school year!";
            $this->response["status"] = "callout-success";
        } else {
            $this->response["code"] = "204";
            $this->response["msg"] = "Error occured to delete school year!";
            $this->response["status"] = "callout-danger";
        }

        return $this->response;
    }

    public function getSingleSY( $data ){

        if( $this->checkExistSchoolYear( $data ) > 0 ){

            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["status"] = "callout-success";
            $this->response["data"] = $this->db->where( $data )->get( "schoolyear" )->result_array();
        } else {
            $this->response["code"] = "204";
            $this->response["msg"] = "No data found!";
            $this->response["status"] = "callout-danger";
        }

        return $this->response;
        
    }

    public function updateSY( $update_sy ){

        if( $this->checkExistSchoolYear( array( "sy_id" => $update_sy["sy_id"] ) ) > 0 ){
            
            if( $this->checkExistSchoolYear( array( "start_year" => $update_sy["start_year"], "end_year" => $update_sy["end_year"] ) ) == 0 ){
                
                $this->db->where( "sy_id", $update_sy["sy_id"] );
                $this->db->update( "schoolyear", $update_sy );
                $this->response["code"] = "200";
                $this->response["msg"] = "Successfully updated school year!";
                $this->response["status"] = "callout-success";
            } else {
                $this->response["code"] = "203";
                $this->response["msg"] = "SY ".$update_sy["start_year"]."-".$update_sy["end_year"]." is already exist";
                $this->response["status"] = "callout-warning";
            }
    

        } else {
            $this->response["code"] = "204";
            $this->response["msg"] = "Error occured to update!";
            $this->response["status"] = "callout-danger";
        }

        return $this->response;
        

    }

    public function addStudent( $data ){

        // var_dump( $data["grade"] )

        foreach( $data["student_id"] as $student_id ){
            $sy_std = array( "sy_id"=> $data["sy_id"], "grade_level"=>$data['grade_level'], "student_id" => $student_id );
            $this->db->insert("schoolyear_students", $sy_std);
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully added students!";
            $this->response["status"] = "callout-success";
        }

        return $this->response;
        
    }


    public function getStudentsSchoolYear( $data )
    {
        $this->db->select( "students.student_id, students.first_name, students.last_name" );
        // $this->db->select("*");
        $this->db->where( "schoolyear_students.sy_id", $data["sy_id"] );
        $this->db->where( "schoolyear_students.grade_level", $data["grade_level"] );
        $this->db->from("schoolyear_students");
        $this->db->join("students", "students.student_id = schoolyear_students.student_id");
        $this->response["code"] = 200;
        $this->response["msg"] = "OK";
        $this->response["data"] = $this->db->get()->result_array();
        return $this->response;

    }


    public function getStudentsSchoolYearFromAdminController( $sy_id, $grade_level )
    {
        $this->db->select( "students.student_id, students.first_name, students.last_name" );
        // $this->db->select("*");
        $this->db->where( "schoolyear_students.sy_id", $sy_id );
        $this->db->where( "schoolyear_students.grade_level", $grade_level );
        $this->db->from("schoolyear_students");
        $this->db->join("students", "students.student_id = schoolyear_students.student_id");
        return $this->db->get();

    }


    public function getStudentsToAdd( $data )
    {
        $this->db->select("*");
        $this->db->from("students");
        $this->db->where("status", 1);
        $this->db->where('students.student_id NOT IN ( select student_id from schoolyear_students WHERE sy_id ='.$data["sy_id"].'  )', NULL, FALSE);
        return $this->db->get()->result_array();
    }



    public function getTeachersToAssign()
    {
        $clause = array("user_type" => "teacher", "active"=>1);
        $this->db->select("*");
        $this->db->where($clause);
        $this->db->from("users");
        return $this->db->get()->result_array();
    }

    public function getSchoolYearSubjects( $data )
    {   
        $this->db->select("*");
        $this->db->from("subjects");
        $this->db->join("users", "users.user_id = subjects.assigned_teacher", "left");
        $this->db->where( $data );
        return $this->db->get();
    }

    public function checkIfStudentExistInSchoolYear( $data )
    {
        $this->db->select("*, TIMESTAMPDIFF(YEAR, students.birthdate ,NOW()) AS age");
        $this->db->from( "schoolyear_students" );
        $this->db->where( array( "schoolyear_students.sy_id"=> $data["sy_id"], "schoolyear_students.student_id"=>$data["student_id"] ) );
        $this->db->join( "students", "students.student_id = schoolyear_students.student_id" );
        return $this->db->get();
    }
    
    public function getTeacherSubjectStudents( $data ){
        $where_clause = array( "schoolyear_students.sy_id"=>$data["sy_id"],"schoolyear_students.grade_level"=>$data["grade_level"]  );
        $this->db->select("*");
        $this->db->from( "schoolyear_students" );
        $this->db->where( $where_clause );
        $this->db->join( "students", "students.student_id = schoolyear_students.student_id" );
        return $this->db->get();
    }


    public function removeStudentingradelevel( $data ){

        if( $this->checkExistSchoolYear( array( "sy_id"=> $data["sy_id"] ) ) > 0 ){

            $chck_std_exist = $this->db->where( $data )->get( "schoolyear_students" );
            if( $chck_std_exist != null ){

                $tables = array('schoolyear_students', 'average', 'behavior', 'days_present', 'request', 'school_days', 'times_tardy', 'grades');
                $this->db->where($data);
                $this->db->delete($tables);
                $this->response["code"] = 200;
                $this->response["msg"] = "OK";

            } else {
                $this->response["code"] = 204;
                $this->response["msg"] = "Error Occured";
            }


        } else {
            $this->response["code"] = 204;
            $this->response["msg"] = "Error Occured";
        }


        return $this->response;
    }

	public function viewTeachers ($data) {

		//	s -> subjects
		//	ss -> schoolyear_students
		//	si -> students profile
		//	u -> users/teacher profile
		//	g -> grades
		$this->db->select("
			s.sy_id,
			s.subject_id,
			s.subject_name,
			s.semester,
			s.assigned_teacher,
			s.grade_level,
			ss.sy_id,
			ss.student_id,
			u.first_name,
			u.last_name,
			CONCAT_WS(',', si.first_name, si.last_name) as student_name,
			IFNULL(g.quarter_first, 0) AS quarter_first,
			IFNULL(g.quarter_second, 0) AS quarter_second,
			IFNULL(g.quarter_third, 0) AS quarter_third,
			IFNULL(g.quarter_fourth, 0) AS quarter_fourth
		");
		$this->db->from("subjects as s");
		$this->db->where("s.sy_id", $data["sy_id"]);
		$this->db->join("schoolyear_students as ss", "s.sy_id = ss.sy_id AND s.grade_level = ss.grade_level");
		$this->db->join("users as u", "u.user_id = s.assigned_teacher");
		$this->db->join("students as si", "si.student_id = ss.student_id");
		$this->db->join("grades as g", "g.student_id = si.student_id AND g.subject_id = s.subject_id", "left");
		$results = $this->db->get()->result_array();

		$teachers = array();
		foreach ($results as $res) {

			//Group by teachers
			$teachers[$res['assigned_teacher']]['teacher_id'] = $res['assigned_teacher'];
			$teachers[$res['assigned_teacher']]['teacher_name'] = $res['first_name'] .' '. $res['last_name'];

			//Group by subjects
			foreach ($results as $sbj) {
				$teachers[$sbj['assigned_teacher']]['subjects'][$sbj['subject_id']]["subject_id"] = $sbj['subject_id'];
				$teachers[$sbj['assigned_teacher']]['subjects'][$sbj['subject_id']]["subject_name"] = $sbj['subject_name'];
				$teachers[$sbj['assigned_teacher']]['subjects'][$sbj['subject_id']]["grade_level"] = $sbj['grade_level'];
				$teachers[$sbj['assigned_teacher']]['subjects'][$sbj['subject_id']]["semester"] = $sbj['semester'];
				$teachers[$sbj['assigned_teacher']]['subjects'][$sbj['subject_id']]["students"] = [];
			}
			$countStd = 0;
			//Group by students
			foreach ($results as $std) {
				$teachers[$std['assigned_teacher']]['subjects'][$std['subject_id']]["students"][$countStd]['student_id'] = $std['student_id'];
				$teachers[$std['assigned_teacher']]['subjects'][$std['subject_id']]["students"][$countStd]['student_name'] = $std['student_name'];
				$teachers[$std['assigned_teacher']]['subjects'][$std['subject_id']]["students"][$countStd]['quarter_first'] = $std['quarter_first'];
				$teachers[$std['assigned_teacher']]['subjects'][$std['subject_id']]["students"][$countStd]['quarter_second'] = $std['quarter_second'];
				$teachers[$std['assigned_teacher']]['subjects'][$std['subject_id']]["students"][$countStd]['quarter_third'] = $std['quarter_third'];
				$teachers[$std['assigned_teacher']]['subjects'][$std['subject_id']]["students"][$countStd]['quarter_fourth'] = $std['quarter_fourth'];
				$countStd ++;
			}

		}
		return $teachers;
	}

}