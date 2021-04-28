<?php

$section = "";
$std_grade_level = null;
switch ( $grade_level ){
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

if (isset($attCal) && $attCal){
	$months = $attCal;
} else {
	$months = array(
	    "october" => 0,
		"november" => 0,
		"december" => 0,
		"january" => 0,
		"february" => 0,
		"march" => 0,
		"april" => 0,
		"may" => 0,
		"june" => 0,
		"july" => 0,
		"august" => 0,
		"september" => 0,
	);
}

?>


<style>


.ftr_content_view .data_left, .ftr_content_view .data_center, .ftr_content_view .data_right{
	display: inline-block;
	vertical-align: top;
	float: none !important;
}
.ftr_content_view .data_right {
    text-align: right;
	width: 285px;
}
    .failed-grade{color: #751517;}
#attendance table tr td{text-transform: unset;}
.box-header > .box-tools{z-index: 999;  }

    .box-header{ padding: 0px ; }
    .box{ margin-bottom: 10px; }
    .view_student{ width: 1000px; max-width: 100%; margin: 0 auto; padding-top: 20px;}
    .view_student .content_view p{ margin: 0 0 -4px}
    .view_student .content_view p span{ color: #751517;  }
    .hdr_content .comp_logo{ width: 60px !important; }
    .ftr_content_view{display: block ;}
    /* .view_student .header_view{ margin-top: 40px; } */
    /* .view_student .content_view { margin-top: -30px; } */
    .student-data{margin-top: -22px;}
    .view_student .header_view img.comp_logo {margin-bottom: 5px}
    .view_student .header_view p{color: #751517 ; text-align: center; margin: 0 0 -4px; font-size: 13px;}
    /* .view_student .header_view .hdr_content{ position: relative; width: 400px; margin: 0 auto; padding-left: 82px;} */
    .view_student .header_view .hdr_content{ position: absolute; width: 400px;padding-left: 20px; float: left;}
    .view_student .header_view figure{ position: absolute; left: 15px; top: -5px;}
    .view_student .data_left{ float: left ; }
    .view_student .data_right{ float: right ;}
    .view_student .content_view .content_view_title { font-weight: 600; text-align: center; text-transform: uppercase; font-size: 12px ; color: #751517 ; margin-top: 0px; margin-bottom: 2px;}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{ padding: 0px ;font-size: 12px ; }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ border: none ; text-align: center ;  }
    .view_student .content_view table tr th:first-child, .view_student .content_view table tr td:first-child{ width: 200px ; text-align: left ;}
    footer {page-break-after: always ;}
    .behavior, .grades{width: 59% ;}
    .view_student .content_view p{margin: 0 0 3px ;}
    .ftr_content_view h4{ font-weight: 600; color: #751517 ; text-align: center; font-size: 12px ; }
    .ftr_content_view p span{ text-decoration: underline; }
    .ftr_content_view p small{ display: block;color: #751517;}
    .ftr_content_view .data_right{ text-align: right; }
    #attendance table tr th:last-child, #attendance table tr td:last-child{ display: none ; }
    .grades table tr th:last-child, .grades table tr td:last-child{ display: none ; }
    .legend{ display: block; }
    .legend h4{font-size: 12px;}
    .legend p{ margin: 0 0 0px ; color: #751517 ; font-size: 12px;}
	#attendance .month-0{display: none;}
</style>

<?php if( $grade_level == 'grade-11' || $grade_level == 'grade-12' ){ ?>
<style>
    @media print{
    /* HIde every other element */
    body *{
        visibility: hidden !important;
    }
    a[href]::after { content: none !important; }
    /*  then displaying print container elements */
    .printSudent, .printSudent *{
        visibility: visible !important;
    } 
    /* adjusting position that always start from top left*/
    .printSudent{
        margin-top: 20px !important;
        /* border: 1px solid red; */
        height: 950px !important;
        font-size: 11px !important;
        page-break-after: always;
        margin-top: 20px !important;
    }

    /*.printSudent{  page-break-after: always; } */
    /* .sample{
        position: absolute;
        left: 0px;
        right: 0px;
    } */
    .failed-grade{color: #751517 !important;}
    .box-header{ padding: 0px !important; } .box{ margin-bottom: 40px; }
    /* .break_new_page{page-break-after: always;} */
    .view_student .content_view p{ margin: 0 0 0px !important}
    .view_student .content_view p span{ color: #751517 !important;  }
    .hdr_content .comp_logo{ width: 80px !important; }
    .ftr_content_view{display: block !important;}
    /* .view_student .header_view{ margin-top: 40px; } */
    /* .view_student .content_view { margin-top: -30px !important; } */
    .student-data{margin-top: 40px !important;}
    
    .view_student .header_view img.comp_logo {margin-bottom: 0 0 0px !important}
    .view_student .header_view p{color: #751517 !important; text-align: center; margin: 0 0 0px !important; font-size: 13px !important;}
    .view_student .header_view .hdr_content{ position: absolute; width: 400px; margin: 0 auto; padding-left: 82px;}
    .view_student .header_view figure{ position: absolute; left: 35px; top: -5px;}


	.ftr_content_view .data_left, .ftr_content_view .data_center, .ftr_content_view .data_right{
		display: inline-block;
		vertical-align: top;
		float: none !important;
	}
	.ftr_content_view .data_right {
		text-align: right;
		width: 285px;
	}

    .view_student .data_left{ float: left !important; }
    .view_student .data_right{ float: right !important;}
    .view_student .content_view .content_view_title { font-weight: 600; text-align: center; text-transform: uppercase; font-size: 12px !important; color: #751517 !important; margin-top: 0px; margin-bottom: 2px;}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{ padding: 3px 0px !important;font-size: 12px !important; }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ border: none !important; text-align: center !important;  }
    .view_student .content_view table tr th:first-child, .view_student .content_view table tr td:first-child{ width: 200px !important; text-align: left !important;}
     footer {page-break-after: always !important;}
    .behavior, .grades{width: 59% !important;}
    .view_student .content_view p{margin: 0 0 3px !important;}
    .ftr_content_view h4{ font-weight: 600; color: #751517 !important; text-align: center; font-size: 12px !important; }
    .ftr_content_view p span{ text-decoration: underline; }
    /* .ftr_content_view p small{ display: block; margin-right: 35px;color: #751517;} */
    .ftr_content_view p small{ display: block;color: #751517;}
    .ftr_content_view .data_right{ text-align: right; }
    #attendance table tr th:last-child, #attendance table tr td:last-child{ display: none !important; }
    .grades table tr th:last-child, .grades table tr td:last-child{ display: none !important; }
    .legend{ display: block; }
     .legend h4{font-size: 12px;}
    .legend p{ margin: 0 0 0px !important; color: #751517 !important; font-size: 12px;}
}  


</style>
<?php } else { ?>

<style>
    @media print{
    /* HIde every other element */
    body *{
        visibility: hidden !important;
    }
    a[href]::after { content: none !important; }
    /*  then displaying print container elements */
    .printSudent, .printSudent *{
        visibility: visible !important;
    } 
    /* adjusting position that always start from top left*/
    .printSudent{
        margin-top: 20px !important;
        /* border: 1px solid red; */
        height: 630px !important;
        
    }

    .printSudent{ font-size: 11px !important; }
    /* .sample{
        position: absolute;
        left: 0px;
        right: 0px;
    } */
    .box-header{ padding: 0px !important; }
    .box{ margin-bottom: 10px; }
    .break_new_page{page-break-after: always;}
    .view_student .content_view p{ margin: 0 0 -4px !important}
    .view_student .content_view p span{ color: #751517 !important;  }
    .hdr_content .comp_logo{ width: 60px !important; }
    .ftr_content_view{display: block !important;}
    /* .view_student .header_view{ margin-top: 40px; } */
    /* .view_student .content_view { margin-top: -30px !important; } */
    
    .view_student .header_view img.comp_logo {margin-bottom: 5px !important}
    .view_student .header_view p{color: #751517 !important; text-align: center; margin: 0 0 -4px !important; font-size: 13px !important;}
    .view_student .header_view .hdr_content{ position: relative; width: 400px; margin: 0 auto; padding-left: 82px;}
    .view_student .header_view figure{ position: absolute; left: 35px; top: -5px;}
    .view_student .data_left{ float: left !important; }
    .view_student .data_right{ float: right !important;}


    .view_student .content_view .content_view_title { font-weight: 600; text-align: center; text-transform: uppercase; font-size: 12px !important; color: #751517 !important; margin-top: 0px; margin-bottom: 2px;}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{ padding: 0px !important;font-size: 12px !important; }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ border: none !important; text-align: center !important;  }
    .view_student .content_view table tr th:first-child, .view_student .content_view table tr td:first-child{ width: 200px !important; text-align: left !important;}
    footer {page-break-after: always !important;}
    .behavior, .grades{width: 59% !important;}
    .view_student .content_view p{margin: 0 0 3px !important;}
    .ftr_content_view h4{ font-weight: 600; color: #751517 !important; text-align: center; font-size: 12px !important; }
    .ftr_content_view p span{ text-decoration: underline; }
    .ftr_content_view p small{ display: block;color: #751517;}
    .ftr_content_view .data_right{ text-align: right; margin-top: -25px !important;}
    #attendance table tr th:last-child, #attendance table tr td:last-child{ display: none !important; }
    .grades table tr th:last-child, .grades table tr td:last-child{ display: none !important; }
    .legend{ display: block; }
    .legend p{ margin: 0 0 0px !important; color: #751517 !important; }

}  
</style>

<?php } ?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">


        <div class="box">
            <div class="box-header ">
                <div class="box-tools pull-right">
                    <button class="btn btn-maroon" onclick="window.print();"><i class="fa fa-print"></i>  Print</button> 
                    <a href="<?php echo base_url() . "admin/SY/".$sy_data["sy_id"] . "/". $grade_level; ?>" class="btn btn-darkgreen"> <i class="fa fa-arrow-circle-left "></i> BACK </a>
                </div>
            </div>


        <?php foreach( $students as $index=>$std ){ ?>
            
            <div class="printSudent <?php if ($index % 2 == 1) { echo 'break_new_page';}?>">
            
            <div class="view_student" >
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
                        <div class="col col-md-5 col-md-offset-4 data_right student-data">
                            <h5 style="font-weight: bold; color: #751517;">REPORT CARD</h5>
                            <p>School Year: <span><?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></span></p>
                            <p>
                            Grade: <span  style="margin-right: 20px;"><?php echo $std_grade_level; ?></span>
                            Section: <span><?php echo $section; ?></span></p>
                            <p>Age: <span style="margin-right: 20px;"><?php echo $std["age"]; ?></span>Gender: <span><?php echo $std["gender"]; ?></span></p>
                            <p>LRN: <span><?php echo $std["lrn"]; ?></span></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col col-md-3" style="display: inline-block;">
                            <p>Student No: <span><?php echo $std["student_no"]; ?></span></p>
                        </div>
                        <div class="col col-md-6" style="display: inline-block;">
                            <p>Name: <span><?php echo $std["first_name"].' '.$std["middle_name"].' '. $std["last_name"]; ?></span> </p>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col col-md-12 data_left grades">
                            <div class="box box-solid" id="">
                                <!-- <div class="box-header">
                                    <h4 class="content_view_title" >Grades</h4>
                                </div> -->
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
                                            <th></th>
                                            </tr>
                                        <?php foreach( $std["grades"]["subject_grade"] as $sbj_grade ){ ?>
                                            <tr>
                                                <td><?php echo $sbj_grade["subject_name"]; ?></td>
                                                <?php if( $sbj_grade["semester"] == 1 ){ ?>
                                                    <td <?php if($sbj_grade["quarter_first"] < 75 && $sbj_grade["quarter_first"] > 0){echo 'style="color: #751517 !important;"';} ?>>
                                                        <?php echo $sbj_grade["quarter_first"]; ?>
                                                    </td>
                                                    <td <?php if($sbj_grade["quarter_second"] < 75 && $sbj_grade["quarter_second"] > 0){echo 'style="color: #751517; !important;"';} ?>>
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
                                                <td></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td style="font-weight: 600; color: #751517 !important;">Average</td>
                                            <td style="font-weight: 600; color: #751517 !important;"><?php echo $std["grades"]["total_avg_first"]; ?></td>
                                            <td style="font-weight: 600; color: #751517 !important;"><?php echo $std["grades"]["total_avg_second"]; ?></td>
                                            <td style="font-weight: 600; color: #751517 !important;"><?php echo $std["grades"]["total_avg_third"]; ?></td>
                                            <td style="font-weight: 600; color: #751517 !important;"><?php echo $std["grades"]["total_avg_fourth"]; ?></td>
                                            <td></td>
                                        </tr>
                                        <tr v-if="grade_average">
                                                    <?php if($grade_level == 'grade-11' || $grade_level == 'grade-12'): ?>
                                                        <td style="font-weight: 600; color: #751517 !important;"></td>
                                                        <td colspan="4" style="text-align: center;color: #751517 !important;font-weight: 600;"></td>
                                                        <td></td>
                                                    <?php else: ?>
                                                        <td style="font-weight: 600; color: #751517 !important;">GENERAL WEIGHTED AVERAGE</td>
                                                        <td colspan="4" style="text-align: center;color: #751517 !important;font-weight: 600;"><?php echo $std["grades"]["total_general_avg"]; ?></td>
                                                        <td></td>
                                                    <?php endif; ?>
                                        </tr>  
                                    </tbody>
                                </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>

                        <!--div class="col col-md-12 data_right behavior">
                            <div class="box box-solid">
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
                                                <td><?php echo $std["behavior"][0]["manners"]; ?></td>
                                                <td><?php echo $std["behavior"][1]["manners"]; ?></td>
                                                <td><?php echo $std["behavior"][2]["manners"]; ?></td>
                                                <td><?php echo $std["behavior"][3]["manners"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Appearance</td>
                                                <td><?php echo $std["behavior"][0]["appearance"]; ?></td>
                                                <td><?php echo $std["behavior"][1]["appearance"]; ?></td>
                                                <td><?php echo $std["behavior"][2]["appearance"]; ?></td>
                                                <td><?php echo $std["behavior"][3]["appearance"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Dependability</td>
                                                <td><?php echo $std["behavior"][0]["dependability"]; ?></td>
                                                <td><?php echo $std["behavior"][1]["dependability"]; ?></td>
                                                <td><?php echo $std["behavior"][2]["dependability"]; ?></td>
                                                <td><?php echo $std["behavior"][3]["dependability"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Cooperation</td>
                                                <td><?php echo $std["behavior"][0]["cooperation"]; ?></td>
                                                <td><?php echo $std["behavior"][1]["cooperation"]; ?></td>
                                                <td><?php echo $std["behavior"][2]["cooperation"]; ?></td>
                                                <td><?php echo $std["behavior"][3]["cooperation"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Attendance</td>
                                                <td><?php echo $std["behavior"][0]["attendance"]; ?></td>
                                                <td><?php echo $std["behavior"][1]["attendance"]; ?></td>
                                                <td><?php echo $std["behavior"][2]["attendance"]; ?></td>
                                                <td><?php echo $std["behavior"][3]["attendance"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600; color: #751517 !important;">Average</td>
                                                <td><?php echo $std["behavior"][0]["average1"]; ?></td>
                                                <td><?php echo $std["behavior"][1]["average1"]; ?></td>
                                                <td><?php echo $std["behavior"][2]["average1"]; ?></td>
                                                <td><?php echo $std["behavior"][3]["average1"]; ?></td>
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
                                                    <td><?php echo $std["behavior"][0]["initiative_and_resourcefulness"]; ?></td>
                                                    <td><?php echo $std["behavior"][1]["initiative_and_resourcefulness"]; ?></td>
                                                    <td><?php echo $std["behavior"][2]["initiative_and_resourcefulness"]; ?></td>
                                                    <td><?php echo $std["behavior"][3]["initiative_and_resourcefulness"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Leadership</td>
                                                    <td><?php echo $std["behavior"][0]["leadership"]; ?></td>
                                                    <td><?php echo $std["behavior"][1]["leadership"]; ?></td>
                                                    <td><?php echo $std["behavior"][2]["leadership"]; ?></td>
                                                    <td><?php echo $std["behavior"][3]["leadership"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: 600; color: #751517 !important;">Average</td>
                                                    <td><?php echo $std["behavior"][0]["average2"]; ?></td>
                                                    <td><?php echo $std["behavior"][1]["average2"]; ?></td>
                                                    <td><?php echo $std["behavior"][2]["average2"]; ?></td>
                                                    <td><?php echo $std["behavior"][3]["average2"]; ?></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                        <div class="legend">
                                            <h4 class="content_view_title" style="text-align: left; text-transform: capitalize;font-size: 13px;">Legend:</h4>
                                            <p>1.00 - 1.50 - Outstanding (O)</p>
                                            <p>1.51 - 2.50 - Very Satisfactory (VS)</p>
                                            <p>2.51 - 3.50 - Satisfactory (S)</p>
                                            <p>3.51 - 4.50 - Moderately Satisfactory (MS)</p>
                                            <p>4.51 - 5.00 - Needs Improvement (NI)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div -->

                        <div class="clearfix"></div>


                        <div class="col col-md-12">
                            <div class="box box-solid" id="attendance">
                                <div class="box-header">
                                    <h4 class="content_view_title" >Attendance</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <th class="month-<?php echo $months["october"]; ?>">Oct</th>
                                                <th class="month-<?php echo $months["november"]; ?>">Nov</th>
                                                <th class="month-<?php echo $months["december"]; ?>">Dec</th>
                                                <th class="month-<?php echo $months["january"]; ?>">Jan</th>
												<th class="month-<?php echo $months["february"]; ?>">Feb</th>
												<th class="month-<?php echo $months["march"]; ?>">Mar</th>
                                                <th class="month-<?php echo $months["april"]; ?>">Apr</th>
												<th class="month-<?php echo $months["may"]; ?>">May</th>
												<th class="month-<?php echo $months["june"]; ?>">Jun</th>
												<th class="month-<?php echo $months["july"]; ?>">Jul</th>
												<th class="month-<?php echo $months["august"]; ?>">Aug</th>
												<th class="month-<?php echo $months["september"]; ?>">Sep</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600; color: #751517 !important;">No. of School Days:</td>
                                                <td class="month-<?php echo $months["october"]; ?>"><?php echo $std["school_days"]["october"]; ?></td>
                                                <td class="month-<?php echo $months["november"]; ?>"><?php echo $std["school_days"]["november"]; ?></td>
                                                <td class="month-<?php echo $months["december"]; ?>"><?php echo $std["school_days"]["december"]; ?></td>
                                                <td class="month-<?php echo $months["january"]; ?>"><?php echo $std["school_days"]["january"]; ?></td>
                                                <td class="month-<?php echo $months["february"]; ?>"><?php echo $std["school_days"]["february"]; ?></td>
                                                <td class="month-<?php echo $months["march"]; ?>"><?php echo $std["school_days"]["march"]; ?></td>
                                                <td class="month-<?php echo $months["april"]; ?>"><?php echo $std["school_days"]["april"]; ?></td>
                                                <td class="month-<?php echo $months["may"]; ?>"><?php echo $std["school_days"]["may"]; ?></td>
                                                <td class="month-<?php echo $months["june"]; ?>"><?php echo $std["school_days"]["june"]; ?></td>
                                                <td class="month-<?php echo $months["july"]; ?>"><?php echo $std["school_days"]["july"]; ?></td>
                                                <td class="month-<?php echo $months["august"]; ?>"><?php echo $std["school_days"]["august"]; ?></td>
                                                <td class="month-<?php echo $months["september"]; ?>"><?php echo $std["school_days"]["september"]; ?></td>
                                                <td><?php echo $std["school_days"]["total"]; ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600; color: #751517 !important;">No. of Days Present:</td>
                                                <td class="month-<?php echo $months["october"]; ?>"><?php echo $std["present_days"]["october"]; ?></td>
                                                <td class="month-<?php echo $months["november"]; ?>"><?php echo $std["present_days"]["november"]; ?></td>
                                                <td class="month-<?php echo $months["december"]; ?>"><?php echo $std["present_days"]["december"]; ?></td>
                                                <td class="month-<?php echo $months["january"]; ?>"><?php echo $std["present_days"]["january"]; ?></td>
                                                <td class="month-<?php echo $months["february"]; ?>"><?php echo $std["present_days"]["february"]; ?></td>
                                                <td class="month-<?php echo $months["march"]; ?>"><?php echo $std["present_days"]["march"]; ?></td>
                                                <td class="month-<?php echo $months["april"]; ?>"><?php echo $std["present_days"]["april"]; ?></td>
                                                <td class="month-<?php echo $months["may"]; ?>"><?php echo $std["present_days"]["may"]; ?></td>
                                                <td class="month-<?php echo $months["june"]; ?>"><?php echo $std["present_days"]["june"]; ?></td>
                                                <td class="month-<?php echo $months["july"]; ?>"><?php echo $std["present_days"]["july"]; ?></td>
                                                <td class="month-<?php echo $months["august"]; ?>"><?php echo $std["present_days"]["august"]; ?></td>
                                                <td class="month-<?php echo $months["september"]; ?>"><?php echo $std["present_days"]["september"]; ?></td>
                                                <td><?php echo $std["present_days"]["total"]; ?></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: 600; color: #751517 !important;">No. of Times Tardy:</td>
                                                <td class="month-<?php echo $months["october"]; ?>"><?php echo $std["tardy_days"]["october"]; ?></td>
                                                <td class="month-<?php echo $months["november"]; ?>"><?php echo $std["tardy_days"]["november"]; ?></td>
                                                <td class="month-<?php echo $months["december"]; ?>"><?php echo $std["tardy_days"]["december"]; ?></td>
                                                <td class="month-<?php echo $months["january"]; ?>"><?php echo $std["tardy_days"]["january"]; ?></td>
                                                <td class="month-<?php echo $months["february"]; ?>"><?php echo $std["tardy_days"]["february"]; ?></td>
                                                <td class="month-<?php echo $months["march"]; ?>"><?php echo $std["tardy_days"]["march"]; ?></td>
                                                <td class="month-<?php echo $months["april"]; ?>"><?php echo $std["tardy_days"]["april"]; ?></td>
                                                <td class="month-<?php echo $months["may"]; ?>"><?php echo $std["tardy_days"]["may"]; ?></td>
                                                <td class="month-<?php echo $months["june"]; ?>"><?php echo $std["tardy_days"]["june"]; ?></td>
                                                <td class="month-<?php echo $months["july"]; ?>"><?php echo $std["tardy_days"]["july"]; ?></td>
                                                <td class="month-<?php echo $months["august"]; ?>"><?php echo $std["tardy_days"]["august"]; ?></td>
                                                <td class="month-<?php echo $months["september"]; ?>"><?php echo $std["tardy_days"]["september"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["total"]; ?></td>
                                                <td></td>
                                            </tr>
                                         
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>

                    </div>
                </div>
            <div class="ftr_view">
                    <div class="ftr_content_view">
                        <h4>CERTIFICATE OF ADMISSION/TRANSFER</h4>
                        <table>
                            <tr>
                                <td>Eligible for admission/transfer to ______________________</td>
                                <td>Parent's Signature:________________________</td>
                                <td>
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration: underline; font-weight: 600; color: #751517 !important; text-transform: uppercase;">  <?php echo $principalData["first_name"] . ' '.$principalData["last_name"]; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Lacks credit/s in ______________________</td>
                                <td>Date issued: <span style="font-weight: 600; text-decoration:underline; color: #751517 !important;"><?php echo date('m/d/Y'); ?> </span>
                                </td>
                                <td>
                                    <p style = "text-align:center;"> <small style = "font-weight: 500;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Principal</small> </p>
                                </td>
                            </tr>
                            <tr>
                                <td> &nbsp; </td>
                                <td> &nbsp; </td>
                            </tr>
                            <tr>
                                <td colspan = "3" rowspan="5">
                                    <p style="margin-top: -10px; font-weight: 500; color: #751517 !important; font-size:11px;"> <img src="https://sapis.upcebu.edu.ph/assets/custom/images/Digital_Final.png" style="width:50px;width:50px;"> This is a digitally-generated file. The digital signature of the Principal authenticates this document.</p>
                                </td>
                            </tr>
                        </table>
                        
                        <!-- <div class="data_left">
                            <p style="margin-top: 10px;">Eligible for admission/transfer to ______________________</p>
							<p style="margin-top: 10px;">Lacks credit/s in ______________________</p>
                        </div>
						<div class="data_center">
							<p style="margin-top: 10px;">Parent's Signature:________________________</p>
							<p style="margin-top: 10px;">Date issued: <span style="font-weight: 600; color: #751517 !important;"><?php echo date('m/d/Y'); ?></p>
						</div>
						<div class="data_right" style="margin-top: 30px;">
							<p><span style="font-weight: 600; color: #751517 !important; text-transform: uppercase;"> <?php echo $principalData["first_name"] . ' '.$principalData["last_name"]; ?></span> <small style = "font-weight: 500;">Principal</small> </p>
						</div>
						<div class = "data_left">
    						<p style="margin-top: -10px; font-weight: 500; color: #751517 !important; font-size:11px;"> <img src="https://sapis.upcebu.edu.ph/assets/custom/images/Digital_Final.png" style="width:25px;width:25px;"> This is a digitally-generated file. The digital signature of the Principal authenticates this document.</p>
                        </div>
                        --> 
                    </div>
                </div>
            <!--<div class="ftr_view">
                    <div class="ftr_content_view">
                        <h4>CERTIFICATE OF ADMISSION/TRANSFER</h4>
                        <div class="data_left">
                            <p style="margin-top: 10px;">Eligible for admission/transfer to _________________</p>
							<p style="margin-top: 10px;">Lacks credit/s in _________________</p>
                        </div>
						<div class="data_center">
							<p style="margin-top: 10px;">Parent's Signature:_________________</p>
							<p style="margin-top: 10px;">Date issued: <span style="font-weight: 600; color: #751517 !important;"><?php echo date('m/d/Y'); ?></p>
						</div>
						<<div class="data_right" style="margin-top: 10px;">
							<p><span style="font-weight: 600; color: #751517 !important; text-transform: uppercase;"> <?php echo $principalData["first_name"] . ' '.$principalData["last_name"]; ?></span> <small style = "font-weight: 500;">Principal</small> </p>
						</div>
						<div class="data_left">
    						<p style="margin-top: 10px; font-weight: 500; color: #751517 !important;"> <img src="https://sapis.upcebu.edu.ph/assets/custom/images/Digital_Final.png" style="width:50px;width:50px;"> This is a digitally-generated file. The digital signature of the Principal authenticates this document.</p>
                        </div>
                    </div>
                </div> -->
            <div class="clearfix"></div>
        </div>
            
        <?php } ?>
        </div>
    </section>
</div>
