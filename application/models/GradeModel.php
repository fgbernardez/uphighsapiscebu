<?php

// 200 - Success
// 201 - created
// 203 - warning / exist
// 204 - error

class GradeModel extends CI_Model{

    private $response;

    public function checkExistGrade( $data ){
        $exist = $this->db->where( $data )->get( "grades" );
        return $exist;
    }

    public function checkExistBehavior( $data ){
        $exist = $this->db->where( $data )->get( "behavior" );
        return $exist;
    }

    public function addToHistory( $data ){
        // $check = array( "sy_id"=> $data["sy_id"], "subject_id"=>$data["subject_id"], "student_id"=>$data["student_id"] );
        // print("<pre>".print_r($data,true)."</pre>");
        $school_year    = $this->db->where( "sy_id", $data["sy_id"] )->get( "schoolyear" )->result_array()[0];
        $subject        = $this->db->where( "subject_id", $data["subject_id"] )->get( "subjects" )->result_array()[0];
        $student        = $this->db->where( "student_id", $data["student_id"] )->get( "students" )->result_array()[0];
        $user_update_g  = "". $this->session->userdata( "first_name" ) ." " . $this->session->userdata( "last_name" );
        $grade_udpate   = "";

        switch( $data["grading"] ) {
            case "quarter_first":
                $grade_udpate   = "first grading";
                break;

            case "quarter_second":
                $grade_udpate   = "second grading";
                break;
                
            case "quarter_third":
                $grade_udpate   = "third grading";
                break;
                
            case "quarter_fourth":
                $grade_udpate   = "fourth grading";
                break;
            
            case 1:
                $grade_udpate   = "first grading";
                break;

            case 2:
                $grade_udpate   = "second grading";
                break;
                
            case 3:
                $grade_udpate   = "third grading";
                break;
                
            case 4:
                $grade_udpate   = "fourth grading";
                break;

            default:
                $grade_udpate   = "";
        }

        $history["description"] = "<b>" . $user_update_g . "</b> " . $data["action"] ." <span class='text-green'>". $student["first_name"] .' '.$student["last_name"]. "</span> ". $subject["subject_name"] . " " . $grade_udpate . " " . $data["do_action"] ." in " . $school_year["start_year"] . "-" . $school_year["end_year"] . " school year."; 
        $this->db->insert( "history", $history );
    }  
    
    public function getStudentSingleGrade( $data )
    {

        if( $this->checkExistGrade( $data )->num_rows() != 0 ){
            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["data"] = $this->checkExistGrade( $data )->result_array()[0];
            $this->response["status"] = "callout-danger";
        } else {
            $grade["quarter_first"] = 0;
            $grade["quarter_second"] = 0;
            $grade["quarter_third"] = 0;
            $grade["quarter_fourth"] = 0;
            $this->response["code"] = "203";
            $this->response["msg"] = "NO grade found!";
            $this->response["data"] = $grade;
            $this->response["status"] = "callout-danger";
        }
        return $this->response;
    }


