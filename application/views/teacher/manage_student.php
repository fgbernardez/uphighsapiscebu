
<?php

$student_grade_level = explode("-",$student_data["grade_level"]);
$section = "";


switch ( $student_data["grade_level"] ){
    case "grade-7":
        $section = "Bartlett";
        break;
    case "grade-8":
        $section = "Villamor";
        break;
    case "grade-9":
        $section = "Benton";
        break;
    case "grade-10":
        $section = "Palma";
        break;
    case "grade-11":
        $section = "Bocobo";
        break;
    case "grade-12":
        $section = "Sison";
        break;
    default:
        $section = "Undefined";

}

date_default_timezone_set('Asia/Manila');

$dead = $deadline["date_deadline"] . " " . $deadline["time_deadline"];
$date = date_create($dead);
$deadline_date  = date_format($date,"Y/m/d h:i:s A");
$current_date = date("Y/m/d h:i:s A");
// echo "Deadline date => " . $deadline_date ."<br>";
// echo "Current date => " . $current_date ."<br>";
// echo date_format($date,"Y/m/d H:i:s");
// var_dump( date("Y/m/d H:i:s") );
$d_date = date_create( $dead );
$c_date = date_create();

$req_edit = false;
$edit_grading = 0;
if(  $request_edit != null ){
    if( $request_edit[0]["req_status"] == "Accepted" ){
        $d_date = date_create($request_edit[0]["deadline_date"]);
        $req_deadline_date  = date_format($d_date,"Y/m/d h:i:s A");
        if( $current_date <= $req_deadline_date ){
            $req_edit = true;
            $edit_grading = $request_edit[0]["grading"];
            
        }
    }
}

// echo "EDITING GRADE:" . $edit_grading;
// echo "CURRENT DATE:" . $current_date;
// echo "<br>";
// echo "DEADLINE DATE:" . $deadline_date;
// echo "<br>";

// var_dump( $req_edit );
$edit = false;
if( $current_date <= $deadline_date ){
    $edit = true;
}

$update_grading = 0;
$update_grade = false;

if ($this->session->userdata("active") == 1){
    if( $edit == true && $deadline["sy_id"] == $sy_id ){
        $update_grade = true;
        $update_grading = $deadline["grading"];
    }
}


// echo "deadline grading" . $deadline["grading"];
// echo "<br>";
// echo "update grading" . $update_grading;
// echo "<br>";
// echo "EDIT: ";
// var_dump( $edit );
// exit;
?>

