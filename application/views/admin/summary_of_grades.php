<?php

$section = "";
$std_grade_level = null;
switch ( $grade_level ){
    case "grade-7":
        $section = "Bart Let";
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
        $section = "PALMA";
        $std_grade_level = "Grade 10";

        break;
    case "grade-11":
        $section = "BOCOBO";
        $std_grade_level = "Grade 11";
        break;
    case "grade-12":
        $section = "SISON";
        $std_grade_level = "Grade 12";
        break;
    default:
        $section = "Undefined";

}
?>

<style>
.box-sidebar ul li a.active{ background: #751517;color: white; }
.sbj-name-option{margin: 10px 0px;}
.sbj-name-option span{ font-weight: bold; color: #751517; cursor: pointer;}
.sbj-name-option span:hover{text-decoration: underline;}
.select-div{ display: none;}
.summary-of-grades{text-align: center;}
.smry-of-grds-tbl{}
.smry-of-grds-tbl tr td, .smry-of-grds-tbl tr th{text-align: center; border: 1px solid #f4f4f4;}
.smry-of-grds-tbl tr th:nth-child(1){width: 200px;}
.smry-of-grds-tbl tr th:nth-child(2){letter-spacing: 40px;}
.smry-of-grds-tbl tr th:nth-child(2), .smry-of-grds-tbl tr td:nth-child(2){width: 1000px;}
.smry-of-grds-tbl tr th:nth-child(3), .smry-of-grds-tbl tr th:nth-child(4), .smry-of-grds-tbl tr th:nth-child(5), .smry-of-grds-tbl tr th:nth-child(6){width:81px;}
.smry-of-grds-tbl tr td h5{display: inline-block;width: 80px;}
.smry-of-grds-tbl tr td h5.sbj-name{font-weight: bold;font-size: 15px;color: #751517}
.smry-of-grds-tbl tr td h5 span{display: block; }
.box-stds-grades{overflow-x: auto;}
.box-body-stds-grades{width: 2000px;}
.smry-grd-hdr-left{float: left;}
.smry-grd-hdr-right{float: right;}
.smry-grd-hdr p { font-size: 15px; font-weight: 600; }
.box-sidebar ul li a.active, .box-sidebar ul li.active > a:hover, .box-sidebar ul li > a:hover {
    background: #751517;
    color: white !important;
    border-left: 0px !important;
}
.smry-of-grds-tbl .name{
	text-align: left;
}
.smry-of-grds-tbl .gender-type{
	text-align: left;
	font-size: 17px;
	font-weight: 600;
}

/* .smry-grd-hdr-dummy{display: none;} */
.summary-of-grades{text-align: center;}
#view-failed-grades-and-subjects-no-grade .box{width: 500px; max-width: 100%;}
.tbl-failed-students-grade span{cursor: pointer;}
.tbl-failed-students-grade span:hover{background-color: #f0ad4e !important;}
 .btn-print{position: absolute; right: 5px; top: 5px;}
 .smry-grd-hdr-dummy{display: none;}
@media print{
    body *{ visibility: hidden !important; }
    a[href]::after { content: none !important; }
    #print-summary-of-grade *{ visibility: visible !important; } 
    .box-body-stds-grades{width: 100% !important; }
    #print-summary-of-grade{border: 12px solid !important; margin-top: 0px !important;}
    .ss{width: 100%;margin-top: -880px !important;}
    .smry-grd-hdr-dummy{display: block !important; position: relative;}
    .smry-grd-hdr-dummy h3{    position: absolute; left: 0; right: 0; margin: 0 auto; text-align: center;}
    .smry-of-grds-tbl tr th:nth-child(3), .smry-of-grds-tbl tr th:nth-child(4), .smry-of-grds-tbl tr th:nth-child(5), .smry-of-grds-tbl tr th:nth-child(6){width:50px;}
    .smry-of-grds-tbl tr th:nth-child(1){width: 150px;}
    .smry-of-grds-tbl tr th:nth-child(2), .smry-of-grds-tbl tr td:nth-child(2){width: 1200px;}

    .smry-of-grds-tbl tr td h5{width: 46px !important; padding: 0px 2px !important; font-size: 12px !important; margin: 0px 5px !important;word-wrap: break-word;}
    .smry-of-grds-tbl{font-size: 12px !important;}
}
</style>


<div id="summary-of-grades">
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
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/1" <?php if( $periodGrd == 1 ){ echo 'class="active"'; } ?>>First Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/2" <?php if( $periodGrd == 2 ){ echo 'class="active"'; } ?>>Second Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/3" <?php if( $periodGrd == 3 ){ echo 'class="active"'; } ?>>Third Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/summary-of-grades/'.$sy_data["sy_id"].'/'.$grade_level; ?>/4" <?php if( $periodGrd == 4 ){ echo 'class="active"'; } ?>>Fourth Grading</a>
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



            </div>
            <div class="col col-md-9 ss">
                <div class="box box-solid">
                    <div class="box-header ">
                        <!-- <h3 class="box-title sy_title">School Year: <?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></h3> -->
                        <h3 class="box-title sy_title">SUMMARY of GRADES</h3>
                        <button class="btn btn-maroon btn-print" onclick="window.print();"><i class="fa fa-print"></i>  Print</button>
                        <div class="smry-grd-hdr">
                            <div class="smry-grd-hdr-left">
                                <p><span>Year: <?php echo $std_grade_level; ?></span></p>
                                <p><span>Section: <?php echo $section; ?></span></p>
                            </div>
                            <div class="smry-grd-hdr-right">
                                <p><span><?php echo $periodText; ?></span></p>
                                <p><span>School Year: <?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="box-body box-sy-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <div class="box-body no-padding">
                                        <div class="box box-darkgreen box-stds-grades">
                                            <div class="box-body box-body-stds-grades">
                                                <div id="print-summary-of-grade">
                                                <div class="smry-grd-hdr smry-grd-hdr-dummy">
                                                    <h3>SUMMARY OF GRADES</h3>
                                                    <div class="smry-grd-hdr-left">
                                                        <p><span>Year: <?php echo $std_grade_level; ?></span></p>
                                                        <p><span>Section: <?php echo $section; ?></span></p>
                                                    </div>
                                                    <div class="smry-grd-hdr-right">
                                                        <p><span><?php echo $periodText; ?></span></p>
                                                        <p><span>School Year: <?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></span></p>
                                                    </div>
                                                </div>
                                                <table class="table table-striped smry-of-grds-tbl">
                                                    <tbody>
                                                        <tr>
                                                            <th>NAME OF STUDENTS</th>
                                                            <th>SUBJECTS</th>
                                                            <th>AVERAGE</th>
                                                            <th>RANK</th>
                                                            <th>CONDUCT <span>AVERAGE</span></th>
                                                            <th>LEADERSHIP <span>AVERAGE</span></th>
                                                        </tr>
														<?php 
                                                            $counterFemale = 0;

                                                            // $price = array_column($students, 'price');
                                                        if (isset($femaleStudents) && $femaleStudents != null) {
                                                            foreach ($femaleStudents as $std) { 
                                                        ?>
                                                            <?php if ($counterFemale == 0){ ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <?php 
                                                                            foreach ($std["grades"]["subject_grade"] as $grade) { 
                                                                                if($grade["semester"] == $semester || $grade["semester"] == 0){
                                                                                    echo '<h5 class="sbj-name">'.$grade["subject_name"].'</h5>';
                                                                                }
                                                                            }
                                                                        ?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
																</tr>
                                                            <?php } ?>
                                                            <tr>
                                                                <td  class="name"><?php echo $std["last_name"] .', '.$std["first_name"]; ?></td>
                                                                <td>
                                                                    <?php 
                                                                        foreach ($std["grades"]["subject_grade"] as $grade) { 
                                                                            if($grade["semester"] == $semester || $grade["semester"] == 0){
                                                                                echo '<h5>'.$grade[$period].'</h5>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $std["grades"][$average_period]; ?></td>
                                                                <td><?php echo $std["rank"]; ?></td>
                                                                <td><?php echo number_format((float)$std["behavior"][$periodBehaviorAndLeadership]["average1"], 2, '.', ''); ?></td>
                                                                <td><?php echo number_format((float)$std["behavior"][$periodBehaviorAndLeadership]["average2"], 2, '.', ''); ?></td>
                                                            </tr>
                                                        <?php
                                                                $counterFemale += 1;
                                                            }
                                                        }
                                                        ?>
                                                        <?php 
                                                            $counterMale = 0;
                                                            // $price = array_column($students, 'price');
                                                        if (isset($maleStudents) && $maleStudents != null) {
                                                            foreach ($maleStudents as $std) { 
                                                        ?>
                                                            <?php if ($counterMale == 0){ ?>
                                                            <?php } ?>
                                                            <tr>
                                                                <td class="name"><?php echo $std["last_name"] .', '.$std["first_name"]; ?></td>
                                                                <td>
                                                                    <?php 
                                                                        foreach ($std["grades"]["subject_grade"] as $grade) { 
                                                                            if($grade["semester"] == $semester || $grade["semester"] == 0){
                                                                                echo '<h5>'.$grade[$period].'</h5>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $std["grades"][$average_period]; ?></td>
                                                                <td><?php echo $std["rank"]; ?></td>
                                                                <td><?php echo number_format((float)$std["behavior"][$periodBehaviorAndLeadership]["average1"], 2, '.', ''); ?></td>
                                                                <td><?php echo number_format((float)$std["behavior"][$periodBehaviorAndLeadership]["average2"], 2, '.', ''); ?></td>
                                                            </tr>
                                                        <?php
                                                                $counterMale += 1;
                                                            }
                                                        }
                                                        ?>
														
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
        </div>
    </section>
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

    </div>
</div>