    public function getStudentSingleBehavior( $data )
    {

        $get_subject = $this->db->where( array( "subject_id"=> $data["subject_id"], "sy_id"=>$data["sy_id"] ) )->get("subjects")->result_array()[0];
        $behaviors = array();
        if( $get_subject["semester"] == 1 ){
            $grading = 1;
            for( $i = $grading; $i <= 2; $i++ ){
                $chck = array( "subject_id"=> $data["subject_id"], "sy_id"=>$data["sy_id"], "student_id"=>$data["student_id"], "grading"=>$i );
                    $behavior=array();
                    if( $this->checkExistBehavior( $chck )->num_rows() != 0 ){
                        $behavior= $this->checkExistBehavior( $chck )->result_array()[0];
                    } else {
                        $behavior["subject_id"] = $data["subject_id"];
                        $behavior["sy_id"] = $data["sy_id"];
                        $behavior["student_id"] = $data["student_id"];
                        $behavior["grading"] = $i;
                        $behavior["manners"] = 0;
                        $behavior["appearance"] = 0;
                        $behavior["dependability"] = 0;
                        $behavior["cooperation"] = 0;
                        $behavior["attendance"] = 0;
                        $behavior["initiative_and_resourcefulness"] = 0;
                        $behavior["leadership"] = 0;
                    }
                    array_push( $behaviors, $behavior );
            }

        } elseif( $get_subject["semester"] == 2 ){
            $grading = 3;
            for( $i = $grading; $i <= 4; $i++ ){
                $chck = array( "subject_id"=> $data["subject_id"], "sy_id"=>$data["sy_id"], "student_id"=>$data["student_id"], "grading"=>$i );
                $behavior=array();
                if( $this->checkExistBehavior( $chck )->num_rows() != 0 ){
                    $behavior= $this->checkExistBehavior( $chck )->result_array()[0];
                } else {
                    $behavior["subject_id"] = $data["subject_id"];
                    $behavior["sy_id"] = $data["sy_id"];
                    $behavior["student_id"] = $data["student_id"];
                    $behavior["grading"] = $i;
                    $behavior["manners"] = 0;
                    $behavior["appearance"] = 0;
                    $behavior["dependability"] = 0;
                    $behavior["cooperation"] = 0;
                    $behavior["attendance"] = 0;
                    $behavior["initiative_and_resourcefulness"] = 0;
                    $behavior["leadership"] = 0;
                }
                array_push( $behaviors, $behavior );
            }

        } else {
            $grading = 1;
            for( $i = $grading; $i <= 4; $i++ ){
                $chck = array( "subject_id"=> $data["subject_id"], "sy_id"=>$data["sy_id"], "student_id"=>$data["student_id"], "grading"=>$i );
                $behavior=array();
                if( $this->checkExistBehavior( $chck )->num_rows() != 0 ){
                    $behavior= $this->checkExistBehavior( $chck )->result_array()[0];
                } else {
                    $behavior["subject_id"] = $data["subject_id"];
                    $behavior["sy_id"] = $data["sy_id"];
                    $behavior["student_id"] = $data["student_id"];
                    $behavior["grading"] = $i;
                    $behavior["manners"] = 0;
                    $behavior["appearance"] = 0;
                    $behavior["dependability"] = 0;
                    $behavior["cooperation"] = 0;
                    $behavior["attendance"] = 0;
                    $behavior["initiative_and_resourcefulness"] = 0;
                    $behavior["leadership"] = 0;
                }
                array_push( $behaviors, $behavior );
            }
        }
        // print("<pre>".print_r($behaviors,true)."</pre>");
        // var_dump( $get_subject->result_array() );
        // if( $this->checkExistBehavior( $data )->num_rows() != 0 ){
        //     $this->response["code"] = "200";
        //     $this->response["msg"] = "OK";
        //     $this->response["data"] = $this->checkExistBehavior( $data )->result_array()[0];
        //     $this->response["status"] = "callout-danger";
        // } else {
        //     $behavior["manners"] = 0;
        //     $behavior["appearance"] = 0;
        //     $behavior["dependability"] = 0;
        //     $behavior["cooperation"] = 0;
        //     $behavior["attendance"] = 0;
        //     $behavior["initiative_and_resourcefulness"] = 0;
        //     $behavior["leadership"] = 0;
        //     $this->response["code"] = "203";
        //     $this->response["msg"] = "NO grade found!";
        //     $this->response["data"] = $behavior;
        //     $this->response["status"] = "callout-danger";
        // }
        return $behaviors;
    }

    public function getStudentSingleGradingBehavior( $data ){

        if( $this->checkExistBehavior( $data )->num_rows() != 0 ){
            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["data"] = $this->checkExistBehavior( $data )->result_array()[0];
            $this->response["status"] = "callout-danger";
        } else {
            $behavior["grading"] = $data["grading"];
            $behavior["manners"] = 0;
            $behavior["appearance"] = 0;
            $behavior["dependability"] = 0;
            $behavior["cooperation"] = 0;
            $behavior["attendance"] = 0;
            $behavior["initiative_and_resourcefulness"] = 0;
            $behavior["leadership"] = 0;
            $this->response["code"] = "203";
            $this->response["msg"] = "NO grade found!";
            $this->response["data"] = $behavior;
            $this->response["status"] = "callout-danger";
        }

        return $this->response;
    }


