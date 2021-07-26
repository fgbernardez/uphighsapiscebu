<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/SchoolYearModule.php";
require_once APPPATH . "modules/SubjectModule.php";
require_once APPPATH . "modules/GradeModule.php";
require_once APPPATH . "modules/RequestModule.php";
require_once APPPATH . "modules/PagePaginationModule.php";



class TeacherController extends MainController{
    
    public function __construct()
    {
        parent::__construct();
        $this->checkTeacherSession();
        $this->schoolYearModule = new SchoolYearModule();
        $this->subjectModule = new SubjectModule();
        $this->gradeModule = new GradeModule();
        $this->requestModule = new RequestModule();
		$this->pagePaginateModule = new PagePaginationModule();
		$this->deadlineForSubmitGrade = $this->dateDeadlineSubmitGrade();
	}
	
	public function dateDeadlineSubmitGrade () {
		$deadlineForSubmitGrade = $this->schoolYearModule->getDeadlineForSubmitGrade()->result_array()[0];
		if (isset($deadlineForSubmitGrade) && $deadlineForSubmitGrade) {
			$deadlineDate = new DateTime($deadlineForSubmitGrade['date_deadline'].' '.$deadlineForSubmitGrade['time_deadline']);
			$currentDateTime = new DateTime();
			if ($deadlineDate > $currentDateTime) {
				return $deadlineForSubmitGrade;
			} else {
				return false;
			}
		} 
		return false;
	}
    
    public function checkTeacherSession()
    {
        if( !$this->session->userdata( "user_type" ) ){
            redirect( "login" );
        } else if( $this->session->userdata( "user_type" ) != "teacher" ){
            redirect( "admin" ); 
        }
    }

    public function index()
    {
       $this->template->teacherTemplate( "dashboard" );
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
    	$data["schoolyears"] = $this->schoolYearModule->getSchoolYears();
    	$this->template->teacherTemplate( "schoolyear", $data );
    }

    public function assignedSubjects ($sy_id)
    {
        if($this->schoolYearModule->checkSYexist($sy_id) == null)
        { 
            $this->template->page404();
        } else {
			$data["deadlineForSubmitGrade"] = $this->deadlineForSubmitGrade;
            $data["school_year"] = $this->schoolYearModule->checkSYexist( $sy_id)[0];
            $chck_arr = array( "sy_id"=> $sy_id, "assigned_teacher"=> $this->session->userdata("user_id") );
            $data["assignedSubjects"] = $this->subjectModule->getTeacherSubjectsAssign( $chck_arr );
            $this->template->teacherTemplate( "assignedSubjects", $data);
        }
        
    }

    public function subjectAssigned($sy_id, $subject_id)
    {
        $chckSbjExist = $this->subjectModule->checkSubjectExist( array("subject_id"=>$subject_id, "assigned_teacher"=>$this->session->userdata("user_id")));

        if($chckSbjExist->num_rows() == 0)
        { 
            $this->template->page404();
        } else {
            $chck_data = $chckSbjExist->result_array()[0];
            $data = $chck_data;
            $data["students"] = $this->gradeModule->getTeacherSubjectStudents( array( "sy_id"=> $chck_data["sy_id"], "grade_level"=>$chck_data["grade_level"]), $chck_data["subject_id"] );
            $chck_arr = array( "sy_id"=> $sy_id, "assigned_teacher"=> $this->session->userdata("user_id") );
            $data["assignedSubjects"] = $this->subjectModule->getTeacherSubjectsAssign( $chck_arr );
			$data["school_year"] = $this->schoolYearModule->checkSYexist( $sy_id)[0];
			$data["deadlineForSubmitGrade"] = $this->deadlineForSubmitGrade;
            $this->template->teacherTemplate( "subject", $data);
        }
    }


    public function manageStudent( $sy_id, $subject_id, $student_id ){

        $chckSbjExist = $this->subjectModule->checkSubjectExist( array("subject_id"=>$subject_id, "assigned_teacher"=>$this->session->userdata("user_id")));
        
        $checkIfStudentExistInSchoolYear = $this->schoolYearModule->checkIfStudentExistInSchoolYear(array( "sy_id"=>$sy_id, "student_id"=>$student_id ));

        if($chckSbjExist->num_rows() == 0 || $checkIfStudentExistInSchoolYear->result() == null)
        { 
            $this->template->page404();
        } else {

            $chck_data = $chckSbjExist->result_array()[0];
            $data["students"] = $this->schoolYearModule->getTeacherSubjectStudents( array( "sy_id"=> $chck_data["sy_id"], "grade_level"=>$chck_data["grade_level"]) );
            $chck_arr = array( "sy_id"=> $sy_id, "assigned_teacher"=> $this->session->userdata("user_id") );
            $data["assignedSubjects"] = $this->subjectModule->getTeacherSubjectsAssign( $chck_arr );
            $data["school_year"] = $this->schoolYearModule->checkSYexist( $sy_id)[0];
            $data["subject_id"] = $subject_id;
            $data["sy_id"] = $sy_id;
            $data["student_id"] = $student_id;
            $data["student_data"] = $checkIfStudentExistInSchoolYear->result_array()[0];
            $data["subject"] = $chckSbjExist->result_array()[0];
			$data["deadlineForSubmitGrade"] = $this->deadlineForSubmitGrade;
            $deadlines = $this->schoolYearModule->getDeadlineForSubmitGrade()->result_array();

            if( $deadlines == null ){

                $n = array(
                    "sy_id"=>0,
                    "date_deadline"=>"",
                    "time_deadline"=>"",
                    "grading"=>0,
                );

                $data["deadline"] = $n;
            } else {

                $data["deadline"] = $deadlines[0];
            }

            // var_dump($data["deadline"]["grading"]);

            $gt_re = array( "sy_id"=>$sy_id, "subject_id"=> $subject_id, "student_id"=> $student_id );
            $data["request_edit"] = $this->requestModule->getRequest( $gt_re )->result_array();

            // var_dump( $data["request_edit"] );
            // print("<pre>".print_r($data["assignedSubjects"]->result_array(),true)."</pre>");


            if( $this->input->post() ){
                $input = $this->input->post();
                // $input["grading"] = implode( ",", $input["grading"] );
                $input["sy_id"] = $sy_id;
                $input["subject_id"] = $subject_id;
                $input["student_id"] = $data["student_data"]["student_id"];
                $input["teacher_id"] = $this->session->userdata("user_id"); 
                $input["req_status"] = "Pending"; 
                $result = $this->requestModule->addRequest( $input );
                $this->session->set_tempdata('status', $result["status"], 5);
                $this->session->set_tempdata('msg', $result["msg"], 5);
            }
            $this->template->teacherTemplate( "manage_student", $data);
        }

    }




    public function requestList( $per = NULL ){
        // $data["all_request"] = $this->requestModule->teacherGetAllRequest( array( "teacher_id"=>$this->session->userdata("user_id") ) );

        $data = $this->pagePaginateModule->requestTeacherPaginate();
        $this->template->teacherTemplate( "request", $data);
        
    }


}



