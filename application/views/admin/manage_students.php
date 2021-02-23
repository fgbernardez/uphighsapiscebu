<style>
#attendance table tr td{text-transform: unset;}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ text-transform: capitalize; }
table.dataTable{ font-size: 15px !important; }
.students-tbl .box-header{ padding: 20px 10px; }
.students-tbl .box-tools{ width: 550px; }

.students-tbl form .f-field{ display: inline-block; vertical-align: top; margin: 0px 5px;}
.students-tbl form select.form-control{ width: 160px;display: inline-block; }
.students-tbl form .search-btn{ line-height: 26px; }
.pagination > li > a.current {
    background: #3c8dbc;
    color: #fff;
    border-color: #3c8dbc;
}

</style>

<div id="student-app">

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


        <!-- <div class="box box-darkgreen">
            <div class="box-header">
                <h3 class="box-title">Students</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-maroon" data-toggle="modal" data-target="#modal-add-student"><i class="fa fa-plus"></i> Add Student</button>
                </div>
            </div>
            <div class="box-body">

                    <table id="students-tbl" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>LRN</th>
                                <th>Student No.</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Grade Level</th>
                                <th>School Year</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in students">
                                <td>{{ student.lrn }}</td>
                                <td>{{ student.student_no }}</td>
                                <td>{{ student.name }}</td>
                                <td>{{ student.age }}</td>
                                <td>{{ student.gender }}</td>
                                <td>
                                    <span v-if="student.status == 1" class="label label-success">Active</span>
                                    <span v-else-if="student.status == 0" class="label label-danger">Inactive</span>
                                </td>
                                <td>{{ student.grade_level }}</td>
                                <td>{{ student.schoolyear }}</td>
                                <td> <span class="fa fa-pencil btn btn-warning" @click="updateStudent( student.student_id )"></span>  <span class="fa fa-trash btn btn-maroon" @click="deleteStudent( student.student_id )"></span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>LRN</th>
                                <th>Student No.</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Grade Level</th>
                                <th>School Year</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div> -->
            


        <button class="btn btn-maroon" data-toggle="modal" data-target="#modal-add-student" style="margin-bottom: 5px;"><i class="fa fa-plus"></i> Add Student</button>
        
        <div class="box box-darkgreen students-tbl" >
            <div class="box-header">
                <h3 class="box-title">Students</h3>
                <div class="box-tools">
                    <form action="<?php echo base_url("admin/manage-students") ?>" method="POST">
                        <div class="form-group">
                            <div class="f-field">
                                <label>Grade Level: </label>
                                <select class="form-control" name="grade_level" required>
                                    <option value="">Select Grade</option>
                                    <option value="grade-7">Grade 7</option>
                                    <option value="grade-8">Grade 8</option>
                                    <option value="grade-9">Grade 9</option>
                                    <option value="grade-10">Grade 10</option>
                                    <option value="grade-11">Grade 11</option>
                                    <option value="grade-12">Grade 12</option>
                                </select>
                            </div>
                            <div class="f-field">
                                <label>School Year: </label>
                                <select class="form-control" name="sy_id" required>
                                    <option value="">Select School Year</option>

                                    <?php foreach( $schoolyears as $sy ){ ?>
                                        <option value="<?php echo $sy["sy_id"]; ?>"><?php echo $sy["start_year"] .'-'.$sy["end_year"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="f-field" style="width: 34px;">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary search-btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>
                    </form>   
                
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>LRN</th>
                            <th>Student No.</th>
                            <th>Name</th>
                            <th>Birthdate</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach( $students->result() as $std ){ ?>
                            <tr>
                                <td><?php echo $std->lrn; ?></td>
                                <td><?php echo $std->student_no; ?></td>
                                <td><?php echo $std->first_name.' '.$std->last_name; ?></td>
                                <td><?php echo $std->birthdate; ?></td>
                                <td><?php echo $std->age; ?></td>
                                <td><?php echo $std->gender; ?></td>
                                <td>
                                    <?php
                                        if( $std->status == 0 ){
                                            echo '<span class="label label-danger">Inactive</span>';
                                        } else if($std->status == 1 )
                                        {
                                            echo '<span class="label label-success">Active</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <span class="fa fa-pencil btn btn-warning" @click="updateStudent( <?php echo $std->student_id; ?> )"></span>
                                    <span class="fa fa-trash btn btn-maroon" @click="deleteStudent( <?php echo $std->student_id; ?> )"></span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    
                    <tfoot>
                            <tr>
                                <th>LRN</th>
                                <th>Student No.</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->

             <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </ul>
            </div>
            
        </div>


          
    </section>
</div>


<!-- ADD STUDENT MODAL -->
<div class="modal fade" id="modal-add-student">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Student</h4>
            </div>
            <form  v-on:submit.prevent="submitAddStudent" action="#" id="addStudentForm">
                <div class="modal-body">

                    <div v-if="responseData" id="response_msg">
                        <div class="callout " :class="'callout-'+responseData.status">
                            <p>{{ responseData.msg }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">First name: </label>
                        <input type="text" class="form-control" id="" name="first_name" placeholder="Enter name" required>
                    </div>
					<div class="form-group">
                        <label for="">Last name: </label>
                        <input type="text" class="form-control" id="" name="last_name" placeholder="Enter name" required>
                    </div>

                    <div class="form-group">
                        <label>Birthdate:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="birthdate" name="birthdate">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Gender:</label>
                        <select class="form-control" name="gender">
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="">Student No.:</label>
                        <input type="text" class="form-control" id="" name="student_no" placeholder="Enter student no" required>
                    </div>
                    <div class="form-group">
                        <label for="">LRN:</label>
                        <input type="text" class="form-control" id="" name="lrn" placeholder="Enter LRN" required>
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



<!-- ADD UPDATE MODAL -->
<div class="modal fade" id="modal-update-student">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Student</h4>
            </div>
            <form  v-on:submit.prevent="submitUpdateStudent" action="#" id="updateStudentForm" v-if="studentToUpdate">
                <div class="modal-body">

                    <div v-if="updateResponse" id="upt_response_msg">
                        <div class="callout " :class="'callout-'+updateResponse.status">
                            <p>{{ updateResponse.msg }}</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="">First name: </label>
                        <input type="hidden" class="form-control"  name="student_id" placeholder="Enter name" v-model="studentToUpdate.student_id">
                        <input type="text" class="form-control" name="first_name" placeholder="Enter name" v-model="studentToUpdate.first_name">
                    </div>
					<div class="form-group">
                        <label for="">Last name: </label>
                        <input type="hidden" class="form-control"  name="student_id" placeholder="Enter name" v-model="studentToUpdate.student_id">
                        <input type="text" class="form-control" name="last_name" placeholder="Enter name" v-model="studentToUpdate.last_name">
                    </div>
                    <div class="form-group">
                        <label>Birthdate:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right ss" id="uptbirthdate" name="birthdate" v-model="studentToUpdate.birthdate">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Gender:</label>
                        <select class="form-control" name="gender" v-model="studentToUpdate.gender">
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Student No.:</label>
                        <input type="text" class="form-control" id="" name="student_no" placeholder="Enter student no" v-model="studentToUpdate.student_no">
                    </div>
                    <div class="form-group">
                        <label for="">LRN:</label>
                        <input type="text" class="form-control" id="" name="lrn" placeholder="Enter LRN" v-model="studentToUpdate.lrn">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <div v-if="studentToUpdate.status == 1">
                            <select class="form-control select3" style="width: 100%;" name="status" >
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div v-else-if="studentToUpdate.status == 0" >
                            <select class="form-control select2" style="width: 100%;" name="status">
                                <option value="1" >Active</option>
                                <option value="0" selected>Inactive</option>
                            </select>
                        </div>
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



<!-- DELETE MODAL -->
<div class="modal fade" id="confirmationDeleteStudentModal">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content confirmModal">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                Do you want to delete this student?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-maroon pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-darkgreen" @click="confirmationBtnDeleteStudent()" >Yes</button>
            </div>
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- NOTIFICATION -->
<div class="modal fade " id="deleteResponseModal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content notifymodal">
                        <div class="modal-header">
                            <h4 class="modal-title">Notification</h4>
                        </div>
                        <div class="modal-body" v-if="deleteResponse">
                            <div v-if="deleteResponse.code == 200">
                                <span class="fa fa-check" ></span> {{ deleteResponse.msg }}
                            </div>
                            <div v-else-if="deleteResponse.code == 204">
                                <i class="fa fa-exclamation-circle"></i></span> {{ deleteResponse.msg }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-maroon pull-right" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>


</div>
<!-- END APP -->
