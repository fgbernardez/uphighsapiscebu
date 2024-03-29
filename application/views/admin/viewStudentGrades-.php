<?php

$section = "";
switch ( $grade_level ){
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
?>


<style>

    .box-header{ padding: 0px ; }
    .box{ margin-bottom: 10px; }
    .view_student{ width: 1000px; max-width: 100%; margin: 0 auto; padding-top: 20px;}
    .view_student .content_view p{ margin: 0 0 -4px}
    .view_student .content_view p span{ color: #751517;  }
    .hdr_content .comp_logo{ width: 60px !important; }
    .ftr_content_view{display: block ;}
    /* .view_student .header_view{ margin-top: 40px; } */
    .view_student .content_view { margin-top: -30px; }
    
    .view_student .header_view img.comp_logo {margin-bottom: 5px}
    .view_student .header_view p{color: #751517 ; text-align: center; margin: 0 0 -4px; font-size: 13px;}
    /* .view_student .header_view .hdr_content{ position: relative; width: 400px; margin: 0 auto; padding-left: 82px;} */
    .view_student .header_view .hdr_content{ position: relative; width: 400px;padding-left: 20px;}
    .view_student .header_view figure{ position: absolute; left: 15px; top: -5px;}
    .view_student .data_left{ float: left ; }
    .view_student .data_right{ float: right ;}
    .view_student .content_view .content_view_title { font-weight: 600; text-align: center; text-transform: uppercase; font-size: 12px ; color: #751517 ; margin-top: 0px; margin-bottom: 2px;}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{ padding: 0px ;font-size: 12px ; }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ border: none ; text-align: center ;  }
    .view_student .content_view table tr th:first-child, .view_student .content_view table tr td:first-child{ width: 200px ; text-align: left ;}
    footer {page-break-after: always ;}
    .behavior, .grades{width: 49% ;}
    .view_student .content_view p{margin: 0 0 3px ;}
    .ftr_content_view h4{ font-weight: 600; color: #751517 ; text-align: center; font-size: 12px ; }
    .ftr_content_view p span{ text-decoration: underline; }
    .ftr_content_view p small{ display: block; margin-right: 35px;color: #751517;}
    .ftr_content_view .data_right{ text-align: right; }
    #attendance table tr th:last-child, #attendance table tr td:last-child{ display: none ; }
    .grades table tr th:last-child, .grades table tr td:last-child{ display: none ; }
    .legend{ display: block; }
    .legend p{ margin: 0 0 0px ; color: #751517 ; }
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
        margin-top: 100px !important;
        /* border: 1px solid red; */
        height: 630px !important;
        page-break-after: always;
        
    }

    .printSudent{ font-size: 11px !important; }
    /* .sample{
        position: absolute;
        left: 0px;
        right: 0px;
    } */
    .box-header{ padding: 0px !important; }
    .box{ margin-bottom: 10px; }
    /* .break_new_page{page-break-after: always;} */
    .view_student .content_view p{ margin: 0 0 0px !important}
    .view_student .content_view p span{ color: #751517 !important;  }
    .hdr_content .comp_logo{ width: 60px !important; }
    .ftr_content_view{display: block !important;}
    /* .view_student .header_view{ margin-top: 40px; } */
    .view_student .content_view { margin-top: -30px !important; }
    
    .view_student .header_view img.comp_logo {margin-bottom: 5px !important}
    .view_student .header_view p{color: #751517 !important; text-align: center; margin: 0 0 0px !important; font-size: 13px !important;}
    .view_student .header_view .hdr_content{ position: relative; width: 400px; margin: 0 auto; padding-left: 82px;}
    .view_student .header_view figure{ position: absolute; left: 35px; top: -5px;}
    .view_student .data_left{ float: left !important; }
    .view_student .data_right{ float: right !important;}
    .view_student .content_view .content_view_title { font-weight: 600; text-align: center; text-transform: uppercase; font-size: 12px !important; color: #751517 !important; margin-top: 0px; margin-bottom: 2px;}
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th{ padding: 3px 0px !important;font-size: 12px !important; }
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
        margin-top: 0px !important;
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
    .view_student .content_view { margin-top: -30px !important; }
    
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

                        
                        <div class="col col-md-5 col-md-offset-4 data_right" style="margin-top: -29px;">
                            <h5 style="font-weight: bold; color: #751517;">REPORT CARD</h5>
                            <p>School Year: <span><?php echo $sy_data["start_year"] . "-" . $sy_data["end_year"]; ?></span></p>
                            <p>Grade: <span  style="margin-right: 20px;"><?php echo $std["grade_level"]; ?></span>    Section: <span><?php echo $section; ?></span></p>
                            <p>Age: <span style="margin-right: 20px;"><?php echo $std["age"]; ?></span>Gender: <span><?php echo $std["gender"]; ?></span></p>
                            <p>LRN: <span><?php echo $std["lrn"]; ?></span></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col col-md-3">
                            <p>Student No: <span><?php echo $std["student_no"]; ?></span></p>
                        </div>
                        <div class="col col-md-6">
                            <p>Name: <span><?php echo $std["name"]; ?></span> </p>
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

                                        <tr>
                                            <td style="font-weight: 600; color: #751517 !important;">GENERAL WEIGHTED AVERAGE</td>
                                            <td colspan="4" style="text-align: center;color: #751517 !important;font-weight: 600;"><?php echo $std["grades"]["total_general_avg"]; ?></td>
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
                                <!-- <div class="box-header">
                                    <h4 class="content_view_title" >Behavior</h4>
                                </div> -->
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
                                            <h4 class="content_view_title" style="text-align: left;">Legend</h4>
                                            <p>1.00 - 1.50 - Outstanding (O)</p>
                                            <p>1.51 - 2.50 - Very Satisfactory (VS)</p>
                                            <p>2.51 - 3.50 - Satisfactory (S)</p>
                                            <p>3.51 - 4.50 - Moderately Satisfactory (MS)</p>
                                            <p>4.51 - 5.00 - Needs Improvement (NI)</p>
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
                                        <tbody>
                                            <tr>
                                                <th> </th>
                                                <th>Aug</th>
                                                <th>Sep</th>
                                                <th>Oct</th>
                                                <th>Nov</th>
                                                <th>Dec</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                            <tr v-if="school_days">
                                                <td style="font-weight: 600; color: #751517 !important;">No. of School Days:</td>
                                                <td><?php echo $std["school_days"]["aug"]; ?></td>
                                                <td><?php echo $std["school_days"]["sep"]; ?></td>
                                                <td><?php echo $std["school_days"]["oct"]; ?></td>
                                                <td><?php echo $std["school_days"]["nov"]; ?></td>
                                                <td><?php echo $std["school_days"]["december"]; ?></td>
                                                <td><?php echo $std["school_days"]["jan"]; ?></td>
                                                <td><?php echo $std["school_days"]["feb"]; ?></td>
                                                <td><?php echo $std["school_days"]["mar"]; ?></td>
                                                <td><?php echo $std["school_days"]["apr"]; ?></td>
                                                <td><?php echo $std["school_days"]["may"]; ?></td>
                                                <td><?php echo $std["school_days"]["jun"]; ?></td>
                                                <td><?php echo $std["school_days"]["jul"]; ?></td>
                                                <td><?php echo $std["school_days"]["total"]; ?></td>
                                                <td></td>
                                            </tr>
                                            <tr v-if="school_days">
                                                <td style="font-weight: 600; color: #751517 !important;">No. of Days Present:</td>
                                                <td><?php echo $std["present_days"]["aug"]; ?></td>
                                                <td><?php echo $std["present_days"]["sep"]; ?></td>
                                                <td><?php echo $std["present_days"]["oct"]; ?></td>
                                                <td><?php echo $std["present_days"]["nov"]; ?></td>
                                                <td><?php echo $std["present_days"]["december"]; ?></td>
                                                <td><?php echo $std["present_days"]["jan"]; ?></td>
                                                <td><?php echo $std["present_days"]["feb"]; ?></td>
                                                <td><?php echo $std["present_days"]["mar"]; ?></td>
                                                <td><?php echo $std["present_days"]["apr"]; ?></td>
                                                <td><?php echo $std["present_days"]["may"]; ?></td>
                                                <td><?php echo $std["school_days"]["jun"]; ?></td>
                                                <td><?php echo $std["school_days"]["jul"]; ?></td>
                                                <td><?php echo $std["present_days"]["total"]; ?></td>
                                                <td></td>
                                            </tr>
                                            <tr v-if="school_days">
                                                <td style="font-weight: 600; color: #751517 !important;">No. of Days Present:</td>
                                                <td><?php echo $std["tardy_days"]["aug"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["sep"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["oct"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["nov"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["december"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["jan"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["feb"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["mar"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["apr"]; ?></td>
                                                <td><?php echo $std["tardy_days"]["may"]; ?></td>
                                                <td><?php echo $std["school_days"]["jun"]; ?></td>
                                                <td><?php echo $std["school_days"]["jul"]; ?></td>
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
                        <div class="data_left">
                            Eligible for admission/transfer to ___________________________<br/>
                            Date issued: <span style="font-weight: 600; color: #751517 !important;"><?php echo date('m/d/Y'); ?></span>
                            <p>Parent's Signature: ___________________________</p>
                        </div>
                        <div class="data_right">
                            Lacks credit/s in ____________________________<br/>
                            <p><span style="font-weight: 600; color: #751517 !important;"> CATHERINE M. RODEL</span> <small>Principal</small> </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
            
        <?php } ?>
        </div>
    </section>
</div>