<style>
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ text-align: center; }
    .content_title, .modal-title{text-align: center; text-transform: uppercase; font-weight: bold; color: #751517;}
</style>

<style>
/* The container */
.radio-container {
  display: inline-block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  margin-right: 10px;
}

/* Hide the browser's default radio button */
.radio-container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.radio-container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.radio-container input:checked ~ .checkmark {
  background-color: #751517;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.radio-container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.radio-container .checkmark:after {
 	top: 6px;
	left: 6px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
.form-group > .lbl{ display: block; }
#modal-behavior .form-group{text-align: center;}
.box-sidebar ul.student-list{padding: 10px 5px; height: 400px; display: block; overflow-y: auto;}
.legend-rating{border-bottom: 1px solid #e5e5e5;}
.legend-con{padding: 20px; text-align: left; width: 275px; margin: 0 auto; max-width: 100%;}
.legend-rating p { color: #751517; font-weight: 600; font-size: 14px; }
</style>



  <div class="content-wrapper">
    <section class="content-header">
		<section class="content-header">
			<?php 
			if (isset($deadlineForSubmitGrade) && $deadlineForSubmitGrade) :
			$gradings = $this->config->item('gradings'); 
			?>
				<div class="alert alert-warning alert-dismissible">
					<h4><i class="icon fa fa-warning"></i>Warning!</h4>
					<?php echo 'Please submit the '.$gradings[$deadlineForSubmitGrade['grading']].' grade before '.$deadlineForSubmitGrade['date_deadline'].' '.$deadlineForSubmitGrade['time_deadline'].'!'; ?>
				</div>
			<?php endif; ?>
		</section>
    </section>
    <section class="content" >
        <div id="teacher-manage-student-app">
        <div class="row">
            <div class="col col-md-3">      
                <div class="box box-solid no-padding box-sidebar">
                    <div class="box-body no-padding">
                        <ul class="student_list">
                            <li class="header">Assigned Subjects </li>
                            <?php foreach( $assignedSubjects->result() as $sbj ) { ?>
                                <li <?php if( $subject_id == $sbj->subject_id ){ echo 'class="active"'; } ?>>
                                    <a href="<?php echo base_url(); ?>subject/<?php echo $sbj->sy_id."/".$sbj->subject_id; ?>" > <?php echo $sbj->subject_name; ?> <span style="float: right; text-transform: capitalize;"> <?php echo $sbj->grade_level; ?></span></a>
                                    <?php if( $subject_id == $sbj->subject_id ){ ?>
                                        <ul class="student-list">
                                            <?php foreach( $students->result() as $std ) { ?>
                                                <li <?php if( $student_id == $std->student_id ){ echo 'class="active" id="act-std"'; } ?>>
                                                    <a href="<?php echo base_url(); ?>manage-student/<?php echo $school_year["sy_id"] ."/".$subject_id ."/". $std->student_id.'#act-std'; ?>"> <?php echo $std->first_name.' '.$std->last_name; ?> </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>

                
                
            </div>
            <div class="col col-md-9">
                <div class="box box-solid">
                    <!-- <div class="box-header with-border">
                        <h3 class="box-title sy_title">School Year: <?php echo $school_year["start_year"] ."-". $school_year["end_year"]; ?></h3>
                    </div> -->
                    <div class="box-body view_student">
                        <div class="header_view">
                            <div class="hdr_content">
                            <?php if( $update_grade == false ){ ?>
                                <button style="position: absolute;right: 10px; z-index: 999999;" class="btn btn-maroon" data-toggle="modal" data-target="#modal-request"><i class="fa fa-plus"></i>  Request Edit</button>
                            <?php } ?>
                                <?php if($this->session->tempdata() != null) { ?>
                                    <div class="callout callout-<?php echo $this->session->tempdata("status"); ?>" style="position: absolute; right: 10px; top: 50px;">
                                        <p style="color: #fff;"><?php echo $this->session->tempdata("msg"); ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="content_view">
                            <div class="row">
                                <div class="col col-md-5 data_left">
                                    <p>Student No: <span><?php echo $student_data["student_no"]; ?></span></p>
                                    <p>Name: <span><?php echo $student_data["first_name"].' '.$student_data["last_name"]; ?></span></p>
                                    <p>Age: <span><?php echo $student_data["age"]; ?></span></p>
                                    <p>Gender: <span><?php echo $student_data["gender"]; ?></span></p>
                                </div>
                                <div class="col col-md-3 col-md-offset-4 data_right" >
                                    <p>School Year: <span><?php echo $school_year["start_year"] ."-". $school_year["end_year"]; ?></span></p>
                                    <p>LRN: <span><?php echo $student_data["lrn"]; ?></span></p>
                                    <p>Grade: <span><?php echo $student_grade_level[1]; ?></span></p>
                                    <p>Section: <span><?php echo $section; ?></span></p>
                                </div>
                                <div class="col col-md-12">
                                    <h4 class="content_title">Grade</h4>
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Subject</th>
                                                <?php if($subject["semester"] == 1) { ?>
                                                <th>1ST</th>
                                                <th>2ND</th>
                                                <?php } elseif($subject["semester"] == 2){ ?>
                                                <th>3RD</th>
                                                <th>4TH</th>
                                                <?php } else {  ?>
                                                <th>1ST</th>
                                                <th>2ND</th>
                                                <th>3RD</th>
                                                <th>4TH</th>
                                                <?php } ?>
                                                <th></th>
                                            </tr>
                                            <tr v-if="studentGrade">
                                                <td><?php echo $subject["subject_name"]; ?></td>
                                                <?php if($subject["semester"] == 1) { ?>
                                                    <td>{{ studentGrade.quarter_first }}</td>
                                                    <td>{{ studentGrade.quarter_second }}</td>
                                                    <?php if( $update_grading == 1 || $update_grading == 2 || $req_edit == true ) { ?>
                                                         <td>
                                                            <?php if( $update_grade == true && ( $update_grading == 1 || $update_grading == 2 )) { ?>
                                                                <button class="btn btn-warning" @click="gradeModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?> )"><span class="fa fa-pencil"></span></button>
                                                            <?php } ?>

                                                            <?php if( $req_edit == true ) { ?>
                                                                <button class="btn btn-darkgreen" @click="updateRequestedEditGradeModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?> )"><span class="fa fa-pencil"></span></button>
                                                            <?php } ?>
                                                        </td>

                                                    <?php } else { echo "<td></td>";  }?>
                                                <?php } elseif($subject["semester"] == 2){ ?>
                                                    <td>{{ studentGrade.quarter_third }}</td>
                                                    <td>{{ studentGrade.quarter_fourth }}</td>
                                                    <?php if( $update_grading == 3 ||  $update_grading == 4 || $req_edit == true) { ?>



                                                        <td>
                                                            <?php if( $update_grade == true && ( $update_grading == 3 ||  $update_grading == 4 ) ) { ?>
                                                                <button class="btn btn-warning" @click="gradeModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?> )"><span class="fa fa-pencil"></span></button>
                                                            <?php } ?>

                                                            <?php if( $req_edit == true ) { ?>
                                                                <button class="btn btn-darkgreen" @click="updateRequestedEditGradeModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?> )"><span class="fa fa-pencil"></span></button>
                                                            <?php } ?>
                                                        </td>


                                                    <?php } else { echo "<td></td>";  }?>
                                                <?php } else {  ?>
                                                    <td>{{ studentGrade.quarter_first }}</td>
                                                    <td>{{ studentGrade.quarter_second }}</td>
                                                    <td>{{ studentGrade.quarter_third }}</td>
                                                    <td>{{ studentGrade.quarter_fourth }}</td>
                                                    <?php if( $update_grading == 1 ||  $update_grading == 2 || $update_grading == 3  ||  $update_grading == 4 || $req_edit == true) { ?>
                                                        <td>
                                                            <?php if( $update_grade == true && (  $update_grading == 1 ||  $update_grading == 2 || $update_grading == 3  ||  $update_grading == 4 ) ) { ?>
                                                                <button class="btn btn-warning" @click="gradeModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?> )"><span class="fa fa-pencil"></span></button>
                                                            <?php } ?>

                                                            <?php if( $req_edit == true ) { ?>
                                                                <button class="btn btn-darkgreen" @click="updateRequestedEditGradeModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?> )"><span class="fa fa-pencil"></span></button>
                                                            <?php } ?>
                                                        </td>
                                                    <?php } else { echo "<td></td>";  }?>
                                                <?php } ?>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <!--div class="col col-md-12">
                                    <h4 class="content_title">PERSONALITY AND CHARACTER EVALUATION RATING</h4>
                                    <table class="table table-striped" v-if="behaviorGrade">
                                        <tbody>
                                            <tr>
                                                <th>Grading</th>
                                                <th>Manners</th>
                                                <th>Appearance</th>
                                                <th>Dependability</th>
                                                <th>Cooperation</th>
                                                <th>Attendance</th>
                                                <th>Initiative & Resourcefulness</th>
                                                <th>Leadership</th>
                                                <th></th>
                                            </tr>
                                            <tr v-for="b in behaviorGrade"> 
                                                <td>{{ b.grading }}</td>
                                                <td>{{ b.manners }}</td>
                                                <td>{{ b.appearance }}</td>
                                                <td>{{ b.dependability }}</td>
                                                <td>{{ b.cooperation }}</td>
                                                <td>{{ b.attendance }}</td>
                                                <td>{{ b.initiative_and_resourcefulness }}</td>
                                                <td>{{ b.leadership }}</td>
                                                <?php if( $update_grade == true || $req_edit == true ) { ?>
                                                    <td v-if="b.grading == <?php echo $update_grading; ?>" ><button class="btn btn-warning" @click="behaviorModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?>, b.grading )"><span class="fa fa-pencil"></span></button></td>
                                                    <td v-else-if="b.grading == <?php echo $edit_grading; ?>" ><button class="btn btn-darkgreen" @click="behaviorModal(<?php echo $school_year["sy_id"].",".$subject_id.",".$student_data["student_id"]; ?>, b.grading )"><span class="fa fa-pencil"></span></button></td>
                                                <?php } else { echo "<td></td>"; }?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- MODALS -->
                                
        <!-- GRADE MODAL -->
            <div class="modal fade" id="modal-grade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Student Grade</h4>
                        </div>
                        <form v-on:submit.prevent="submitGradeForm" action="#" id="gradeForm" v-if="studentGrade">
                            <div class="modal-body">
                                <p style = "font-weight: bold;">
                                    Name: <span style = "color: #800000;"><?php echo $student_data["first_name"].' '.$student_data["last_name"]; ?></span> </p>
                                 <p style = "font-weight: bold;">  
                                    Section: <span  style = "color: #800000;"><?php echo $section; ?></span></p>
                                <br>
                                <br>
                                <div class="responsedata_div" v-if="responseUpdateGradeData">
                                    <div class="callout " :class="responseUpdateGradeData.status">
                                        <p>{{ responseUpdateGradeData.msg }}</p>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="subject_id" value="<?php echo $subject_id; ?>">
                                <input type="hidden" class="form-control" name="sy_id"  value="<?php echo $school_year["sy_id"]; ?>">
                                <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_data["student_id"]; ?>" >

                                <?php if($subject["semester"] == 1) { ?>

                                    <?php if( $deadline["grading"] == 1){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">1st Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_first" placeholder="Enter grade" :value="studentGrade.quarter_first">
                                        </div>
                                    <?php } ?>
                                    <?php if( $deadline["grading"] == 2){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">2nd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_second"  placeholder="Enter grade" :value="studentGrade.quarter_second">
                                        </div>
                                    <?php } ?>
                                    
                                <?php } elseif($subject["semester"] == 2){ ?>
                                    
                                    <?php if( $deadline["grading"] == 3){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">3rd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_third" placeholder="Enter grade" :value="studentGrade.quarter_third">
                                        </div>
                                    <?php } ?>
                                    <?php if( $deadline["grading"] == 4){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">4th Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_fourth" placeholder="Enter grade" :value="studentGrade.quarter_fourth">
                                        </div>
                                    <?php } ?>
                                    
                                <?php } else {  ?>

                                    <?php if( $deadline["grading"] == 1){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">1st Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_first" placeholder="Enter grade" :value="studentGrade.quarter_first">
                                        </div>
                                    <?php } else if( $deadline["grading"] == 2){  ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">2nd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_second"  placeholder="Enter grade" :value="studentGrade.quarter_second">
                                        </div>
                                    <?php } else if( $deadline["grading"] == 3){  ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">3rd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_third" placeholder="Enter grade" :value="studentGrade.quarter_third">
                                        </div>
                                    <?php } else if( $deadline["grading"] == 4){  ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">4th Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_fourth" placeholder="Enter grade" :value="studentGrade.quarter_fourth">
                                        </div>
                                    <?php } ?>
                                    
                                <?php } ?>
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-maroon">Save changes</button>
                            </div>
                        </form>
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->










        <!-- GRADE MODAL -->
        <div class="modal fade" id="modal-requested-update-grade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Requested Edit Grade</h4>
                        </div>
                        <form v-on:submit.prevent="submitRequestedEditGradeForm" action="#" id="requestededitgradeForm" v-if="studentGrade">
                            <div class="modal-body">
                                <div class="responsedata_div" v-if="responseUpdateGradeData">
                                    <div class="callout " :class="responseUpdateGradeData.status">
                                        <p>{{ responseUpdateGradeData.msg }}</p>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="subject_id" value="<?php echo $subject_id; ?>">
                                <input type="hidden" class="form-control" name="sy_id"  value="<?php echo $school_year["sy_id"]; ?>">
                                <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_data["student_id"]; ?>" >

                                <?php if($subject["semester"] == 1) { ?>

                                    <?php if($edit_grading == 1 ){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">1st Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_first" placeholder="Enter grade" :value="studentGrade.quarter_first">
                                        </div>
                                    <?php } ?>
                                    <?php if($edit_grading == 2 ){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">2nd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_second"  placeholder="Enter grade" :value="studentGrade.quarter_second">
                                        </div>
                                    <?php } ?>
                                    
                                <?php } elseif($subject["semester"] == 2){ ?>
                                    
                                    <?php if($edit_grading == 3){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">3rd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_third" placeholder="Enter grade" :value="studentGrade.quarter_third">
                                        </div>
                                    <?php } ?>
                                    <?php if($edit_grading == 4 ){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">4th Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_fourth" placeholder="Enter grade" :value="studentGrade.quarter_fourth">
                                        </div>
                                    <?php } ?>
                                    
                                <?php } else {  ?>

                                    <?php if($edit_grading == 1){ ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">1st Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_first" placeholder="Enter grade" :value="studentGrade.quarter_first">
                                        </div>
                                    <?php } else if( $edit_grading == 2 ){  ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">2nd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_second"  placeholder="Enter grade" :value="studentGrade.quarter_second">
                                        </div>
                                    <?php } else if( $edit_grading == 3){  ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">3rd Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_third" placeholder="Enter grade" :value="studentGrade.quarter_third">
                                        </div>
                                    <?php } else if( $edit_grading == 4){  ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">4th Grading</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="quarter_fourth" placeholder="Enter grade" :value="studentGrade.quarter_fourth">
                                        </div>
                                    <?php } ?>
                                    
                                <?php } ?>
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-maroon">Save changes</button>
                            </div>
                        </form>
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



            <!-- BEHAVIOR MODAL -->
            <div class="modal fade" id="modal-behavior">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Student Behavior</h4>
                        </div>
                        <div class="legend-rating">
                            <div class="legend-con">
                                <p><span>1</span> - Outstanding (O)</p>
                                <p><span>2</span> - Very Satisfactory (VS)</p>
                                <p><span>3</span> - Satisfactory (S)</p>
                                <p><span>4</span> - Moderately Satisfactory (MS)</p>
                                <p><span>5</span> - Needs Improvement (NI)</p>
                            </div>
                        </div>
                        <form v-on:submit.prevent="submitBehaviorForm" action="#" id="behaviorForm" v-if="behaviorGrading">
                            <div class="modal-body">

                                <div class="responsedata_div" v-if="responseData">
                                    <div class="callout " :class="responseData.status">
                                        <p>{{ responseData.msg }}</p>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="subject_id" value="<?php echo $subject_id; ?>">
                                <input type="hidden" class="form-control" name="sy_id"  value="<?php echo $school_year["sy_id"]; ?>">
                                <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_data["student_id"]; ?>" >
                                <input type="hidden" class="form-control" name="grading" :value="behaviorGrading.grading" >
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="lbl">Manners:</label>
                                    <!-- <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="manners" placeholder="Enter grade" :value="behaviorGrading.manners"> -->

                                    <label class="radio-container">1
                                        <input type="radio" name="manners" value="1" v-model="behaviorGrading.manners">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">2
                                        <input type="radio" name="manners" value="2" v-model="behaviorGrading.manners">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">3
                                        <input type="radio" name="manners" value="3" v-model="behaviorGrading.manners">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">4
                                        <input type="radio" name="manners" value="4" v-model="behaviorGrading.manners">
                                        <span class="checkmark"></span>
                                        </label>
                                    <label class="radio-container">5
                                        <input type="radio" name="manners" value="5" v-model="behaviorGrading.manners">
                                        <span class="checkmark"></span>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="lbl">Appearance:</label>
                                    <!-- <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="appearance"  placeholder="Enter grade" :value="behaviorGrading.appearance"> -->
                                    <label class="radio-container">1
                                        <input type="radio" name="appearance" value="1" v-model="behaviorGrading.appearance">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">2
                                        <input type="radio" name="appearance" value="2" v-model="behaviorGrading.appearance">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">3
                                        <input type="radio" name="appearance" value="3" v-model="behaviorGrading.appearance">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">4
                                        <input type="radio" name="appearance" value="4" v-model="behaviorGrading.appearance">
                                        <span class="checkmark"></span>
                                        </label>
                                    <label class="radio-container">5
                                        <input type="radio" name="appearance" value="5" v-model="behaviorGrading.appearance">
                                        <span class="checkmark"></span>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="lbl">Dependability:</label>
                                    <!-- <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="dependability" placeholder="Enter grade" :value="behaviorGrading.dependability"> -->
                                    <label class="radio-container">1
                                        <input type="radio" name="dependability" value="1"  v-model="behaviorGrading.dependability">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">2
                                        <input type="radio" name="dependability" value="2"  v-model="behaviorGrading.dependability">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">3
                                        <input type="radio" name="dependability" value="3"  v-model="behaviorGrading.dependability">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">4
                                        <input type="radio" name="dependability" value="4"  v-model="behaviorGrading.dependability">
                                        <span class="checkmark"></span>
                                        </label>
                                    <label class="radio-container">5
                                        <input type="radio" name="dependability" value="5"  v-model="behaviorGrading.dependability">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="lbl">Cooperation:</label>
                                    <!-- <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="cooperation" placeholder="Enter grade" :value="behaviorGrading.cooperation"> -->
                                    <label class="radio-container">1
                                        <input type="radio" name="cooperation" value="1"  v-model="behaviorGrading.cooperation">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">2
                                        <input type="radio" name="cooperation" value="2" v-model="behaviorGrading.cooperation">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">3
                                        <input type="radio" name="cooperation" value="3" v-model="behaviorGrading.cooperation">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">4
                                        <input type="radio" name="cooperation" value="4" v-model="behaviorGrading.cooperation">
                                        <span class="checkmark"></span>
                                        </label>
                                    <label class="radio-container">5
                                        <input type="radio" name="cooperation" value="5" v-model="behaviorGrading.cooperation">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="lbl">Attendance:</label>
                                    <!-- <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="attendance" placeholder="Enter grade" :value="behaviorGrading.attendance"> -->
                                    <label class="radio-container">1
                                        <input type="radio" name="attendance" value="1"  v-model="behaviorGrading.attendance">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">2
                                        <input type="radio" name="attendance" value="2"  v-model="behaviorGrading.attendance">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">3
                                        <input type="radio" name="attendance" value="3"  v-model="behaviorGrading.attendance">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">4
                                        <input type="radio" name="attendance" value="4"  v-model="behaviorGrading.attendance">
                                        <span class="checkmark"></span>
                                        </label>
                                    <label class="radio-container">5
                                        <input type="radio" name="attendance" value="5"  v-model="behaviorGrading.attendance">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <hr style="border:1px solid; color: #751517;">

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="lbl">Initiative & Resourcefulness:</label>
                                    <!-- <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="initiative_and_resourcefulness" placeholder="Enter grade" :value="behaviorGrading.initiative_and_resourcefulness"> -->

                                    <label class="radio-container">1
                                        <input type="radio" name="initiative_and_resourcefulness" value="1" v-model="behaviorGrading.initiative_and_resourcefulness">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">2
                                        <input type="radio" name="initiative_and_resourcefulness" value="2"  v-model="behaviorGrading.initiative_and_resourcefulness">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">3
                                        <input type="radio" name="initiative_and_resourcefulness" value="3"  v-model="behaviorGrading.initiative_and_resourcefulness">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">4
                                        <input type="radio" name="initiative_and_resourcefulness" value="4"  v-model="behaviorGrading.initiative_and_resourcefulness">
                                        <span class="checkmark"></span>
                                        </label>
                                    <label class="radio-container">5
                                        <input type="radio" name="initiative_and_resourcefulness" value="5"  v-model="behaviorGrading.initiative_and_resourcefulness">
                                        <span class="checkmark"></span>
                                    </label>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="lbl">Leadership:</label>
                                    <!-- <input type="number" class="form-control" id="exampleInputEmail1" step="any" name="leadership" placeholder="Enter grade" :value="behaviorGrading.leadership"> -->
                                    <label class="radio-container">1
                                        <input type="radio" name="leadership" value="1"  v-model="behaviorGrading.leadership">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">2
                                        <input type="radio" name="leadership" value="2"  v-model="behaviorGrading.leadership">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">3
                                        <input type="radio" name="leadership" value="3"  v-model="behaviorGrading.leadership">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">4
                                        <input type="radio" name="leadership" value="4"  v-model="behaviorGrading.leadership">
                                        <span class="checkmark"></span>
                                        </label>
                                    <label class="radio-container">5
                                        <input type="radio" name="leadership" value="5"  v-model="behaviorGrading.leadership">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-maroon">Save changes</button>
                            </div>
                        </form>
                    </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


        <!-- END MODALS -->

        <div class="modal fade" id="modal-request">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Request Edit Grade</h4>
                </div>
                <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Grading: </label>
                        <select class="form-control select2" data-placeholder="Select a State" name="grading"
                                style="width: 100%;" required>

                            <?php if($subject["semester"] == 1) { ?>
                                <option value="1">First Grading</option>
                                <option value="2">Second Grading</option>
                            <?php } else if($subject["semester"] == 2) { ?>
                                <option value="3">Third Grading</option>
                                <option value="4">Fourth Grading</option>
                            <?php } else if($subject["semester"] == 0) { ?>
                                <option value="1">First Grading</option>
                                <option value="2">Second Grading</option>
                                <option value="3">Third Grading</option>
                                <option value="4">Fourth Grading</option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Reason: </label>
                        <textarea class="form-control" rows="3" name="reason" placeholder="Enter reason ..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



  </div>
  <!-- end APP -->

    </section>
  </div>
