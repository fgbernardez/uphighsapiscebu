
<style>
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ text-align: center; }
</style>
  <div class="content-wrapper">
		<section class="content-header">
			<?php 
			if (isset($deadlineForSubmitGrade) && $deadlineForSubmitGrade) :
			$gradings = $this->config->item('gradings'); 
			?>
				<div class="alert alert-warning alert-dismissible">
					<h4><i class="icon fa fa-warning"></i>Warning!</h4>
					<?php echo 'Please submit the '.$gradings[$deadlineForSubmitGrade['grading']].' grade before '.$deadlineForSubmitGrade['time_deadline'].' '.$deadlineForSubmitGrade['date_deadline'].'!'; ?>
				</div>
			<?php endif; ?>
		</section>
    <section class="content">
    
        <div class="row">
            <div class="col col-md-3">      
                <div class="box box-solid no-padding box-sidebar">
                    <div class="box-body no-padding">
                        <ul class="">
                            <li class="header">Assigned Subjects</li>
                            <?php foreach( $assignedSubjects->result() as $sbj ) { ?>
                                <li <?php if( $subject_id == $sbj->subject_id ){ echo 'class="active"'; }?>>
                                    <a href="<?php echo base_url(); ?>subject/<?php echo $sbj->sy_id."/".$sbj->subject_id; ?>" <?php if( $subject_id == $sbj->subject_id ){ echo 'class="active"'; } ?>> <?php echo $sbj->subject_name; ?> <span style="float: right; text-transform: capitalize;"> <?php echo $sbj->grade_level; ?></span></a>
                                </li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col col-md-9">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title sy_title">School Year: <?php echo $school_year["start_year"] ."-". $school_year["end_year"]; ?></h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Student Name</th>
                                    <?php if($semester == 1) { ?>
                                        <th>1ST</th>
                                        <th>2ND</th>
                                    <?php } elseif($semester == 2){ ?>
                                        <th>3RD</th>
                                        <th>4TH</th>
                                    <?php } else {  ?>
                                        <th>1ST</th>
                                        <th>2ND</th>
                                        <th>3RD</th>
                                        <th>4TH</th>
                                    <?php } ?>
                                </tr>
                                <?php foreach( $students as $std ) { ?>
                                    <tr>
                                        <td><a href="<?php echo base_url(); ?>manage-student/<?php echo $school_year["sy_id"] ."/".$subject_id ."/". $std["student_id"]; ?>"> <?php echo $std["first_name"].' '.$std["last_name"]; ?> </a></td>
                                    <?php if($semester == 1) { ?>
                                        <td><span <?php if($std["quarter_first"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_first"]; ?></span></td>
                                        <td><span <?php if($std["quarter_second"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_second"]; ?></span></td>
                                    <?php } elseif($semester == 2){ ?>
                                        
                                        <td><span <?php if($std["quarter_third"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_third"]; ?></span></td>
                                        <td><span <?php if($std["quarter_fourth"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_fourth"]; ?></span></td>
                                    <?php } else {  ?>
                                        <td><span <?php if($std["quarter_first"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_first"]; ?></span></td>
                                        <td><span <?php if($std["quarter_second"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_second"]; ?></span></td>
                                        <td><span <?php if($std["quarter_third"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_third"]; ?></span></td>
                                        <td><span <?php if($std["quarter_fourth"] < 75){echo 'class="label label-danger"';} else {echo 'class="label label-success"';}?>><?php echo $std["quarter_fourth"]; ?></span></td>
                                    <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

       
    </section>
  </div>
