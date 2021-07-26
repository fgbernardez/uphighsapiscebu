<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/SchoolYearModule.php";
require_once APPPATH . "modules/StudentModule.php";
require_once APPPATH . "modules/GradeModule.php";
require_once APPPATH . "modules/UserModule.php";
require_once APPPATH . "modules/AttendanceModule.php";
require_once APPPATH . "modules/RequestModule.php";
require_once APPPATH . "modules/PagePaginationModule.php";
require_once APPPATH . "modules/SubjectModule.php";
require_once APPPATH . "modules/AttendanceCalendarModule.php";



class AdminController extends MainController{

    public function __construct()
    {
        parent::__construct();
        $this->checkAdminSession();
        $this->schoolYearModule = new SchoolYearModule();
        $this->studentModule = new StudentModule();
        $this->gradeModule = new GradeModule();
        $this->userModule = new UserModule();
        $this->attendanceModule = new AttendanceModule();
        $this->requestModule = new RequestModule();
        $this->pagePaginateModule = new PagePaginationModule();
        $this->subjectModule = new SubjectModule();
        $this->attendanceCalendarModule = new AttendanceCalendarModule();
    }

    public function checkAdminSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            redirect( "login" );
        } else if( $this->session->userdata( "user_type" ) == "teacher" ){
            redirect( "/" ); 
        } else if( $this->session->userdata( "user_type" ) == "student" ){
            redirect( "/" ); 
        }
    }
    public function index()
    {
        $input = $this->input->post();
        if( $input != null ){
            $input["time_deadline"] = date("G:i",strtotime($input["time_deadline"])); 
            $date_d = strtotime($input["date_deadline"]);
            $input["date_deadline"] = date('M d, Y',$date_d);
            $res = $this->schoolYearModule->updateDeadlineSubmitGrade( $input );
        }

        // $data["deadline_data"] = $this->schoolYearModule->getDeadlineForSubmitGrade()->result_array()[0];
        $data["schoolyears"] = $this->schoolYearModule->getSchoolYears();
        $this->template->adminTemplate( "dashboard", $data );
    }

    

    public function users( $per = NULL )
    {
        $search_usr_key = null;
        if( $this->input->post("usr_search_key") ){
            $search_usr_key = $this->input->post("usr_search_key");
        }

       $data = $this->pagePaginateModule->manageUsersPaginate( $search_usr_key );
       $this->template->adminTemplate( "users", $data );
    }

    

    public function profile()
    {   

        $res = array();
        $errors = array();

        if( $this->input->post())
        {

            $user_data = $this->input->post();
            
            if($user_data["password"] != null || $user_data["retype_password"] != null){

                if(strlen($user_data["password"]) < 10 || strlen($user_data["retype_password"]) < 10){
                    $errors["msg"] = "Password must contain 10 minimum character!";
                    $errors["code"] = 203;
                    $errors["status"] = "callout-danger"; 
                } else if ( $user_data["password"] != $user_data["retype_password"] ) {
                    $errors["msg"] = "Password does not match!";
                    $errors["code"] = 203;
                    $errors["status"] = "callout-danger"; 
                    
                }
            }


            if ($_FILES['profile_img']['size'] != 0 && $_FILES['profile_img']['error'] == 0){
                $file_name  =    $_FILES['profile_img']['name'];
                $file_size  =    $_FILES['profile_img']['size'];
                $file_tmp   =    $_FILES['profile_img']['tmp_name'];
                $file_type  =    $_FILES['profile_img']['type'];
                $file_ext   =   pathinfo($file_name, PATHINFO_EXTENSION);
                $extensions= array("jpeg","jpg","png");
                $path = FCPATH . 'assets/custom/images/profile_images/' . $file_name;
                if(in_array($file_ext,$extensions)=== false){
                    $errors["code"] = 204;
                    $errors["status"] = "callout-danger"; 
                    
                    $errors["msg"] = "Extension not allowed, please choose a JPEG or PNG file.";
                } else {
                    if($file_size > 2097152){
                        $errors["code"] = 204;
                        $errors["status"] = "callout-danger"; 
                        $errors["msg"] = 'File size must be excately 2 MB';
                    } else {
                        if( $this->session->userdata["profile_img"] != null ){
                            unlink( FCPATH.'assets/custom/images/profile_images/'.$this->session->userdata["profile_img"] );
                        }
                        if( file_exists( $path ) ){
                            
                            $current_file_name =  basename($path,".".$file_ext);
                            $file_name = $current_file_name."_".date("Ymdhis").".".$file_ext;
                            if( move_uploaded_file($file_tmp,FCPATH.'assets/custom/images/profile_images/'.$file_name)){
                                $success = true;
                                $user_data["profile_img"] = $file_name;
                            } else {
                                $errors["code"] = 204;
                                $errors["status"] = "callout-danger"; 
                                $errors["msg"] = 'Error occured';
                            }
                        } else {
                            if( move_uploaded_file($file_tmp,FCPATH.'assets/custom/images/profile_images/'.$file_name)){
                                $success = true;
                                $user_data["profile_img"] = $file_name;
                            } else {
                                $errors["code"] = 204;
                                $errors["status"] = "callout-danger"; 
                                $errors["msg"] = 'Error occured';
                            }
                        }
                    }
                }
            }

            if( $user_data["password"] == null && $user_data["retype_password"] == null ){
                unset( $user_data["password"] );
                unset( $user_data["retype_password"] );
            }

            if( $errors == null ){
                $user_data["user_id"] = $this->session->userdata("user_id");
                $result = $this->userModule->updateProfile( $user_data  );
                $this->setSessionUserData( $result["usr_data"] );
                $this->session->set_tempdata('status', $result["status"], 5);
                $this->session->set_tempdata('msg', $result["msg"], 5);
            } else {
                $this->session->set_tempdata('status', $errors["status"], 5);
                $this->session->set_tempdata('msg', $errors["msg"], 5);
            }
        }

       $this->template->adminTemplate( "profile" );
    }

    public function schoolyear()
    {
        $this->template->adminTemplate("schoolyear");
    }


    public function SY( $sy_id ){

        if($this->schoolYearModule->checkSYexist( $sy_id  ) == 0)
        { 
            $this->template->page404();
        } else {

            $SY_data = $this->schoolYearModule->checkSYexist( $sy_id  );
            $data["gradeseven"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-7") );
            $data["gradeeight"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-8") );
            $data["gradenine"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-9") );
            $data["gradeten"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-10") );
            $data["gradeeleven"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-11") );
            $data["gradetwelve"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-12") );
            $data["school_year_data"] = $SY_data[0];

            $this->template->adminTemplate("SY_data", $data);
        }
    }

    public function SY_Grade( $sy_id, $grade_level)
    {
        $grade_levels = array( "grade-7", "grade-8", "grade-9", "grade-10", "grade-11", "grade-12" );
        if( in_array( $grade_level, $grade_levels ) && $this->schoolYearModule->checkSYexist( $sy_id  ) != null ){

			$getAttendanceCalendarParams = array(
				"sy_id" => $sy_id,
				"grade_level" => $grade_level,
				"attendance_type" => 1
			);
			$data["attendance_calendar"] = $this->attendanceCalendarModule->get($getAttendanceCalendarParams);
            $SY_data = $this->schoolYearModule->checkSYexist( $sy_id  );
            $data["sy_data"] = $SY_data[0];
            $data["grade_level"] = $grade_level;
            $data["sy_id"] = $sy_id;
			$data["students_failed"] = $this->gradeModule->viewStudentGrades( $sy_id, $grade_level );
			$data["subjects"] = $this->subjectModule->getAllSubjectsGroupBySubjectName();

			if ($this->input->post()) {
				$inputData = $this->input->post();
				$inputData["sy_id"] = $sy_id;
				$inputData["grade_level"] = $grade_level;
				$inputData["attendance_type"] = 1;
				if(isset($data["attendance_calendar"]["atc_id"])){
					$inputData["atc_id"] = $data["attendance_calendar"]["atc_id"];
					$data["addMMC_response"] = $this->attendanceCalendarModule->update($inputData);
					// redirect(current_url());
				} else {
					$data["addMMC_response"] = $this->attendanceCalendarModule->add($inputData);
					// redirect(current_url());
				}
				$data["attendance_calendar"] = $this->attendanceCalendarModule->get($getAttendanceCalendarParams);
			}

            $this->template->adminTemplate("schoolyear_grade_level", $data);
        } else {
            $this->template->page404();
        }
    } 

    // View Student
    public function SY_ViewStudent( $sy_id, $grade_level, $student_id )
    {
        $checkIfStudentExistInSchoolYear = $this->schoolYearModule->checkIfStudentExistInSchoolYear(array( "sy_id"=>$sy_id, "student_id"=>$student_id ));
        if( $checkIfStudentExistInSchoolYear->result() != null){
            $SY_data = $this->schoolYearModule->checkSYexist( $sy_id  );
            $student_data = $checkIfStudentExistInSchoolYear->result_array()[0];

            // print("<pre>".print_r($checkIfStudentExistInSchoolYear->result_array(),true)."</pre>");
            $data["student_grades"] = $this->gradeModule->getStudentAllSubjectGrades( array( "student_id"=>$student_data["student_id"], "sy_id"=>$student_data["sy_id"], "grade_level"=>$student_data["grade_level"] )  );
            $data["students"] = $this->schoolYearModule->getStudentsSchoolYearFromAdminController( $sy_id, $grade_level );
            $data["sy_data"] = $SY_data[0];
            $data["grade_level"] = $grade_level;
            $data["sy_id"] = $sy_id;
			$data["student_data"] = $student_data;
			$data["principalData"] = $this->userModule->getSuperAdminUser()->result_array()[0];
            $this->template->adminTemplate("sy_view_student", $data);
        }else{
            $this->template->page404();
        }
    }

    public function viewStudentGrades( $sy_id, $grade_level ){
        $SY_data = $this->schoolYearModule->checkSYexist( $sy_id  );
        $grade_levels = array( "grade-7", "grade-8", "grade-9", "grade-10", "grade-11", "grade-12" );
        $sy_data = $this->schoolYearModule->checkSYexist( $sy_id  );
        
        if( $SY_data != null && in_array( $grade_level, $grade_levels ) ){
			$getAttendanceCalendarParams = array(
				"sy_id" => $sy_id,
				"grade_level" => $grade_level,
				"attendance_type" => 1
			);
			$data["attCal"] = $this->attendanceCalendarModule->get($getAttendanceCalendarParams);
			
			$data["students"] = $this->gradeModule->viewStudentGrades( $sy_id, $grade_level );
            $data["sy_data"] = $sy_data[0];
			$data["grade_level"] = $grade_level;
			$data["principalData"] = $this->userModule->getSuperAdminUser()->result_array()[0];
            $this->template->adminTemplate("viewStudentGrades", $data);
        }else{
            $this->template->page404();
        }

    }


    public function requestList( $per = NULL ){
     //$data["all_request"] = $this->requestModule->teacherGetAllRequest( array( "teacher_id"=>$this->session->userdata("user_id") ) );
        $data = $this->pagePaginateModule->requestPaginate();
        $this->template->adminTemplate( "request", $data);
        
    }


    public function history( $per = NULL ){
        $data = $this->pagePaginateModule->historyPaginate();
        $this->template->adminTemplate( "history", $data);
        
    }


    // STUDENT
    public function manageStudent( $per = NULL ){
        if( $this->uri->segment(2) != "manage-students" ){
            $this->template->page404();
        } else {

            $search_student_key = null;
            if( $this->input->post("grade_level") != null && $this->input->post("sy_id") != null ){
                $search_student_key = $this->input->post();
                $data = $this->pagePaginateModule->manageStudentsPaginate( $search_student_key );
            } else {
                $data = $this->pagePaginateModule->manageStudentsPaginate( $search_student_key );
            }
            $this->template->adminTemplate("manage_students", $data);
        }
    }


    public function viewRanking($sy_id, $period) {

        if($this->schoolYearModule->checkSYexist( $sy_id  ) != null && $period > 0 && $period <= 4) {
            $average_period = array(
                1 => "total_avg_first",
                2 => "total_avg_second",
                3 => "total_avg_third",
                4 => "total_avg_fourth",
            );

            $periodText = array(
                1 => "First Grading Period",
                2 => "Second Grading Period",
                3 => "Third Grading Period",
                4 => "Fourth Grading Period",
            );

            $grade7 = $this->gradeModule->viewStudentGrades( $sy_id, "grade-7" );
            $grade8 = $this->gradeModule->viewStudentGrades( $sy_id, "grade-8" );
            $grade9 = $this->gradeModule->viewStudentGrades( $sy_id, "grade-9" );
            $grade10 = $this->gradeModule->viewStudentGrades( $sy_id, "grade-10" );
            $grade11 = $this->gradeModule->viewStudentGrades( $sy_id, "grade-11" );
            $grade12 = $this->gradeModule->viewStudentGrades( $sy_id, "grade-12" );

            $data["grade7Students"] = ($grade7 != null) ? $this->sortByRank($grade7, $average_period[$period]) : null;
            $data["grade8Students"] = ($grade8 != null) ? $this->sortByRank($grade8, $average_period[$period]) : null;
            $data["grade9Students"] = ($grade9 != null) ? $this->sortByRank($grade9, $average_period[$period]) : null;
            $data["grade10Students"] = ($grade10 != null) ? $this->sortByRank($grade10, $average_period[$period]) : null;
            $data["grade11Students"] = ($grade11 != null) ? $this->sortByRank($grade11, $average_period[$period]) : null;
            $data["grade12Students"] = ($grade12 != null) ? $this->sortByRank($grade12, $average_period[$period]) : null;

            $SY_data = $this->schoolYearModule->checkSYexist( $sy_id  );
            $data["school_year_data"] = $SY_data[0];
            $data["average_period"] = $average_period[$period];
            $data["periodGrd"] = $period;
            $data["periodText"] = $periodText[$period];
            $this->template->adminTemplate("view_ranking", $data);

        } else {
            $this->template->page404();
        }
            
	}
	
	// VIEW TEACHERS
	public function viewTeachers ($sy_id) {

		if($this->schoolYearModule->checkSYexist($sy_id)){
			$teachers = $this->schoolYearModule->viewTeachers(array("sy_id" => $sy_id));
			$SY_data = $this->schoolYearModule->checkSYexist( $sy_id  );
            $data["gradeseven"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-7") );
            $data["gradeeight"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-8") );
            $data["gradenine"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-9") );
            $data["gradeten"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-10") );
            $data["gradeeleven"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-11") );
            $data["gradetwelve"] = $this->schoolYearModule->getSchoolYearSubjects( array( "sy_id"=> $sy_id, "grade_level"=> "grade-12") );
            $data["school_year_data"] = $SY_data[0];
			$data["teachers"] = $teachers;
            $this->template->adminTemplate("view_teachers", $data);

		} else {
            $this->template->page404();
		}
	}

    // SUMMARY OF GRADES
    public function gradeSummary($sy_id, $gradeLevel, $period) {
        $semester = 0;
        if($period <= 2 ){
            $semester = 1;
        } else if($period >= 3 ){
            $semester = 2;
        }


        $grade_levels = array( "grade-7", "grade-8", "grade-9", "grade-10", "grade-11", "grade-12" );
        if( in_array( $gradeLevel, $grade_levels ) && $this->schoolYearModule->checkSYexist( $sy_id  ) != null && $period > 0 && $period <= 4 ){
            $period_arr = array(
                1 => "quarter_first",
                2 => "quarter_second",
                3 => "quarter_third",
                4 => "quarter_fourth",
            );

            $average_period = array(
                1 => "total_avg_first",
                2 => "total_avg_second",
                3 => "total_avg_third",
                4 => "total_avg_fourth",
            );

            $periodText = array(
                1 => "First Grading Period",
                2 => "Second Grading Period",
                3 => "Third Grading Period",
                4 => "Fourth Grading Period",
            );

            $check_arr = array(
                "sy_id" => $sy_id,
                "grade_level" => $gradeLevel
            );

            $getStudents = $this->gradeModule->viewStudentGrades( $sy_id, $gradeLevel );
			$maleStudents = array();
			$femaleStudents = array();
            if (isset($getStudents) && $getStudents){
				$sortByRank = $this->sortByRank($getStudents, $average_period[$period]); //GET STUDENTS SORT BY RANK
				$studentsByGender = $this->isolateByGender($sortByRank);
                $maleStudents = $this->sortByName($studentsByGender['maleStudents']); //MALE STUDENTS SORT BY NAME
                $femaleStudents = $this->sortByName($studentsByGender['femaleStudents']); //FEMALE STUDENTS SORT BY NAME
			}
            
			$data['maleStudents'] = $maleStudents;
			$data['femaleStudents'] = $femaleStudents;
            $SY_data = $this->schoolYearModule->checkSYexist( $sy_id  );
            $data["period"] = $period_arr[$period];
            $data["periodBehaviorAndLeadership"] = $period - 1;
            $data["average_period"] = $average_period[$period];
            $data["sy_data"] = $SY_data[0];
            $data["grade_level"] = $gradeLevel;
            $data["sy_id"] = $sy_id;
            $data["semester"] = $semester;
            $data["periodText"] = $periodText[$period];
            $data["periodGrd"] = $period;
            $data["students_failed"] = $this->gradeModule->viewStudentGrades( $sy_id, $gradeLevel );
            $data["subjects"] = $this->subjectModule->getAllSubjectsGroupBySubjectName();
            $this->template->adminTemplate("summary_of_grades", $data);
        } else {
            $this->template->page404();
        }
    }



    // SORT BY RANK
    public function sortByRank($getStudents, $average_period) {


        foreach ($getStudents as $key => $row)
        {
            $rankStd[$key]  = $row['grades'][$average_period];
        }   
        // print("<pre>".print_r($getStudents,true)."</pre>");
        array_multisort($rankStd, SORT_DESC, $getStudents);
        $finalStudents = array();
        $counter = 0;
        $rank = 1;
        foreach ($getStudents as $inv) {

            if (count($finalStudents) > 0) {
                if ($finalStudents[$counter - 1]["grades"][$average_period] == $inv["grades"][$average_period]) {
                    $rank  = $rank + 0;
                    $inv["rank"] = $rank;
                } else {
                    $rank  = $rank + 1;
					$inv["rank"] = $rank;
                }
            } else {
                $inv["rank"] = $rank;
                // $rank  = $rank + 1;
            }
            array_push($finalStudents, $inv);
            $counter  = $counter + 1;
		}
        return $finalStudents;
    }

    //SORT BY NAME
    public function sortByName($sortByRankStudents) {

        foreach ($sortByRankStudents as $key => $row)
        {
            $sortName[$key]  = $row['last_name'];
        }   
        array_multisort($sortName, SORT_ASC, $sortByRankStudents);
        return $sortByRankStudents;
	}
	
	public function isolateByGender($students) {
		
		$male = array();
		$female = array();

		foreach ($students as $std ) {
			if ($std["gender"] == "Male") {
				array_push($male, $std);
			} else if ($std["gender"] == "Female"){
				array_push($female, $std);
			}
		}

		$result = array("maleStudents" => $male, "femaleStudents" => $female);
		return $result;

	}
    
}