    public function getStudentBehavior( $data ){

        $behavior_grade = array();
        
        for( $data["grading"] = 1; $data["grading"]<=4; $data["grading"] ++ ){
            $rows = $this->db->where( $data )->get("behavior")->num_rows();

            if( $rows == 0 ){

                $grade["manners"] = 0.00;
                $grade["appearance"] = 0.00;
                $grade["dependability"] = 0.00;
                $grade["cooperation"] = 0.00;
                $grade["attendance"] = 0.00;
                $grade["initiative_and_resourcefulness"] = 0.00;
                $grade["leadership"] = 0.00;
                $grade["average1"] = 0.00; 
                $grade["average2"] = 0.00; 
                $grade["grading"] = $data["grading"];
            } else {

                $behavior_first_grading = $this->db->select_sum("manners")->select_sum("appearance")->select_sum("dependability")->select_sum("cooperation")->select_sum("attendance")->select_sum("initiative_and_resourcefulness")->select_sum("leadership")->from("behavior")->where( $data )->get()->result_array();
                $grade = array();
                foreach( $behavior_first_grading[0] as $key=>$value ){
                    // $grade[$key] = round($value / $rows, 2);
                    $total_g = round($value / $rows, 2);
                    $grade[$key] = number_format((float)$total_g, 2, '.', '');
                }
                $grade["average1"] = number_format((float)round(( $grade["manners"] + $grade["appearance"] + $grade["dependability"] + $grade["cooperation"] + $grade["attendance"]) / 5, 2), 2, '.', '');
                $grade["average2"] = number_format((float)round(( $grade["initiative_and_resourcefulness"] + $grade["leadership"]) / 2, 2), 2, '.', '');
                $grade["grading"] = $data["grading"];
                // print("<pre>".print_r($grade,true)."</pre>");
                // $grading["grading".$data["grading"]] = "";
                // array_push( $behavior_grade, "grading".$data["grading"]."" => $grade );
            }
            array_push( $behavior_grade, $grade );
            
        }
        // print("<pre>".print_r($behavior_grade,true)."</pre>");
     
        return $behavior_grade;
    }

    
    
    


