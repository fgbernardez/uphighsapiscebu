
<style>
.box-sidebar ul li a.active{ background: #751517;color: white; }
.sbj-name-option{margin: 10px 0px;}
.sbj-name-option span{ font-weight: bold; color: #751517; cursor: pointer;}
.sbj-name-option span:hover{text-decoration: underline;}
.select-div{ display: none;}
.summary-of-grades{text-align: center;}
#view-failed-grades-and-subjects-no-grade .box{width: 500px; max-width: 100%;}
.tbl-failed-students-grade span{cursor: pointer;}
.tbl-failed-students-grade span:hover{background-color: #f0ad4e !important;}

.btn-modify-mmc{display: block; margin: 0 auto;}
.callout-warning-mc{
	border-radius: 3px;
	margin: 0 0 20px 0;
	padding: 15px 30px 15px 15px;
	border-left: 5px solid #eee;
	border-color: #c87f0a !important;
	background-color: #f39c12 !important;
	color: white;
}
#monthly_class input{cursor: pointer;}
</style>

<div id="school-year-grade-level">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Blank page
      </h1> -->
    </section>
    <!-- Main content -->
    <section class="content">
			<?php if (isset($addMMC_response)): ?>
				<?php if($addMMC_response == true): ?>
					<div class="callout callout-success"  style="display: block; float: right; width: 200px;">
						<p>Successfully modified</p>
					</div>
				<?php else: ?>
					<div class="callout callout-danger" style="display: block; float: right; width: 200px;">
						<p>Failed to modify</p>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if($attendance_calendar == null): ?>
				
				<div class="callout-warning-mc callout-warning">
					<h4>Warning</h4>
					<p>Please update Month's Class</p>
				</div>
			<?php endif; ?>

        <div class="row">
            <div class="col col-md-4">
                <div class="box box-solid no-padding box-sidebar">
                    <div class="box-body no-padding">
                        <ul class="">
                            <li class="header">GRADE LEVELS</li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/SY/'.$sy_data["sy_id"].'/grade-7'; ?>" <?php if( $grade_level == "grade-7" ){ echo 'class="active"'; } ?>>
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 7</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/SY/'.$sy_data["sy_id"].'/grade-8'; ?>" <?php if( $grade_level == "grade-8" ){ echo 'class="active"'; } ?>>
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 8</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/SY/'.$sy_data["sy_id"].'/grade-9'; ?>" <?php if( $grade_level == "grade-9" ){ echo 'class="active"'; } ?>>
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 9</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/SY/'.$sy_data["sy_id"].'/grade-10'; ?>" <?php if( $grade_level == "grade-10" ){ echo 'class="active"'; } ?>>
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 10</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/SY/'.$sy_data["sy_id"].'/grade-11'; ?>" <?php if( $grade_level == "grade-11" ){ echo 'class="active"'; } ?>>
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 11</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/SY/'.$sy_data["sy_id"].'/grade-12'; ?>" <?php if( $grade_level == "grade-12" ){ echo 'class="active"'; } ?>>
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 12</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box box-solid no-padding box-sidebar">
                    <div class="box-body no-padding">
                        <ul class="summary-of-grades">
                            <li class="header">SUMMARY OF GRADES</li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/1">First Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/2">Second Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/3">Third Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/4">Fourth Grading</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="box box-darkgreen">
                    <div class="box-header">
                        <h3 class="box-title">Student's Failed Grades</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped tbl-failed-students-grade">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <th>1ST</th>
                                <th>2ND</th>
                                <th>3RD</th>
                                <th>4TH</th>
                            </tr>

                                <?php foreach( $students_failed as $index=>$std ){ 
									if($std["grades"]["display_fail"] != 0){
								?>
                                    <tr>
                                        <td><?php echo $std["first_name"].' '.$std["last_name"]; ?></td>
                                        <td>
											<?php if(($std["grades"]["subject_failed_grades"]["quarter_first"]["failed_grades"] != null || $std["grades"]["subject_failed_grades"]["quarter_first"]["subjectsNoGrade"] != null) && $std["grades"]["total_avg_first"] > 0){ ?><span @click='getSubjectFailedGradesModal("<?php echo $std["first_name"].' '.$std["last_name"]; ?>", "First Grading", <?php echo json_encode($std["grades"]["subject_failed_grades"]["quarter_first"]); ?>)' class="badge bg-red"><?php echo $std["grades"]["total_avg_first"]; }?></span>
										</td>
                                        <td>
											<?php if(($std["grades"]["subject_failed_grades"]["quarter_second"]["failed_grades"] != null || $std["grades"]["subject_failed_grades"]["quarter_second"]["subjectsNoGrade"] != null) && $std["grades"]["total_avg_second"] > 0){ ?><span @click='getSubjectFailedGradesModal("<?php echo $std["first_name"].' '.$std["last_name"]; ?>","Second Grading", <?php echo json_encode($std["grades"]["subject_failed_grades"]["quarter_second"]); ?>)' class="badge bg-red"><?php echo $std["grades"]["total_avg_second"];} ?></span>
										</td>
                                        <td>
											<?php if(($std["grades"]["subject_failed_grades"]["quarter_third"]["failed_grades"] != null || $std["grades"]["subject_failed_grades"]["quarter_third"]["subjectsNoGrade"] != null) && $std["grades"]["total_avg_third"] > 0){ ?><span @click='getSubjectFailedGradesModal("<?php echo $std["first_name"].' '.$std["last_name"]; ?>","Third Grading", <?php echo json_encode($std["grades"]["subject_failed_grades"]["quarter_third"]); ?>)' class="badge bg-red"><?php echo $std["grades"]["total_avg_third"];} ?></span>
										</td>
                                        <td>
											<?php if(($std["grades"]["subject_failed_grades"]["quarter_fourth"]["failed_grades"] != null || $std["grades"]["subject_failed_grades"]["quarter_fourth"]["subjectsNoGrade"] != null) && $std["grades"]["total_avg_fourth"] > 0){ ?><span @click='getSubjectFailedGradesModal("<?php echo $std["first_name"].' '.$std["last_name"]; ?>","Fourth Grading", <?php echo json_encode($std["grades"]["subject_failed_grades"]["quarter_fourth"]); ?>)' class="badge bg-red"><?php echo $std["grades"]["total_avg_fourth"];} ?></span>
										</td>
                                    </tr>
                                <?php }}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
				<div class="box box-darkgreen">
                    <div class="box-header">
                        <h3 class="box-title">Month's Class</h3>
                    </div>
                    <div class="box-body no-padding" id="monthly_class">
						<form action="" method="POST">
							<table class="table table-striped tbl-failed-students-grade">
								<tbody>
									<tr>
										<th>Month</th>
										<th>On</th>
										<th>Off</th>
									</tr>
									<tr>
										<td>January</td>
										<td><input type="radio" name="january" id="january" value="1" <?php if (isset($attendance_calendar["january"]) && $attendance_calendar["january"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="january" id="january" value="0" <?php if (isset($attendance_calendar["january"]) && $attendance_calendar["january"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>February</td>
										<td><input type="radio" name="february" id="february" value="1" <?php if (isset($attendance_calendar["february"]) && $attendance_calendar["february"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="february" id="february" value="0" <?php if (isset($attendance_calendar["february"]) && $attendance_calendar["february"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>March</td>
										<td><input type="radio" name="march" id="march" value="1" <?php if (isset($attendance_calendar["march"]) && $attendance_calendar["march"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="march" id="march" value="0" <?php if (isset($attendance_calendar["march"]) && $attendance_calendar["march"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>April</td>
										<td><input type="radio" name="april" id="april" value="1" <?php if (isset($attendance_calendar["april"]) && $attendance_calendar["april"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="april" id="april" value="0" <?php if (isset($attendance_calendar["april"]) && $attendance_calendar["april"] == 0){echo "checked";} ?> ></td>
									</tr>
									<tr>
										<td>May</td>
										<td><input type="radio" name="may" id="may" value="1" <?php if (isset($attendance_calendar["may"]) && $attendance_calendar["may"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="may" id="may" value="0" <?php if (isset($attendance_calendar["may"]) && $attendance_calendar["may"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>June</td>
										<td><input type="radio" name="june" id="june" value="1" <?php if (isset($attendance_calendar["june"]) && $attendance_calendar["june"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="june" id="june" value="0" <?php if (isset($attendance_calendar["june"]) && $attendance_calendar["june"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>July</td>
										<td><input type="radio" name="july" id="july" value="1" <?php if (isset($attendance_calendar["july"]) && $attendance_calendar["july"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="july" id="july" value="0" <?php if (isset($attendance_calendar["july"]) && $attendance_calendar["july"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>August</td>
										<td><input type="radio" name="august" id="august" value="1" <?php if (isset($attendance_calendar["august"]) && $attendance_calendar["august"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="august" id="august" value="0" <?php if (isset($attendance_calendar["august"]) && $attendance_calendar["august"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>September</td>
										<td><input type="radio" name="september" id="september" value="1" <?php if (isset($attendance_calendar["september"]) && $attendance_calendar["september"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="september" id="september" value="0" <?php if (isset($attendance_calendar["september"]) && $attendance_calendar["september"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>October</td>
										<td><input type="radio" name="october" id="october" value="1" <?php if (isset($attendance_calendar["october"]) && $attendance_calendar["october"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="october" id="october" value="0"<?php if (isset($attendance_calendar["october"]) && $attendance_calendar["october"] == 0){echo "checked";} ?> ></td>
									</tr>
									<tr>
										<td>November</td>
										<td><input type="radio" name="november" id="november" value="1" <?php if (isset($attendance_calendar["november"]) && $attendance_calendar["november"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="november" id="november" value="0" <?php if (isset($attendance_calendar["november"]) && $attendance_calendar["november"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td>December</td>
										<td><input type="radio" name="december" id="december" value="1" <?php if (isset($attendance_calendar["december"]) && $attendance_calendar["december"] == 1){echo "checked";} ?> required></td>
										<td><input type="radio" name="december" id="december" value="0" <?php if (isset($attendance_calendar["december"]) && $attendance_calendar["december"] == 0){echo "checked";} ?>></td>
									</tr>
									<tr>
										<td colspan="3"><button type="submit" class="btn btn-primary btn-modify-mmc">Apply Changes</button></td>
									</tr>
								</tbody>
							</table>
						</form>
                    </div>
				</div>



            </div>
            <div class="col col-md-8">
                <div class="box box-solid">
                    <div class="box-header ">
                        <h3 class="box-title sy_title">School Year: <?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-darkgreen" href="<?php echo base_url() . 'admin/view-students-grade/'.$sy_data["sy_id"].'/'.$grade_level; ?>">View Grades</a>
                        </div>
                    </div>
                    <div class="box-body box-sy-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <!-- <div class="box-header ">
                                        <p class="box-title"><?php echo $grade_level; ?></p>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div> -->
                                    <div class="box-body no-padding">
                                       
                                        <div class="box box-darkgreen">
                                            <div class="box-header ">
                                                <h3 class="box-title">Students</h3>
                                                <div class="box-tools pull-right">
                                                    <span class="btn btn-maroon" data-toggle="modal" data-target="#modal-add-student"> <i class="fa fa-plus"></i> Add Student</span>
                                                </div>
                                            </div>
                                        
                                            <div class="box-body">
                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <th>Student Name</th>
                                                            <th style="width: 100px; text-align: center;">Option</th>
                                                        </tr>
                                                        </tr>
                                                        <tr v-if="getStudentsSchoolYear" v-for="student in getStudentsSchoolYear" >
                                                            <td><a :href="'<?php echo $grade_level; ?>/'+student.student_id">{{ student.first_name }} {{ student.last_name }}</a></td>
                                                            <td style="width: 100px; text-align: center;"> <span class="btn btn-maroon" @click="removeStudent( student.student_id, student.first_name +' '+ student.last_name, <?php echo $sy_data["sy_id"]; ?> )"> <i class="fa fa-trash"></i> </span> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body no-padding">
                                        <div class="box box-darkgreen">
                                            <div class="box-header ">
                                                <h3 class="box-title">Subjects</h3>
                                                <div class="box-tools pull-right">
                                                    <span class="btn btn-maroon" @click="addSubject()"> <i class="fa fa-plus"></i> Add Subject</span>
                                                </div>
                                            </div>
                                            <div class="box-body">
                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <th>Subject Name</th>
                                                            <th>Credit Unit</th>
                                                            <th>Semester</th>
                                                            <th>Assigned To</th>
                                                            <th>Option</th>
                                                        </tr>
                                                        </tr>
                                                        <tr v-if="subjects" v-for="sbj in subjects" >
                                                            <td>{{ sbj.subject_name }}</td>
                                                            <td>{{ sbj.credit_unit }}</td>
                                                            
                                                            <td>
                                                                <span v-if="sbj.semester == 1">1st</span>
                                                                <span v-else-if="sbj.semester == 2">2nd</span>
                                                                <span v-else="sbj.semester == 0">Full</span>
                                                            </td>
                                                            <td>
                                                                <span v-if="sbj.assigned_teacher != 0">{{ sbj.first_name }} {{ sbj.last_name }}</span>
                                                                <span v-else="sbj.assigned_teacher == 0">Unassigned</span>
                                                            </td>
                                                            <td> <span class="btn btn-warning" @click="updateSubject( sbj.subject_id )"><i class="fa fa-pencil"></i></span> <span class="btn btn-maroon" @click="deleteSubject( sbj.subject_id )"><i class="fa fa-trash"></i></span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>






<!--________________________________________________________MODALS________________________________________________________-->


<!-- ADD SUBJECT MODAL -->
<div class="modal fade" id="modal-add-subject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Subject</h4>
            </div>
            <form v-on:submit.prevent="submitAddSubject" action="#" id="addSubjectForm">
                <div class="modal-body">

                    <div class="responsedata_div" v-if="addresponseData">
                        <div class="callout " :class="addresponseData.status">
                            <p>{{ addresponseData.msg }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Subject Name:</label>
                        <div class="sbj-name-option"><span class="enter-new-name">Enter new subject</span> | <span class="select-from-list">Select from list</span></div>
                        <input type="hidden" class="form-control" id="" name="sy_id" placeholder="Enter subject name" value="<?php echo $sy_id; ?>" required>
                        <input type="hidden" class="form-control" id="" name="grade_level" placeholder="Enter subject name" value="<?php echo $grade_level; ?>" required>
                        <div class="enter-new-div">
                            <label for="">Enter new subject:</label>
                            <input type="text" class="form-control" id="enter-new" placeholder="Enter new subject name" name="subject_name" required>
                        </div>
                        <div class="select-div">
                            <label for="">Select subject name:</label>
                            <select class="form-control select2" style="width: 100%;" id="select-list">
                                <?php foreach ($subjects->result() as $sbj) { ?>
                                    <option value="<?php echo $sbj->subject_name; ?>"><?php echo $sbj->subject_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Credit Unit:</label>
                        <input type="number" class="form-control" step="any" name="credit_unit" placeholder="Enter credit unit" required>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control select2" style="width: 100%;" name="semester">
                            <option selected="selected" value="0">-- Select --</option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Assigned to:</label>
                        <select class="form-control select2" style="width: 100%;" name="assigned_teacher">
                            <option selected="selected" value="0">Unassigned</option>
                            <option v-for="teacher in teachers" :value="teacher.user_id" >{{ teacher.first_name }} {{ teacher.last_name }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-maroon">Submit</button>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- UPDATE SUBJECT MODAL -->
<div class="modal fade" id="modal-update-subject">
    <div class="modal-dialog" v-if="subjectToUpdate">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Subject</h4>
            </div>
            <form v-on:submit.prevent="submitUpdateSubject" action="#" id="updateSubjectForm">
                <div class="modal-body">

                    <div class="responsedata_div" v-if="responseData">
                        <div class="callout " :class="responseData.status">
                            <p>{{ responseData.msg }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Subject Name:</label>
                        <input type="hidden" class="form-control" id="" name="sy_id" placeholder="Enter subject name" v-model="subjectToUpdate.sy_id" required>
                        <input type="hidden" class="form-control" id="" name="grade_level" placeholder="Enter subject name" v-model="subjectToUpdate.grade_level"  required>
                        <input type="hidden" class="form-control" id="" name="subject_id" placeholder="Enter subject name" v-model="subjectToUpdate.subject_id"  required>
                        <input type="text" class="form-control" id="" name="subject_name" placeholder="Enter subject name" required v-model="subjectToUpdate.subject_name" >
                    </div>
                    <div class="form-group">
                        <label for="">Credit Unit:</label>
                        <input type="number" class="form-control" step="any" name="credit_unit" placeholder="Enter credit unit" v-model="subjectToUpdate.credit_unit" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control select2" style="width: 100%;" name="semester" v-model="subjectToUpdate.semester">
                            <option selected="selected" value="0">Full Semester</option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Assigned to:</label>
                        <select class="form-control select2" style="width: 100%;" name="assigned_teacher" v-model="subjectToUpdate.assigned_teacher">
                            <option selected="selected" value="0">Unassigned</option>
                            <option v-for="teacher in teachers" :value="teacher.user_id" >{{ teacher.first_name }} {{ teacher.last_name }}</option>
                        </select>
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
<!-- /.modal -->

<!-- ADD STUDENT MODAL -->
<div class="modal fade" id="modal-add-student">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Student</h4>
            </div>
            <form v-on:submit.prevent="submitAddStudent" action="#" id="addStudentForm">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="grade_level" value="<?php echo $grade_level; ?>"  required>
                    <input type="hidden" class="form-control" name="sy_id" value="<?php echo $sy_id; ?>"  required>
                    
                    <div class="form-group">
                        <label>Select student to add:</label>
                        <select class="form-control select2" style="width: 100%;"  name="student_id" data-placeholder="Select a State" id="student_id_to_add"  multiple="multiple" >
                            <option v-for="std in students" :value="std.student_id" >{{ std.first_name }} {{ std.last_name }}</option>
                        </select>
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
<!-- /.modal -->

<!-- DELETE MODAL -->
<div class="modal fade" id="confirmationDeleteSubject">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content confirmModal">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Do you want to delete this subject?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-maroon pull-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-darkgreen" @click="confirmationBtnDeleteSubject()" >Yes</button>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>




<div class="modal fade" id="confirmationRemoveStudent">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content confirmModal">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                   <p> Do you want to remove <span v-if="studentToRemove_name" style="color: #751517; font-weight: 600;">{{ studentToRemove_name }}</span>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-maroon pull-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-darkgreen" @click="confirmationBtnRemoveStudent()" >Yes</button>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>



<!-- VIEW FAILED GRADES AND SUBJECT NO GRADE MODAL -->

<div class="modal fade in" id="view-failed-grades-and-subjects-no-grade">
	<div class="modal-dialog box box-danger">
		<div class="modal-content ">
			<div class="modal-body">
				<div id="hdrData"></div>
				<div id="subjectsNoGradeTable"></div>
				<div id="failedGradesTable"></div>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!--________________________________________________________END_MODALS________________________________________________________-->


</div>
<!-- END  -->
