<?php
    $student_grade_level = explode("-",$student_data["grade_level"]);
    $section = "";
    $std_grade_level = "";
    switch ( $student_data["grade_level"] ){
        case "grade-7":
            $section = "Bartlett";
            $std_grade_level = "Grade 7";
            break;
        case "grade-8":
            $section = "Villamor";
            $std_grade_level = "Grade 8";
            break;
        case "grade-9":
            $section = "Benton";
            $std_grade_level = "Grade 9";
            break;
        case "grade-10":
            $section = "Palma";
            $std_grade_level = "Grade 10";
    
            break;
        case "grade-11":
            $section = "Bocobo";
            $std_grade_level = "Grade 11";
            break;
        case "grade-12":
            $section = "Sison";
            $std_grade_level = "Grade 12";
            break;
        default:
            $section = "Undefined";
    }
?>
<style>
.behavior{display: none;}
#attendance table tr td{text-transform: unset;}
.box-sidebar ul li a.active{ background: #751517;color: white; }
.view_student .header_view img.comp_logo {margin-bottom: 5px !important}
.view_student .header_view p{color: #751517 !important; text-align: center; margin: 0 0 0px !important; font-size: 13px !important;}
.header_view .hdr_content{ position: relative; width: 400px; margin: 0 auto; padding-left: 82px;float: left;}
.view_student .header_view figure { position: absolute; left: 10px; top: -5px; }
.view_student .data_left{ float: left !important; }
.view_student .data_right{ float: right !important;}
.std-rp{margin-top: -65px;}
.box-sidebar ul.student-list { padding: 10px 5px; height: 400px; display: block; overflow-y: auto; }
.h2-header{text-align: center; font-size: 16px; padding: 10px 0px; background: #222d32; color: white; font-weight: 600; margin-bottom: 15px;}
#attendance tr td, #attendance tr th{text-align: center;}
#attendance .month { background: #222d32; color: white; text-align: center; }
#attendance .month.active { background: #751517; }
.schooldays-div .form-group, .presentdays-div .form-group, .timestardydays-div .form-group{
	width: 48%;
	display: inline-block;
	vertical-align: top;
	margin: 5px;
}
/* #attendance .month {text-align: center; } */
/* #attendance .not-active{opacity: 0;} */
@media print{
    /* HIde every other element */
    body *{
        visibility: hidden !important;
    }
    a[href]::after { content: none !important; }
    /*  then displaying print container elements */
    #printSudent, #printSudent *{
        visibility: visible !important;
    } 
    /* adjusting position that always start from top left*/
    #printSudent{
        margin-top: -755px !important;
    }

    #printSudent{ font-size: 11px !important; }
    /* .sample{
        position: absolute;
        left: 0px;
        right: 0px;
    } */
    .bx-title{ display: none !important; }
    .box-header{ padding: 0px !important; }
    .box{ margin-bottom: 10px; }
    .break_new_page{page-break-after: always;}
    .view_student .content_view p{ margin: 0 0 -4px !important}
    .view_student .content_view p span{ color: #751517 !important;  }
    .hdr_content .comp_logo{ width: 60px !important; }
    .ftr_content_view{display: block !important;}
    /* .view_student .header_view{ margin-top: 40px; } */
    .view_student .content_view { margin-top: -30px !important; }
    
    .view_student .header_view img.comp_logo {margin-bottom: 5px !important}
    .view_student .header_view p{color: #751517 !important; text-align: center; margin: 0 0 0px !important; font-size: 13px !important;}
    .header_view .hdr_content{ position: relative; width: 400px; margin: 0 auto; padding-left: 82px; float: left;}
    .view_student .header_view figure{ position: absolute; left: 35px; top: -5px;}
    .view_student .data_left{ float: left !important; }
    .view_student .data_right{ float: right !important;}
    .std-rp{margin-top: -25px !important;}

	.ftr_content_view .data_left, .ftr_content_view .data_center, .ftr_content_view .data_right{
		display: inline-block;
		vertical-align: top;
		float: none !important;
	}
	.ftr_content_view .data_right {
		text-align: right;
		width: 150px;
	}
    
    .view_student .content_view .content_view_title { font-weight: 600; text-align: center; text-transform: uppercase; font-size: 12px !important; color: #751517 !important; margin-top: 0px; margin-bottom: 2px;}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{ padding: 0px !important;font-size: 12px !important; }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ border: none !important; text-align: center !important;  }
    .view_student .content_view table tr th:first-child, .view_student .content_view table tr td:first-child{ width: 200px !important; text-align: left !important;}
    footer {page-break-after: always !important;}
    .behavior, .grades{width: 49% !important;}
    .view_student .content_view p{margin: 0 0 3px !important;}
    .ftr_content_view h4{ font-weight: 600; color: #751517 !important; text-align: center; font-size: 12px !important; }
    .ftr_content_view p span{ text-decoration: underline; }
    .ftr_content_view p small{ display: block; margin-right: 35px;color: #751517;}
    .ftr_content_view .data_right{ text-align: right; }
    #attendance table tr th:last-child, #attendance table tr td:last-child{ display: none !important; }
    .grades table tr th:last-child, .grades table tr td:last-child{ display: none !important; }
    .legend{ display: block; }
    .legend p{ margin: 0 0 0px !important; color: #751517 !important; }
	/* #attendance table tr th{ color: black !important; background: none !important; } */
	#attendance .month { background: none !important; color: black !important; text-align: center; }

    
    

}   

</style>
<div id="admin-manage-student">
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


    <div class="row">
        <div class="col col-md-3">
            <div class="box box-solid no-padding box-sidebar">
                <div class="box-body no-padding">
                    <ul class="">
                        <li class="header">GRADE LEVELS</li>
                        <li>
                            <a href="<?php echo base_url( 'admin/SY/'.$sy_id.'/grade-7' ); ?>" <?php if( $grade_level == "grade-7" ){ echo 'class="active"'; } ?>>
                                <i class="fa fa-graduation-cap"></i> <span>Grade 7</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url( 'admin/SY/'.$sy_id.'/grade-8' ); ?>" <?php if( $grade_level == "grade-8" ){ echo 'class="active"'; } ?>>
                                <i class="fa fa-graduation-cap"></i> <span>Grade 8</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url( 'admin/SY/'.$sy_id.'/grade-9' ); ?>" <?php if( $grade_level == "grade-9" ){ echo 'class="active"'; } ?>>
                                <i class="fa fa-graduation-cap"></i> <span>Grade 9</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url( 'admin/SY/'.$sy_id.'/grade-10' ); ?>" <?php if( $grade_level == "grade-10" ){ echo 'class="active"'; } ?>>
                                <i class="fa fa-graduation-cap"></i> <span>Grade 10</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url( 'admin/SY/'.$sy_id.'/grade-11' ); ?>" <?php if( $grade_level == "grade-11" ){ echo 'class="active"'; } ?>>
                                <i class="fa fa-graduation-cap"></i> <span>Grade 11</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url( 'admin/SY/'.$sy_id.'/grade-12' ); ?>" <?php if( $grade_level == "grade-12" ){ echo 'class="active"'; } ?>>
                                <i class="fa fa-graduation-cap"></i> <span>Grade 12</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box box-solid no-padding box-sidebar">
                <div class="box-body no-padding">
                    <h2 class="h2-header">STUDENTS</h2>
                    <ul class="student-list">
                        <?php foreach( $students->result() as $std ){ ?>
                            <li><a <?php if( $std->student_id == $student_data["student_id"] ) { echo 'class="active"'; } ?> href="<?php echo base_url("admin/SY/").$sy_id.'/'.$grade_level.'/'.$std->student_id; ?>"><?php echo $std->first_name.' '.$std->last_name; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col col-md-9">

                

                <div class="box box-solid">
                    <div class="box-header ">
                        <!-- <h3 class="box-title sy_title">School Year: <?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></h3> -->
                        <div class="box-tools pull-right" style="z-index: 10;">
                            <button class="btn btn-maroon" onclick="window.print();"><i class="fa fa-print"></i>  Print</button>
                        </div>
                    </div>

                    <div class="box-body view_student awd" id="printSudent" >
                        <div class="sample">
                    
                        <div class="header_view">
                            <div class="hdr_content">
                                <figure><img src="<?php echo base_url() ?>assets/custom/images/comp-logo.png" alt="Company Logo" class="comp_logo" style="width: 100px;max-width: 100%;"></figure>
                                <p>University of the Philippines High School Cebu</p>
                                <p>Gorordo Avenue, Lahug, Cebu City</p>
                                <p>Tel #: (032) 232-8187 local 301</p>
                            </div>
                        </div>
                        <div class="content_view">
                            <div class="row">

                                <div class="col col-md-5 col-md-offset-4 data_right std-rp" >
                                    <h5 style="font-weight: bold; color: #751517;">REPORT CARD</h5>
                                    <p>School Year: <span><?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></span></p>
                                    <p>Grade: <span  style="margin-right: 20px;"><?php echo $std_grade_level; ?></span>    Section: <span><?php echo $section; ?></span></p>
                                    <p>Age: <span style="margin-right: 20px;"><?php echo $student_data["age"]; ?></span>Gender: <span><?php echo $student_data["gender"]; ?></span></p>
                                    <p>LRN: <span><?php echo $student_data["lrn"]; ?></span></p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col col-md-3" style="display: inline-block;">
                                    <p>Student No: <span><?php echo $student_data["student_no"]; ?></span></p>
                                </div>
                                <div class="col col-md-6" style="display: inline-block;">
                                    <p>Name: <span><?php echo $student_data["first_name"].' '.$student_data["last_name"]; ?></span> </p>
                                </div>
                                <div class="clearfix"></div>


                                <div class="col col-md-12 data_left grades">
                                    <div class="box box-solid" id="">
                                        <div class="box-header">
                                            <h4 class="content_view_title bx-title" >Grades</h4>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>1ST</th>
                                                    <th>2ND</th>
                                                    <th>3RD</th>
                                                    <th>4TH</th>
                                                    <!-- <th>Credit Unit</th> -->
                                                    <th></th>
                                                </tr>
                                                <!-- <?php foreach( $student_grades["subject_grade"] as $sbj_grade ){ ?>
                                                    <tr>
                                                        <td><?php echo $sbj_grade["subject_name"]; ?></td>
                                                        <?php if( $sbj_grade["semester"] == 1 ){ ?>
                                                            <td><?php echo $sbj_grade["quarter_first"]; ?></td>
                                                            <td><?php echo $sbj_grade["quarter_second"]; ?></td>
                                                            <td> </td>
                                                            <td> </td>
                                                        <?php } elseif( $sbj_grade["semester"] == 2 ){ ?>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td><?php echo $sbj_grade["quarter_third"]; ?></td>
                                                            <td><?php echo $sbj_grade["quarter_fourth"]; ?></td>
                                                        <?php } else { ?>
                                                            <td><?php echo $sbj_grade["quarter_first"]; ?></td>
                                                            <td><?php echo $sbj_grade["quarter_second"]; ?></td>
                                                            <td><?php echo $sbj_grade["quarter_third"]; ?></td>
                                                            <td><?php echo $sbj_grade["quarter_fourth"]; ?></td>
                                                        <?php } ?>
                                                        <td><?php echo $sbj_grade["credit_unit"]; ?></td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?> -->
                                                <?php foreach( $student_grades["subject_grade"] as $sbj_grade ){ ?>
                                                    <tr>
                                                        <td><?php echo $sbj_grade["subject_name"]; ?></td>
                                                        <?php if( $sbj_grade["semester"] == 1 ){ ?>
                                                            <td <?php if($sbj_grade["quarter_first"] < 75 && $sbj_grade["quarter_first"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_first"]; ?>
                                                            </td>
                                                            <td <?php if($sbj_grade["quarter_second"] < 75 && $sbj_grade["quarter_second"] > 0){echo 'style="color: #751517;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_second"]; ?>
                                                            </td>
                                                            <td> </td>
                                                            <td> </td>
                                                        <?php } elseif( $sbj_grade["semester"] == 2 ){ ?>
                                                            <td> </td>
                                                            <td> </td>
                                                            <td <?php if($sbj_grade["quarter_third"] < 75 && $sbj_grade["quarter_third"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_third"]; ?>
                                                            </td>
                                                            <td <?php if($sbj_grade["quarter_fourth"] < 75 && $sbj_grade["quarter_fourth"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_fourth"]; ?>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td <?php if($sbj_grade["quarter_first"] < 75 && $sbj_grade["quarter_first"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_first"]; ?>
                                                            </td>
                                                            <td <?php if($sbj_grade["quarter_second"] < 75 && $sbj_grade["quarter_second"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_second"]; ?>
                                                            </td>
                                                            <td <?php if($sbj_grade["quarter_third"] < 75 && $sbj_grade["quarter_third"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_third"]; ?>
                                                            </td>
                                                            <td <?php if($sbj_grade["quarter_fourth"] < 75 && $sbj_grade["quarter_fourth"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                                <?php echo $sbj_grade["quarter_fourth"]; ?>
                                                            </td>
                                                        <?php } ?>
                                                        <!-- <td><?php echo $sbj_grade["credit_unit"]; ?></td> -->
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
                                                <!-- <tr v-if="grade_average">
                                                    <td style="font-weight: 600; color: #751517 !important;">Average</td>
                                                    <td style="font-weight: 600; color: #751517 !important;">{{ grade_average.first_grading }}</td>
                                                    <td style="font-weight: 600; color: #751517 !important;">{{ grade_average.second_grading }}</td>
                                                    <td style="font-weight: 600; color: #751517 !important;">{{ grade_average.third_grading }}</td>
                                                    <td style="font-weight: 600; color: #751517 !important;">{{ grade_average.fourth_grading }}</td>
                                                    <td><button class="btn btn-warning" @click="averageModal()"><span class="fa fa-pencil"></span></button></td>
                                                </tr> -->
                                                <tr>
                                                    <td style="font-weight: 600; color: #751517 !important;">Average</td>
                                                    <td style="font-weight: 600; color: #751517 !important;"><?php echo $student_grades["total_avg_first"]; ?></td>
                                                    <td style="font-weight: 600; color: #751517 !important;"><?php echo $student_grades["total_avg_second"]; ?></td>
                                                    <td style="font-weight: 600; color: #751517 !important;"><?php echo $student_grades["total_avg_third"]; ?></td>
                                                    <td style="font-weight: 600; color: #751517 !important;"><?php echo $student_grades["total_avg_fourth"]; ?></td>
                                                    <!-- <td><button class="btn btn-warning" @click="averageModal()"><span class="fa fa-pencil"></span></button></td> -->
                                                    <td></td>
                                                </tr>
                                                <tr v-if="grade_average">
                                                    <td style="font-weight: 600; color: #751517 !important;">GENERAL WEIGHTED AVERAGE</td>
                                                    <td colspan="4" style="text-align: center;color: #751517 !important;font-weight: 600;"><?php echo $student_grades["total_general_avg"]; ?></td>
                                                    <td></td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>

                                <div class="col col-md-12 data_right behavior">
                                    <div class="box box-solid">
                                        <div class="box-header">
                                            <h4 class="content_view_title bx-title" >Behavior</h4>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body table-responsive no-padding" v-if="behavior_first_grading">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th> </th>
                                                        <th>1ST</th>
                                                        <th>2ND</th>
                                                        <th>3RD</th>
                                                        <th>4TH</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Manners</td>
                                                        <td>{{ behavior_first_grading.manners }}</td>
                                                        <td>{{ behavior_second_grading.manners }}</td>
                                                        <td>{{ behavior_third_grading.manners }}</td>
                                                        <td>{{ behavior_fourth_grading.manners }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Appearance</td>
                                                        <td>{{ behavior_first_grading.appearance }}</td>
                                                        <td>{{ behavior_second_grading.appearance }}</td>
                                                        <td>{{ behavior_third_grading.appearance }}</td>
                                                        <td>{{ behavior_fourth_grading.appearance }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dependability</td>
                                                        <td>{{ behavior_first_grading.dependability }}</td>
                                                        <td>{{ behavior_second_grading.dependability }}</td>
                                                        <td>{{ behavior_third_grading.dependability }}</td>
                                                        <td>{{ behavior_fourth_grading.dependability }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Cooperation</td>
                                                        <td>{{ behavior_first_grading.cooperation }}</td>
                                                        <td>{{ behavior_second_grading.cooperation }}</td>
                                                        <td>{{ behavior_third_grading.cooperation }}</td>
                                                        <td>{{ behavior_fourth_grading.cooperation }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Attendance</td>
                                                        <td>{{ behavior_first_grading.attendance }}</td>
                                                        <td>{{ behavior_second_grading.attendance }}</td>
                                                        <td>{{ behavior_third_grading.attendance }}</td>
                                                        <td>{{ behavior_fourth_grading.attendance }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 600; color: #751517 !important;">Average</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_first_grading.average1 }}</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_second_grading.average1 }}</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_third_grading.average1 }}</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_fourth_grading.average1 }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th> </th>
                                                        <th>1ST</th>
                                                        <th>2ND</th>
                                                        <th>3RD</th>
                                                        <th>4TH</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Initiative & Resourcefulness</td>
                                                        <td>{{ behavior_first_grading.initiative_and_resourcefulness }}</td>
                                                        <td>{{ behavior_second_grading.initiative_and_resourcefulness }}</td>
                                                        <td>{{ behavior_third_grading.initiative_and_resourcefulness }}</td>
                                                        <td>{{ behavior_fourth_grading.initiative_and_resourcefulness }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Leadership</td>
                                                        <td>{{ behavior_first_grading.leadership }}</td>
                                                        <td>{{ behavior_second_grading.leadership }}</td>
                                                        <td>{{ behavior_third_grading.leadership }}</td>
                                                        <td>{{ behavior_fourth_grading.leadership }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: 600; color: #751517 !important;">Average</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_first_grading.average2 }}</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_second_grading.average2 }}</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_third_grading.average2 }}</td>
                                                        <td style="font-weight: 600; color: #751517 !important;">{{ behavior_fourth_grading.average2 }}</td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <div class="legend">
                                                <h4 class="content_view_title" style="text-align: left; text-transform: capitalize;font-size: 13px;">Legend</h4>
                                                <p>1.00 - 1.50 - Outstanding (O)</p>
                                                <p>1.51 - 2.50 - Very Satisfactory (VS)</p>
                                                <p>2.51 - 3.50 - Satisfactory (S)</p>
                                                <p>3.51 - 4.50 - Moderately Satisfactory (MS)</p>
                                                <p>4.51 - 5.00 - Needs Improvement (NI)</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col col-md-12">
                                    <div class="box box-solid" id="attendance">
                                        <div class="box-header">
                                            <h4 class="content_view_title" >Attendance</h4>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tbody v-if="monthsClass">
                                                    <tr>
														<th></th>
														<th class="month" v-if="monthsClass.october == 1">Oct</th>
                                                        <th class="month" v-if="monthsClass.november == 1">Nov</th>
                                                        <th class="month" v-if="monthsClass.december == 1">Dec</th>
														<th class="month" v-if="monthsClass.january == 1">Jan</th>
                                                        <th class="month" v-if="monthsClass.february == 1">Feb</th>
                                                        <th class="month" v-if="monthsClass.march == 1">Mar</th>
                                                        <th class="month" v-if="monthsClass.april == 1">Apr</th>
														<th class="month" v-if="monthsClass.may == 1">May</th>
														<th class="month" v-if="monthsClass.june == 1">Jun</th>
														<th class="month" v-if="monthsClass.july == 1">Jul</th>
                                                        <th class="month" v-if="monthsClass.august == 1">Aug</th>
                                                        <th class="month" v-if="monthsClass.september == 1">Sep</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr v-if="school_days">
                                                        <td style="font-weight: 600; color: #751517 !important;">No. of School Days:</td>
                                                        <td v-if="monthsClass.october == 1">{{ school_days.october }}</td>
                                                        <td v-if="monthsClass.november == 1">{{ school_days.november }}</td>
                                                        <td v-if="monthsClass.december == 1">{{ school_days.december }}</td>
                                                        <td v-if="monthsClass.january == 1">{{ school_days.january }}</td>
                                                        <td v-if="monthsClass.february == 1">{{ school_days.february }}</td>
                                                        <td v-if="monthsClass.march == 1">{{ school_days.march }}</td>
                                                        <td v-if="monthsClass.april == 1">{{ school_days.april }}</td>
                                                        <td v-if="monthsClass.may == 1">{{ school_days.may }}</td>
                                                        <td v-if="monthsClass.june == 1">{{ school_days.june }}</td>
                                                        <td v-if="monthsClass.july == 1">{{ school_days.july }}</td>
                                                        <td v-if="monthsClass.august == 1">{{ school_days.august }}</td>
                                                        <td v-if="monthsClass.september == 1">{{ school_days.september }}</td>
                                                        <td>{{ school_days.total }}</td>
                                                        <td> <button class="btn btn-warning" @click="schoolDaysModal()"><span class="fa fa-pencil"></span></button> </td>
                                                    </tr>
                                                    <tr v-if="present_days">
                                                        <td style="font-weight: 600; color: #751517 !important;">No. of Days Present:</td>
                                                        <td v-if="monthsClass.october == 1">{{ present_days.october }}</td>
                                                        <td v-if="monthsClass.november == 1">{{ present_days.november }}</td>
                                                        <td v-if="monthsClass.december == 1">{{ present_days.december }}</td>
														<td v-if="monthsClass.january == 1">{{ present_days.january }}</td>
                                                        <td v-if="monthsClass.february == 1">{{ present_days.february }}</td>
                                                        <td v-if="monthsClass.march == 1">{{ present_days.march }}</td>
                                                        <td v-if="monthsClass.april == 1">{{ present_days.april }}</td>
                                                        <td v-if="monthsClass.may == 1">{{ present_days.may }}</td>
                                                        <td v-if="monthsClass.june == 1">{{ present_days.june }}</td>
                                                        <td v-if="monthsClass.july == 1">{{ present_days.july }}</td>
                                                        <td v-if="monthsClass.august == 1">{{ present_days.august }}</td>
                                                        <td v-if="monthsClass.september == 1">{{ present_days.september }}</td>
														<td>{{ present_days.total }}</td>
                                                        <td> <button class="btn btn-warning" @click="presentDaysModal()"><span class="fa fa-pencil"></span></button> </td>
                                                    </tr>
                                                    <tr v-if="times_tardy">
                                                        <td style="font-weight: 600; color: #751517 !important;">No. of Times Tardy:</td>
                                                        <td v-if="monthsClass.october == 1">{{ times_tardy.october }}</td>
                                                        <td v-if="monthsClass.november == 1">{{ times_tardy.november }}</td>
                                                        <td v-if="monthsClass.december == 1">{{ times_tardy.december }}</td>
														<td v-if="monthsClass.january == 1">{{ times_tardy.january }}</td>
                                                        <td v-if="monthsClass.february == 1">{{ times_tardy.february }}</td>
                                                        <td v-if="monthsClass.march == 1">{{ times_tardy.march }}</td>
                                                        <td v-if="monthsClass.april == 1">{{ times_tardy.april }}</td>
                                                        <td v-if="monthsClass.may == 1">{{ times_tardy.may }}</td>
                                                        <td v-if="monthsClass.june == 1">{{ times_tardy.june }}</td>
                                                        <td v-if="monthsClass.july == 1">{{ times_tardy.july }}</td>
                                                        <td v-if="monthsClass.august == 1">{{ times_tardy.august }}</td>
                                                        <td v-if="monthsClass.september == 1">{{ times_tardy.september }}</td>
														<td>{{ times_tardy.total }}</td>
                                                        <td> <button class="btn btn-warning" @click="timesTardyModal()"><span class="fa fa-pencil"></span></button> </td>
                                                    </tr>
												</tbody>
												<tbody v-else>
													<tr>
														<td style="text-align: center"><a href="<?php echo base_url('admin/SY/'.$sy_id.'/'.$grade_level); ?>"  class="btn btn-warning">Please update Month's Class!</a></td>
													</tr>
												</tbody>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="ftr_view" >
                            <div class="ftr_content_view">
                                <h4>CERTIFICATE OF ADMISSION/TRANSFER</h4>
                                <div class="data_left">
                                    Eligible for admission/transfer to ___________________________<br/>
                                    Date issued: <span style="font-weight: 600; color: #751517 !important;"><?php echo date('m/d/Y'); ?></span>
                                    <p>Parent's Signature: ___________________________</p>
                                </div>
                                <div class="data_right">
                                    Lacks credit/s in ____________________________<br/>
                                    <p><span style="font-weight: 600; color: #751517 !important; text-transform: uppercase;"> <?php echo $principalData["first_name"] . ' '.$principalData["last_name"]; ?></span> <small>Principal</small> </p>

                                </div>
                            </div>
                        </div>-->


					<!--	<div class="ftr_view">
							<div class="ftr_content_view">
								<h4>CERTIFICATE OF ADMISSION/TRANSFER</h4>
								<div class="data_left">
									Eligible for admission/transfer to ___________________________<br/>
									<p style="margin-top: 10px;">Lacks credit/s in ____________________________</p>
									<p  style="margin-top: 10px;">Date issued: <span style="font-weight: 600; color: #751517 !important;"><?php echo date('m/d/Y'); ?></span></p>
								</div>
								<div class="data_center" style="margin-top: 30px;">
									<p style="margin-left: 20px;">Parent's Signature: ___________________________</p>		
								</div>
								<div class="data_right" style="margin-top: 30px;">
									<p><span style="font-weight: 600; color: #751517 !important; text-transform: uppercase;"> <?php echo $principalData["first_name"] . ' '.$principalData["last_name"]; ?></span> <small>Principal</small> </p>
								</div>
							</div>
						</div> 
						
						
                    
                        </div>
                    </div>

                </div>
        </div>
    </div> -->
    
    <div class="ftr_view">
                    <div class="ftr_content_view">
                        <h4>CERTIFICATE OF ADMISSION/TRANSFER</h4>
                        <div class="data_left">
                            <p style="margin-top: 5px;">Eligible for admission/transfer to ___________________________</p>
							<p style="margin-top: 5px;">Lacks credit/s in ____________________________</p>
							<p style="margin-top: 5px;">Date issued: <span style="font-weight: 600; color: #751517 !important;"><?php echo date('m/d/Y'); ?></p>
							<p><span style="margin-top: 20px; font-weight: 500; color: #751517 !important;"> <img src="http://uphscebugradingsystem.com/assets/custom/images/Digital_Final.png" style="width:50px;width:50px;"> This is a digitally-generated file. The digital signature of the Principal authenticates this document.</span> </p> 
                        </div>
						<div class="data_center">
							<p style="margin-top: 10px;">Parent's Signature:___________________________</p>	
							<p><span style="font-weight: 500; color: #751517 !important; text-transform: uppercase;"> <?php echo $principalData["first_name"] . ' '.$principalData["last_name"]; ?></span><small style = "font-weight: 500; color: color: #751517 !important;">Principal</small></p>
						</div>
                            <!--<p><span style="margin-top: 20px; font-weight: 500; color: #751517 !important;"> <img src="http://uphscebugradingsystem.com/assets/custom/images/Digital_Final.png" style="width:50px;width:50px;"> This is a digitally-generated file. The digital signature of the Principal authenticates this document.</span> </p> -->
                    </div>
                </div>
</section>



<!-- AVERAGE MODAL -->
        <div class="modal fade" id="modal-average">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="text-align: center; text-transform: uppercase; font-weight: bold; color: #751517;">Average</h4>
                    </div>
                    <form v-on:submit.prevent="submitAverageForm" action="#" id="averageForm"  v-if="grade_average">
                        <div class="modal-body">

                            <div class="responsedata_div" v-if="responseData">
                                 <div class="callout " :class="responseData.status">
                                     <p>{{ responseData.msg }}</p>
                                 </div>
                             </div>
                            <input type="hidden" class="form-control" name="sy_id" value="<?php echo $sy_id; ?>" >
                            <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_data["student_id"]; ?>" >
                            <div class="form-group">
                                <label for="exampleInputEmail1">1ST Grading</label>
                                <input type="number" class="form-control" id="" step="any" name="first_grading" placeholder="Enter grade" :value="grade_average.first_grading">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">2ND Grading</label>
                                <input type="number" class="form-control" id="" step="any" name="second_grading"  placeholder="Enter grade" :value="grade_average.second_grading">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">3RD Grading</label>
                                <input type="number" class="form-control" id="" step="any" name="third_grading" placeholder="Enter grade" :value="grade_average.third_grading">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">4TH Grading</label>
                                <input type="number" class="form-control" id="" step="any" name="fourth_grading" placeholder="Enter grade" :value="grade_average.fourth_grading">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">GENERAL WEIGHTED AVERAGE</label>
                                <input type="number" class="form-control" id="" step="any" name="general_average" placeholder="Enter grade" :value="grade_average.general_average">
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


        <div class="modal fade" id="modal-school-days" v-if="monthsClass">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="text-align: center; text-transform: uppercase; font-weight: bold; color: #751517;">No. of School Days</h4>
                    </div>
                    <form v-on:submit.prevent="submitSchoolDaysForm" action="#" id="schoolDaysForm" v-if="school_days">
                        <div class="modal-body">
                        <div class="row">  
                                                        
                            <div class="col col-md-12">
                                <div class="responsedata_div" v-if="responseData">
                                    <div class="callout " :class="responseData.status">
                                        <p>{{ responseData.msg }}</p>
                                    </div>
                                </div>
                            </div>                               

                            <input type="hidden" class="form-control" name="sy_id" value="<?php echo $sy_id; ?>" >
                            <input type="hidden" class="form-control" name="grade_level" value="<?php echo $grade_level; ?>" >
                            <input type="hidden" class="form-control" name="student_id" value="0" >
                            <input type="hidden" class="form-control" name="attendance_type" value="1" >
                            <div class="col col-md-12 schooldays-div">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">October</label>
                                    <input type="number" class="form-control" id="" step="any" name="october" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.october" :disabled="monthsClass.october == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">November</label>
                                    <input type="number" class="form-control" id="" step="any" name="november" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.november" :disabled="monthsClass.november == 0">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">December</label>
                                    <input type="number" class="form-control" id="" step="any" name="december" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.december" :disabled="monthsClass.december == 0">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">January</label>
                                    <input type="number" class="form-control" id="" step="any" name="january" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.january" :disabled="monthsClass.january == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">February</label>
                                    <input type="number" class="form-control" id="" step="any" name="february" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.february" :disabled="monthsClass.february == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">March</label>
                                    <input type="number" class="form-control" id="" step="any" name="march" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.march" :disabled="monthsClass.march == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">April</label>
                                    <input type="number" class="form-control" id="" step="any" name="april" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.april" :disabled="monthsClass.april == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">May</label>
                                    <input type="number" class="form-control" id="" step="any" name="may" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.may" :disabled="monthsClass.may == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">June</label>
                                    <input type="number" class="form-control" id="" step="any" name="june" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.june" :disabled="monthsClass.june == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">July</label>
                                    <input type="number" class="form-control" id="" step="any" name="july" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.july" :disabled="monthsClass.july == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">August</label>
                                    <input type="number" class="form-control" id="" step="any" name="august" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.august" :disabled="monthsClass.august == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">September</label>
                                    <input type="number" class="form-control" id="" step="any" name="september" v-on:keyup="addTotalDays('schoolDaysForm')" placeholder="Enter no. days" :value="school_days.september" :disabled="monthsClass.september == 0">
                                </div>
                            </div>
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Days</label>
                                    <input type="number" class="form-control" id="schoolDaysFormTotalDays" step="any" disabled placeholder="Enter no. days" :value="school_days.total">
                                </div>
                            </div>
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



        <div class="modal fade" id="modal-present-days" v-if="monthsClass">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="text-align: center; text-transform: uppercase; font-weight: bold; color: #751517;">No. of Days Present</h4>
                    </div>
                    <form v-on:submit.prevent="submitPresentDaysForm" action="#" id="presentDaysForm" v-if="present_days">
                        <div class="modal-body">
                        <div class="row">                           

                            <div class="col col-md-12">
                                <div class="responsedata_div" v-if="responseData">
                                    <div class="callout " :class="responseData.status">
                                        <p>{{ responseData.msg }}</p>
                                    </div>
                                </div>
                            </div>  
							<input type="hidden" class="form-control" name="sy_id" value="<?php echo $sy_id; ?>" >
                            <input type="hidden" class="form-control" name="grade_level" value="<?php echo $grade_level; ?>" >
                            <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_data["student_id"]; ?>" >
                            <input type="hidden" class="form-control" name="attendance_type" value="2" >
                            <div class="col col-md-12 presentdays-div">
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">October</label>
                                    <input type="number" class="form-control" id="" step="any" name="october" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.october" :disabled="monthsClass.october == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">November</label>
                                    <input type="number" class="form-control" id="" step="any" name="november" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.november" :disabled="monthsClass.november == 0">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">December</label>
                                    <input type="number" class="form-control" id="" step="any" name="december" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.december" :disabled="monthsClass.december == 0">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">January</label>
                                    <input type="number" class="form-control" id="" step="any" name="january" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.january" :disabled="monthsClass.january == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">February</label>
                                    <input type="number" class="form-control" id="" step="any" name="february" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.february" :disabled="monthsClass.february == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">March</label>
                                    <input type="number" class="form-control" id="" step="any" name="march" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.march" :disabled="monthsClass.march == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">April</label>
                                    <input type="number" class="form-control" id="" step="any" name="april" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.april" :disabled="monthsClass.april == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">May</label>
                                    <input type="number" class="form-control" id="" step="any" name="may" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.may" :disabled="monthsClass.may == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">June</label>
                                    <input type="number" class="form-control" id="" step="any" name="june" v-on:keyup="addTotalDays('presentDaysForm')"placeholder="Enter no. days" :value="present_days.june" :disabled="monthsClass.june == 0">
								</div>
								
								<div class="form-group">
                                    <label for="exampleInputEmail1">July</label>
                                    <input type="number" class="form-control" id="" step="any" name="july" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.july" :disabled="monthsClass.july == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">August</label>
                                    <input type="number" class="form-control" id="" step="any" name="august" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.august" :disabled="monthsClass.august == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">September</label>
                                    <input type="number" class="form-control" id="" step="any" name="september" v-on:keyup="addTotalDays('presentDaysForm')" placeholder="Enter no. days" :value="present_days.september" :disabled="monthsClass.september == 0">
                                </div>
                            </div>
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Days</label>
                                    <input type="number" class="form-control" id="presentDaysFormTotalDays" step="any" disabled placeholder="Enter no. days" :value="present_days.total">
                                </div>
                            </div>
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



         <div class="modal fade" id="modal-times-tardy" v-if="monthsClass">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="text-align: center; text-transform: uppercase; font-weight: bold; color: #751517;">No. of Times Tardy</h4>
                    </div>
                    <form v-on:submit.prevent="submitTimesTardyForm" action="#" id="timesTardyForm" v-if="times_tardy">
                        <div class="modal-body">
                        <div class="row">                           

                            <div class="col col-md-12">
                                <div class="responsedata_div" v-if="responseData">
                                    <div class="callout " :class="responseData.status">
                                        <p>{{ responseData.msg }}</p>
                                    </div>
                                </div>
                            </div> 
							<input type="hidden" class="form-control" name="sy_id" value="<?php echo $sy_id; ?>" >
                            <input type="hidden" class="form-control" name="grade_level" value="<?php echo $grade_level; ?>" >
                            <input type="hidden" class="form-control" name="student_id" value="<?php echo $student_data["student_id"]; ?>" >
                            <input type="hidden" class="form-control" name="attendance_type" value="3" >
                            <div class="col col-md-12 timestardydays-div">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">October</label>
                                    <input type="number" class="form-control" id="" step="any" name="october" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.october" :disabled="monthsClass.october == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">November</label>
                                    <input type="number" class="form-control" id="" step="any" name="november" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.november" :disabled="monthsClass.november == 0">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">December</label>
                                    <input type="number" class="form-control" id="" step="any" name="december" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.december" :disabled="monthsClass.december == 0">
                                </div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">January</label>
                                    <input type="number" class="form-control" id="" step="any" name="january" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.january" :disabled="monthsClass.january == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">February</label>
                                    <input type="number" class="form-control" id="" step="any" name="february" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.february" :disabled="monthsClass.february == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">March</label>
                                    <input type="number" class="form-control" id="" step="any" name="march" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.march" :disabled="monthsClass.march == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">April</label>
                                    <input type="number" class="form-control" id="" step="any" name="april" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.april" :disabled="monthsClass.april == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">May</label>
                                    <input type="number" class="form-control" id="" step="any" name="may" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.may" :disabled="monthsClass.may == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">June</label>
                                    <input type="number" class="form-control" id="" step="any" name="june" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.june" :disabled="monthsClass.june == 0">
								</div>
								
								<div class="form-group">
                                    <label for="exampleInputEmail1">July</label>
                                    <input type="number" class="form-control" id="" step="any" name="july" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.july" :disabled="monthsClass.july == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">August</label>
                                    <input type="number" class="form-control" id="" step="any" name="august" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.august" :disabled="monthsClass.august == 0">
								</div>
								<div class="form-group">
                                    <label for="exampleInputEmail1">September</label>
                                    <input type="number" class="form-control" id="" step="any" name="september" v-on:keyup="addTotalDays('timesTardyForm')" placeholder="Enter no. days" :value="times_tardy.september" :disabled="monthsClass.september == 0">
                                </div>
                            </div>
                            <div class="col col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Days</label>
                                    <input type="number" class="form-control" id="timesTardyFormTotalDays" step="any" disabled placeholder="Enter no. days" :value="times_tardy.total">
                                </div>
                            </div>
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

</div>
</div>
<!-- END  -->