    public function updateGrade( $data ){



        $check = array( "sy_id"=> $data["sy_id"], "subject_id"=>$data["subject_id"], "student_id"=>$data["student_id"] );

        if( isset( $data["quarter_first"] ) ){
            $data["quarter_first"] = round($data["quarter_first"]);
        } else if( isset( $data["quarter_second"] ) ){
            $data["quarter_second"] = round($data["quarter_second"]);
        } else if( isset( $data["quarter_third"] ) ){
            $data["quarter_third"] = round($data["quarter_third"]);
        } else if( isset( $data["quarter_fourth"] ) ){
            $data["quarter_fourth"] = round($data["quarter_fourth"]);
        }

        if( $this->checkExistGrade( $check )->num_rows() != 0 ){
            $this->db->where( $check );
            $this->db->update( "grades", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully updated grade!";
            $this->response["status"] = "callout-success";


            //ADD TO HISTORY
            $a = array_keys( $data );
            $check["grading"] = $a[3]; 
            $check["action"] = "updated";
            $check["do_action"] = "grade";
            $this->addToHistory( $check );
            
        } else {
            // $this->db->where( $check );
            $this->db->insert( "grades", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully updated grade!";
            $this->response["status"] = "callout-success";

            //ADD TO HISTORY
            $a = array_keys( $data );
            $check["grading"] = $a[3]; 
            $check["action"] = "added";
            $check["do_action"] = "grade";
            $this->addToHistory( $check );
        }
        return $this->response;
    }

    public function updateBehavior( $data ){


        $check = array( "sy_id"=> $data["sy_id"], "subject_id"=>$data["subject_id"], "student_id"=>$data["student_id"], "grading"=>$data["grading"] );
        if( $this->checkExistBehavior( $check )->num_rows() != 0 ){
            $this->db->where( $check );
            $this->db->update( "behavior", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully updated behavior!";
            $this->response["status"] = "callout-success";

            //ADD TO HISTORY
            $check["grading"] = $data["grading"]; 
            $check["action"] = "updated";
            $check["do_action"] = "behavior";
            $this->addToHistory( $check );

        } else {
            // $this->db->where( $check );
            $this->db->insert( "behavior", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully updated behavior!";
            $this->response["status"] = "callout-success";

            //ADD TO HISTORY
            $check["grading"] = $data["grading"]; 
            $check["action"] = "added";
            $check["do_action"] = "behavior";
            $this->addToHistory( $check );
        }
        return $this->response;
    }


    public function getTeacherSubjectStudents( $data, $subject_id ){
        $students = array();
        $where_clause = array( "schoolyear_students.sy_id"=>$data["sy_id"],"schoolyear_students.grade_level"=>$data["grade_level"]  );
        $this->db->select("*");
        $this->db->from( "schoolyear_students" );
        $this->db->where( $where_clause );
        $stds = $this->db->join( "students", "students.student_id = schoolyear_students.student_id" )->get()->result_array();

        foreach( $stds as $std ){
            // echo $std["name"];
            $student = $std;

            if( $this->checkExistGrade( array( "subject_id"=> $subject_id, "student_id"=>$std["student_id"], "sy_id"=>$data["sy_id"] ) )->num_rows() != 0 ){
                $grade = $this->checkExistGrade( array( "subject_id"=> $subject_id, "student_id"=>$std["student_id"],"sy_id"=>$data["sy_id"] ) )->result_array()[0];
                $student["quarter_first"] = $grade["quarter_first"];
                $student["quarter_second"] = $grade["quarter_second"];
                $student["quarter_third"] = $grade["quarter_third"];
                $student["quarter_fourth"] = $grade["quarter_fourth"];
            } else {
                $student["quarter_first"] = 0;
                $student["quarter_second"] = 0;
                $student["quarter_third"] = 0;
                $student["quarter_fourth"] = 0;
            }

            array_push( $students, $student );
        }
        // print("<pre>".print_r($students,true)."</pre>");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
        // $this->db->join( "grades", "grades.student_id = students.student_id AND grades.subject_id = " )
        return $students;
    }


    public function getStudentAllSubjectGrades( $data ){                                                                                                                                                                

        $subject_grade = array();
        $subjects = $this->db->where( array( "sy_id"=>$data["sy_id"], "grade_level"=>$data["grade_level"] ) )->order_by('subject_id', 'ASC')->get("subjects")->result_array();
        $first_grading_avg = 0;
        $second_grading_avg = 0;
        $third_grading_avg = 0;
        $fourth_grading_avg = 0;
        $num_to_div = 1;
        $credit_unit1 = 0;
        $credit_unit2 = 0;
        $credit_unit3 = 0;
        $credit_unit4 = 0;
		$total_general_avg = 0;
		
		$subjectFailedgrades = array();
		$display_fail = 0;
		$subjectFailedgrades["quarter_first"] = array("failed_grades" => array(), "subjectsNoGrade" => array());
		$subjectFailedgrades["quarter_second"] = array("failed_grades" => array(), "subjectsNoGrade" => array());
		$subjectFailedgrades["quarter_third"] = array("failed_grades" => array(), "subjectsNoGrade" => array());
		$subjectFailedgrades["quarter_fourth"] = array("failed_grades" => array(), "subjectsNoGrade" => array());
        foreach( $subjects as $sbj ){

			$grade = null;
            if( $this->checkExistGrade( array( "subject_id"=> $sbj["subject_id"], "student_id"=>$data["student_id"], "sy_id"=>$data["sy_id"] ) )->num_rows() != 0 ){
                $grade = $this->checkExistGrade( array( "subject_id"=> $sbj["subject_id"], "student_id"=>$data["student_id"],"sy_id"=>$data["sy_id"] ) )->result_array()[0];
                $sbj["quarter_first"]   = $grade["quarter_first"];
                $sbj["quarter_second"]  = $grade["quarter_second"];
                $sbj["quarter_third"]   = $grade["quarter_third"];
				$sbj["quarter_fourth"]  = $grade["quarter_fourth"];
				
				// if($grade["quarter_first"] < 75) {
				// 	array_push($subjectFailedgrades["quarter_first"]["failed_grades"], array(
				// 		"quarter_grade" =>  $grade["quarter_first"],
				// 		"subject_name" => $sbj["subject_name"]
				// 	));
				// }
				// if($grade["quarter_second"] < 75) {
				// 	array_push($subjectFailedgrades["quarter_second"]["failed_grades"], array(
				// 		"quarter_grade" =>  $grade["quarter_second"],
				// 		"subject_name" => $sbj["subject_name"]
				// 	));
				// }
				// if($grade["quarter_third"] < 75) {
				// 	array_push($subjectFailedgrades["quarter_third"]["failed_grades"], array(
				// 		"quarter_grade" =>  $grade["quarter_third"],
				// 		"subject_name" => $sbj["subject_name"]
				// 	));
				// }
				// if($grade["quarter_fourth"] < 75) {
				// 	array_push($subjectFailedgrades["quarter_fourth"]["failed_grades"], array(
				// 		"quarter_grade" =>  $grade["quarter_fourth"],
				// 		"subject_name" => $sbj["subject_name"]
				// 	));
				// }

            } else {
                $sbj["quarter_first"]   = 0;
                $sbj["quarter_second"]  = 0;
                $sbj["quarter_third"]   = 0;
				$sbj["quarter_fourth"]  = 0;
            }

            if( $sbj["semester"] == 1 ){
                $credit_unit1 += $sbj["credit_unit"];
                $credit_unit2 += $sbj["credit_unit"];
                $first_grading_avg += $sbj["quarter_first"] * $sbj["credit_unit"];
				$second_grading_avg += $sbj["quarter_second"] * $sbj["credit_unit"];

				if($grade == null) {
					array_push($subjectFailedgrades["quarter_first"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
					array_push($subjectFailedgrades["quarter_second"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
				} else {
                    if($grade["quarter_first"] < 75) {
                        array_push($subjectFailedgrades["quarter_first"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_first"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                    if($grade["quarter_second"] < 75) {
                        array_push($subjectFailedgrades["quarter_second"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_second"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                }

            } else if( $sbj["semester"] == 2 ){
                $credit_unit3 += $sbj["credit_unit"];
                $credit_unit4 += $sbj["credit_unit"];
                $third_grading_avg += $sbj["quarter_third"] * $sbj["credit_unit"];
				$fourth_grading_avg += $sbj["quarter_fourth"] * $sbj["credit_unit"];
				
				if($grade == null) {
					array_push($subjectFailedgrades["quarter_third"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
					array_push($subjectFailedgrades["quarter_fourth"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
				}else{
                    if($grade["quarter_third"] < 75) {
                        array_push($subjectFailedgrades["quarter_third"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_third"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                    if($grade["quarter_fourth"] < 75) {
                        array_push($subjectFailedgrades["quarter_fourth"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_fourth"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                }
            } else {
                $credit_unit1 += $sbj["credit_unit"];
                $credit_unit2 += $sbj["credit_unit"];
                $credit_unit3 += $sbj["credit_unit"];
                $credit_unit4 += $sbj["credit_unit"];
                $first_grading_avg += $sbj["quarter_first"] * $sbj["credit_unit"];
                $second_grading_avg += $sbj["quarter_second"] * $sbj["credit_unit"];
                $third_grading_avg += $sbj["quarter_third"] * $sbj["credit_unit"];
				$fourth_grading_avg += $sbj["quarter_fourth"] * $sbj["credit_unit"];
				
				if($grade == null) {
					array_push($subjectFailedgrades["quarter_first"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
					array_push($subjectFailedgrades["quarter_second"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
					array_push($subjectFailedgrades["quarter_third"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
					array_push($subjectFailedgrades["quarter_fourth"]["subjectsNoGrade"], array("subject_name" => $sbj["subject_name"]));
				} else {
                    if($grade["quarter_first"] < 75) {
                        array_push($subjectFailedgrades["quarter_first"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_first"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                    if($grade["quarter_second"] < 75) {
                        array_push($subjectFailedgrades["quarter_second"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_second"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                    if($grade["quarter_third"] < 75) {
                        array_push($subjectFailedgrades["quarter_third"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_third"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                    if($grade["quarter_fourth"] < 75) {
                        array_push($subjectFailedgrades["quarter_fourth"]["failed_grades"], array(
                            "quarter_grade" =>  $grade["quarter_fourth"],
                            "subject_name" => $sbj["subject_name"]
                        ));
                    }
                }
            }

            // $credit_unit += $sbj["credit_unit"];
            // $first_grading_avg += $sbj["quarter_first"] * $sbj["credit_unit"];
            // $second_grading_avg += $sbj["quarter_second"] * $sbj["credit_unit"];
            // $third_grading_avg += $sbj["quarter_third"] * $sbj["credit_unit"];
            // $fourth_grading_avg += $sbj["quarter_fourth"] * $sbj["credit_unit"];
            array_push( $subject_grade, $sbj );
        }

        $total_avg_first = 0;
        $total_avg_second = 0;
        $total_avg_third = 0;
        $total_avg_fourth = 0;
        
        if( $credit_unit1 > 0 ){
            $total_avg_first = $first_grading_avg / $credit_unit1;
        }
        if( $credit_unit2 > 0 ){
            $total_avg_second = $second_grading_avg / $credit_unit2;
        }
        if( $credit_unit3 > 0 ){
            $total_avg_third = $third_grading_avg / $credit_unit3;
        }
        if( $credit_unit4 > 0 ){
            $total_avg_fourth = $fourth_grading_avg / $credit_unit4;
        }

        $grade_level_num = explode("-", $data["grade_level"]);
        if( $grade_level_num[1] <= 10  ){
            $total_general_avg = $total_avg_fourth / 10.3;
        } else if( $grade_level_num[1] == 11  ){
            $total_general_avg = $total_avg_fourth / 11.3;
        } else if( $grade_level_num[1] == 12  ){
            $total_general_avg = $total_avg_fourth / 10;
        }

        if( $total_avg_first != 0 ){
            $num_to_div += 1;
        }
        if( $total_avg_second != 0 ){
            $num_to_div += 1;
        }
        if( $total_avg_third != 0 ){
            $num_to_div += 1;
        }
        if( $total_avg_fourth != 0 ){
            $num_to_div += 1;
        }
        
        // echo "Number to div -> " . $num_to_div . "<br>";
        // echo "First -> " . $credit_unit1 . "<br>";
        // echo "Second -> " . $credit_unit2 . "<br>";
        // echo "Third -> " . $credit_unit3 . "<br>";
        // echo "Fourth -> " . $credit_unit4 . "<br>";

        // print("<pre>".print_r($total_avg_first,true)."</pre>");
        // print("<pre>".print_r($credit_unit,true)."</pre>");
        // print("<pre>".print_r($first_grading_avg,true)."</pre>");
        // print("<pre>".print_r($subject_grade,true)."</pre>");

		$all_total_avg = $total_avg_first + $total_avg_second + $total_avg_third + $total_avg_fourth;
		// if($total_avg_first != 0){
		// 	if($subjectFailedgrades["quarter_first"]["failed_grades"] != null || $subjectFailedgrades["quarter_first"]["subjectsNoGrade"] != null){
		// 		print("<pre>".print_r($subjectFailedgrades["quarter_first"]["failed_grades"],true)."</pre>");
		// 	}else {
		// 		echo 1;
		// 	}
		// }
		
		
		if($total_avg_first != 0 && ($subjectFailedgrades["quarter_first"]["failed_grades"] != null || $subjectFailedgrades["quarter_first"]["subjectsNoGrade"] != null) ){
			$display_fail += 1;
		}
		if($total_avg_second != 0 && ($subjectFailedgrades["quarter_second"]["failed_grades"] != null || $subjectFailedgrades["quarter_second"]["subjectsNoGrade"] != null) ){
			$display_fail += 1;
		}
		if($total_avg_third != 0 && ($subjectFailedgrades["quarter_third"]["failed_grades"] != null || $subjectFailedgrades["quarter_third"]["subjectsNoGrade"] != null) ){
			$display_fail += 1;
		}
		if($total_avg_fourth != 0 && ($subjectFailedgrades["quarter_fourth"]["failed_grades"] != null || $subjectFailedgrades["quarter_fourth"]["subjectsNoGrade"] != null) ){
			$display_fail += 1;
		}


        $data['subject_grade']  = $subject_grade;
		$data['total_avg_first']  = ($total_avg_first > 0) ? number_format((float)$total_avg_first, 3, '.', '') : 0;
        $data['total_avg_second']  = ($total_avg_second > 0) ? number_format((float)$total_avg_second, 3, '.', '') : 0;
        $data['total_avg_third']  = ($total_avg_third > 0) ? number_format((float)$total_avg_third, 3, '.', '') : 0;
        $data['total_avg_fourth']  = ($total_avg_fourth > 0) ? number_format((float)$total_avg_fourth, 3, '.', '') : 0;
        $data['total_general_avg']  = ($total_general_avg > 0) ? number_format((float)$total_general_avg, 3, '.', '') : 0;
		$data["subject_failed_grades"] = $subjectFailedgrades;
		$data["display_fail"] = $display_fail;
		// print("<pre>".print_r($data,true)."</pre>");
        return $data;
    }    

    public function viewStudentGrades( $sy_id, $grade_level ){
		$this->load->model('AttendanceModel');

        $students_grades_and_behavior = array();

        $chck_data = array( "sy_id"=> $sy_id, "grade_level"=> $grade_level );
        $students = $this->db->select("*, TIMESTAMPDIFF(YEAR, students.birthdate ,NOW()) AS age")->where( $chck_data )
                    ->from( "schoolyear_students" )
                    ->join( "students", "students.student_id = schoolyear_students.student_id", "left" )
                    ->get()->result_array();

        foreach( $students as $student ){
            $chck_data_grade = array( "sy_id"=> $sy_id, "grade_level"=> $grade_level, "student_id"=>$student["student_id"] );
            $chck1 = array( "sy_id"=> $sy_id,"student_id"=>$student["student_id"] );
            $student["grades"] = $this->getStudentAllSubjectGrades( $chck_data_grade );
            $student["average"] = $this->getSingleStudentGradeAverage( array( "sy_id"=> $sy_id,"student_id"=>$student["student_id"] ) );
            $student["behavior"] = $this->getStudentBehavior( array( "sy_id"=> $sy_id,"student_id"=>$student["student_id"] ) );
            //$student["present_days"] = $this->getStudentPresentDays( $chck1 );
            //$student["tardy_days"] = $this->getStudentTardyDays( $chck1 );
			//$student["school_days"] = $this->getStudentSchoolDays( array( "sy_id"=> $sy_id) );
			
            $get_school_days = array( "sy_id"=> $sy_id, "grade_level"=> $grade_level, "student_id"=> 0, "attendance_type" => 1);
            $get_present_days = array( "sy_id"=> $sy_id,"student_id"=>$student["student_id"], "attendance_type" => 2 );
            $get_tardy_days = array( "sy_id"=> $sy_id,"student_id"=>$student["student_id"], "attendance_type" => 3 );
			$school_days = $this->AttendanceModel->schoolDays($get_school_days);
			$present_days = $this->AttendanceModel->getStudentPresentDays($get_present_days);
			$tardy_days = $this->AttendanceModel->getStudentTimesTardy($get_tardy_days);
			$student["school_days"] = $school_days['data'];
            $student["present_days"] = $present_days['data'];
			$student["tardy_days"] = $tardy_days['data'];
			

            array_push( $students_grades_and_behavior, $student );
        }

        //print("<pre>".print_r($students_grades_and_behavior,true)."</pre>");

        return $students_grades_and_behavior;
        
    }


    public function getSingleStudentGradeAverage( $data ){

        $check = array( "sy_id"=> $data["sy_id"],"student_id"=>$data["student_id"] );

        $checkdata = $this->db->where( $check )->get( "average" );
        if( $checkdata->num_rows() != 0 ){
            $this->response = $checkdata->result_array()[0];
        } else {
            $this->response["first_grading"] = 0;
            $this->response["second_grading"] = 0;
            $this->response["third_grading"] = 0;
            $this->response["fourth_grading"] = 0;
            $this->response["general_average"] = 0;
        }
        return $this->response;
    }



    public function addAverage( $data ){

        $check = array( "sy_id"=> $data["sy_id"],"student_id"=>$data["student_id"] );

        $checkdata = $this->db->where( $check )->get( "average" );

        if( $checkdata->num_rows() != 0 ){
            $this->db->where( $check );
            $this->db->update( "average", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully updated average!";
            $this->response["status"] = "callout-success";
        } else {
            // $this->db->where( $check );
            $this->db->insert( "average", $data );
            $this->response["code"] = "200";
            $this->response["msg"] = "Successfully updated average!";
            $this->response["status"] = "callout-success";
        }
        return $this->response;
    }

    public function getStudentGradeAverage( $data ){

        $check = array( "sy_id"=> $data["sy_id"],"student_id"=>$data["student_id"] );

        $checkdata = $this->db->where( $check )->get( "average" );
        if( $checkdata->num_rows() != 0 ){
            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["data"] = $checkdata->result_array()[0];
            $this->response["status"] = "callout-success";
        } else {
            $average["first_grading"] = 0;
            $average["second_grading"] = 0;
            $average["third_grading"] = 0;
            $average["fourth_grading"] = 0;
            $average["general_average"] = 0;
            $this->response["code"] = "200";
            $this->response["msg"] = "OK";
            $this->response["data"] = $average;
            $this->response["status"] = "callout-success";
        }
        return $this->response;
    }




    public function getStudentPresentDays( $data )
    {
        $present_days = $this->db->where( $data )->get( "days_present" );
        if( $present_days->num_rows() != 0 ){
			$data = $present_days->result_array()[0];
			$data["total"] = $data["aug"] + $data["sep"] + $data["oct"] + $data["nov"] + $data["december"] + $data["jan"] + $data["feb"] + $data["mar"] + $data["apr"] + $data["may"];
        } else {
            $data["aug"] = 0;
            $data["sep"] = 0;
            $data["oct"] = 0;
            $data["nov"] = 0;
            $data["december"] = 0;
            $data["jan"] = 0;
            $data["feb"] = 0;
            $data["mar"] = 0;
            $data["apr"] = 0;
            $data["may"] = 0;
            $data["total"] = 0;
        }
        return $data;
    }

    public function getStudentTardyDays( $data )
    {
        $times_days = $this->db->where( $data )->get( "times_tardy" );
        if( $times_days->num_rows() != 0 ){
			$data = $times_days->result_array()[0];
			$data["total"] = $data["aug"] + $data["sep"] + $data["oct"] + $data["nov"] + $data["december"] + $data["jan"] + $data["feb"] + $data["mar"] + $data["apr"] + $data["may"];
        } else {
            $data["aug"] = 0;
            $data["sep"] = 0;
            $data["oct"] = 0;
            $data["nov"] = 0;
            $data["december"] = 0;
            $data["jan"] = 0;
            $data["feb"] = 0;
            $data["mar"] = 0;
            $data["apr"] = 0;
            $data["may"] = 0;
            $data["total"] = 0;
        }
        return $data;
    }

    public function getStudentSchoolDays( $paramData )
    {
        $schooldays = $this->db->where( $paramData )->get( "school_days" );
        if( $schooldays->num_rows() != 0 ){
			$data = $schooldays->result_array()[0];
			$data["total"] = $data["aug"] + $data["sep"] + $data["oct"] + $data["nov"] + $data["december"] + $data["jan"] + $data["feb"] + $data["mar"] + $data["apr"] + $data["may"];
        } else {
            $data["aug"] = 0;
            $data["sep"] = 0;
            $data["oct"] = 0;
            $data["nov"] = 0;
            $data["december"] = 0;
            $data["jan"] = 0;
            $data["feb"] = 0;
            $data["mar"] = 0;
            $data["apr"] = 0;
            $data["may"] = 0;
            $data["total"] = 0;
        }
        return $data;
    }

    public function getSummaryOfGradesByPeriod($data, $period) {
        
        $students_grades = array();

        $students = $this->db->select("students.first_name, students.last_name, students.student_id")
        ->from("schoolyear_students")
        ->where($data)
        ->join("students", "students.student_id = schoolyear_students.student_id", "left" )
        ->where("students.status", 1)
        ->get()->result_array();

        // var_dump($students);
        
        foreach ($students as $std) {
            
            $checkParam = "subjects.sy_id = ".$data["sy_id"]." AND subjects.grade_level = '".$data["grade_level"]."'";
            $getGrade = "grades.student_id = ".$std['student_id']."";

            $std["subjects"] = $this->db->select("subjects.subject_name, IFNULL(grades.".$period.",0) AS total")
                                ->where($checkParam)
                                ->from("subjects")
                                ->join("grades", "grades.subject_id = subjects.subject_id", "left outer")
                                ->where($getGrade)
                                ->get()->result_array();
            
            print("<pre>".print_r($std,true)."</pre>");

            echo "<br>";
        }


        return $students_grades;
    }


    

    
}
