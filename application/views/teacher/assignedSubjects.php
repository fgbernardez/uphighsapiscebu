

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
        <div class="box box-darkgreen">
                    <div class="box-header ">
                        <h3 class="box-title sy_title">School Year: <?php echo $school_year["start_year"] ."-" . $school_year["end_year"] ; ?></h3>
                    </div>

            <div class="box-header with-border">
                <h3 class="box-title">Assigned Subjects</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Subject Name</th>
                            <th>Grade Level</th>
                        </tr>
                        <?php foreach( $assignedSubjects->result() as $sbj ) { ?>
                            <tr>
                                <td> <a href="<?php echo base_url(); ?>subject/<?php echo $sbj->sy_id ."/". $sbj->subject_id; ?>"> <?php echo $sbj->subject_name; ?> </a> </td>
                                <td style="text-transform: capitalize;" > <?php echo $sbj->grade_level; ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
  </div>
