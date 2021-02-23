<style>
.summary-of-grades{text-align: center;}
.collapse-title{
	width: 150px;
	font-size: 16px;
	padding: 6px;
	background: #751517;
	text-align: center;
	color: #fff;
	margin: 0 auto !important;
	margin-top: 0px;
	display: block !important;
	margin-top: 10px !important;
	border-radius: 3px;
}

.panel-collapse .progress{
	background-color: #e67979 !important;
}
.teachers-track .progress{display: inline-block;
	display: inline-block;
	vertical-align: top;
	width: 80%;
	margin-top: 7px;
	margin-bottom: 5px;
	margin-right: 5px;
}

.teachers-track .total-students{display: inline-block;
vertical-align: top;
width: 15%;}

</style>
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
                                <a href="<?php echo base_url() ?>admin/SY/<?php echo $school_year_data["sy_id"]; ?>/grade-7">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 7</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/SY/<?php echo $school_year_data["sy_id"]; ?>/grade-8">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 8</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/SY/<?php echo $school_year_data["sy_id"]; ?>/grade-9">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 9</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/SY/<?php echo $school_year_data["sy_id"]; ?>/grade-10">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 10</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/SY/<?php echo $school_year_data["sy_id"]; ?>/grade-11">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 11</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/SY/<?php echo $school_year_data["sy_id"]; ?>/grade-12">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 12</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="box box-solid no-padding box-sidebar">
                    <div class="box-body no-padding">
                        <ul class="summary-of-grades">
                            <li class="header">RANKING</li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/1">First Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/2">Second Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/3">Third Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/4">Fourth Grading</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="col col-md-9">
                <div class="box box-solid">
                    <div class="box-header ">
                        <h3 class="box-title sy_title">School Year: <?php echo $school_year_data["start_year"] ."-" . $school_year_data["end_year"] ; ?></h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <div class="box-body box-sy-content">
                        <div class="row">
						<div class="box-body">
						<div class="box-group" id="accordion">
							<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
							
							<?php if (isset($teachers) && $teachers): ?>
								<?php foreach($teachers as $index => $value) { ?>
									<!-- <?php print("<pre>".print_r($value, true)."</pre>"); ?> -->
									<div class="panel box teachers-track">
										<div class="box-header with-border">
											<h4 class="box-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index; ?>">
												<?php echo $value["teacher_name"]; ?>
											</a>
											</h4>
										</div>
										<div id="collapse<?php echo $index; ?>" class="panel-collapse collapse">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<th>Subjects</th>
														<th>Grade Level</th>
														<th>First Grading</th>
														<th>Second Grading</th>
														<th>Third Grading</th>
														<th>Fourth Grading</th>
													</tr>
													
													<?php foreach ($value['subjects'] as $sbj): ?>
														<?php 
															$totalStudents = count($sbj['students']);
															$quarter_first = array_count_values(array_column($sbj['students'], "quarter_first"));
															$quarter_second = array_count_values(array_column($sbj['students'], "quarter_second"));
															$quarter_third = array_count_values(array_column($sbj['students'], "quarter_third"));
															$quarter_fourth = array_count_values(array_column($sbj['students'], "quarter_fourth"));

															$qf = (isset($quarter_first[0]) && $quarter_first[0]) ? $quarter_first[0] : 0;
															$qs = (isset($quarter_second[0]) && $quarter_second[0]) ? $quarter_second[0] : 0;
															$qt = (isset($quarter_third[0]) && $quarter_third[0]) ? $quarter_third[0] : 0;
															$qff = (isset($quarter_fourth[0]) && $quarter_fourth[0]) ? $quarter_fourth[0] : 0;

															$totalStudentsGradeNotUpdateFirstQuarter = round($qf / ($totalStudents / 100), 2);
															$totalStudentsGradeNotUpdateSecondQuarter = round($qs / ($totalStudents / 100), 2);
															$totalStudentsGradeNotUpdateThirdQuarter = round($qt / ($totalStudents / 100), 2);
															$totalStudentsGradeNotUpdateFourthQuarter = round($qff / ($totalStudents / 100), 2);
															$tSGNUFQ = 100 - $totalStudentsGradeNotUpdateFirstQuarter;
															$tSGNUSQ = 100 - $totalStudentsGradeNotUpdateSecondQuarter;
															$tSGNUTQ = 100 - $totalStudentsGradeNotUpdateThirdQuarter;
															$tSGNUFFQ = 100 - $totalStudentsGradeNotUpdateFourthQuarter;

															$fov = $totalStudents - $qf;
															$sov = $totalStudents - $qs;
															$tov = $totalStudents - $qt;
															$ffov = $totalStudents - $qff;
														?>
														<?php if ($sbj['semester'] == 0) { ?>
														<tr>
															<th><?php echo $sbj["subject_name"]; ?></th>
															<th><?php echo $sbj["grade_level"]; ?></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUFQ; ?>%"></div></div><div class="total-students"><span><?php echo $fov .'/'. $totalStudents;?></span></div></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUSQ; ?>%"></div></div><div class="total-students"><span><?php echo $sov .'/'. $totalStudents;?></span></div></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUTQ; ?>%"></div></div><div class="total-students"><span><?php echo $tov .'/'. $totalStudents;?></span></div></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUFFQ; ?>%"></div></div><div class="total-students"><span><?php echo $ffov .'/'. $totalStudents;?></span></div></th>
														</tr>
														<?php } else if ($sbj['semester'] == 1) { ?>
														<tr>
															<th><?php echo $sbj["subject_name"]; ?></th>
															<th><?php echo $sbj["grade_level"]; ?></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUFQ; ?>%"></div></div><div class="total-students"><span><?php echo $fov .'/'. $totalStudents;?></span></div></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUSQ; ?>%"></div></div><div class="total-students"><span><?php echo $sov .'/'. $totalStudents;?></span></div></th>
															<th></th>
															<th></th>
														</tr>
														<?php } else if ($sbj['semester'] == 2) { ?>
														<tr>
															<th><?php echo $sbj["subject_name"]; ?></th>
															<th><?php echo $sbj["grade_level"]; ?></th>
															<th></th>
															<th></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUTQ; ?>%"></div></div><div class="total-students"><span><?php echo $tov .'/'. $totalStudents;?></span></div></th>
															<th><div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: <?php echo $tSGNUFFQ; ?>%"></div></div><div class="total-students"><span><?php echo $ffov .'/'. $totalStudents;?></span></div></th>
														</tr>
														<?php } ?>

													<?php endforeach; ?>

													<!-- <tr>
														<td>4.</td>
														<td>Fix and squish bugs</td>
														<td>
															<div class="progress progress-xs progress-striped active">
															<div class="progress-bar progress-bar-success" style="width: 90%"></div>
															</div>
														</td>
														<td><span class="badge bg-green">90%</span></td>
													</tr> -->
												</tbody>
											</table>
										</div>
									</div>
								<?php } ?>
							<?php else: ?>
								<p class="text-red" style="text-align: center;">No teachers assigned!</p>
							<?php endif; ?>
						</div>
            		</div>
            	</div>
            </div>

        </div>
    </section>
    
</div>

