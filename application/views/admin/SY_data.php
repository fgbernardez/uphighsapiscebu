<style>
.summary-of-grades{text-align: center;}
.view-teachers{}
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

				<!-- <div class="box box-solid no-padding box-sidebar">
                    <div class="box-body no-padding">
						<button class="btn btn-darkgreen col-md-12 view-teachers">View Teachers</button>
                    </div>
                </div> -->
                <div class="box box-solid no-padding box-sidebar">
                    <div class="box-body no-padding">
                        <ul class="">
                            <li class="header">GRADE LEVELS</li>
                            <li>
                                <a href="<?php echo $school_year_data["sy_id"]; ?>/grade-7">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 7</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $school_year_data["sy_id"]; ?>/grade-8">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 8</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $school_year_data["sy_id"]; ?>/grade-9">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 9</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $school_year_data["sy_id"]; ?>/grade-10">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 10</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $school_year_data["sy_id"]; ?>/grade-11">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 11</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $school_year_data["sy_id"]; ?>/grade-12">
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
							<a class="btn btn-darkgreen" href="<?php echo base_url() . 'admin/view-teachers/'.$school_year_data["sy_id"]; ?>"> <i class="fa fa-users"></i> View Teachers</a>
                        </div>
                    </div>
                    <div class="box-body box-sy-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box box-solid">
                                    <div class="box-header ">
                                        <p class="box-title">Grade 7</p>
                                        <div class="box-tools pull-right">
                                        </div>
                                        
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Credit Units</th>
                                                    <th>Assigned Teacher</th>
                                                </tr>
                                                <?php foreach ($gradeseven->result() as $sbj ) { ?>
                                                    <tr>
                                                        <td><?php echo $sbj->subject_name; ?></td>
                                                        <td><?php echo $sbj->credit_unit; ?></td>
                                                        <?php
                                                            if (isset($sbj->first_name) && $sbj->first_name) {
                                                                echo '<td>'.$sbj->first_name.' '.$sbj->last_name.'</td>';
                                                            } else {
                                                                echo '<td style="color: #751517;font-weight: bold; font-style: italic;">Unassigned<td>';
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-solid">
                                    <div class="box-header ">
                                        <p class="box-title">Grade 8</p>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Credit Units</th>
                                                    <th>Assigned Teacher</th>
                                                </tr>
                                                <?php foreach ($gradeeight->result() as $sbj ) { ?>
                                                    <tr>
                                                        <td><?php echo $sbj->subject_name; ?></td>
                                                        <td><?php echo $sbj->credit_unit; ?></td>
                                                        <?php
                                                            if (isset($sbj->first_name) && $sbj->first_name) {
                                                                echo '<td>'.$sbj->first_name.' '.$sbj->last_name.'</td>';
                                                            } else {
                                                                echo '<td style="color: #751517;font-weight: bold; font-style: italic;">Unassigned<td>';
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-solid">
                                    <div class="box-header ">
                                        <p class="box-title">Grade 9</p>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Credit Units</th>
                                                    <th>Assigned Teacher</th>
                                                </tr>
                                                <?php foreach ($gradenine->result() as $sbj ) { ?>
                                                    <tr>
                                                        <td><?php echo $sbj->subject_name; ?></td>
                                                        <td><?php echo $sbj->credit_unit; ?></td>
                                                        <?php
                                                            if (isset($sbj->first_name) && $sbj->first_name) {
                                                                echo '<td>'.$sbj->first_name.' '.$sbj->last_name.'</td>';
                                                            } else {
                                                                echo '<td style="color: #751517;font-weight: bold; font-style: italic;">Unassigned<td>';
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-solid">
                                    <div class="box-header ">
                                        <p class="box-title">Grade 10</p>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Credit Units</th>
                                                    <th>Assigned Teacher</th>
                                                </tr>
                                                <?php foreach ($gradeten->result() as $sbj ) { ?>
                                                    <tr>
                                                        <td><?php echo $sbj->subject_name; ?></td>
                                                        <td><?php echo $sbj->credit_unit; ?></td>
                                                        <?php
                                                            if (isset($sbj->first_name) && $sbj->first_name) {
                                                                echo '<td>'.$sbj->first_name.' '.$sbj->last_name.'</td>';
                                                            } else {
                                                                echo '<td style="color: #751517;font-weight: bold; font-style: italic;">Unassigned<td>';
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-solid">
                                    <div class="box-header ">
                                        <p class="box-title">Grade 11</p>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <div class="box-body">
                                    <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Credit Units</th>
                                                    <th>Assigned Teacher</th>
                                                </tr>
                                                <?php foreach ($gradeeleven->result() as $sbj ) { ?>
                                                    <tr>
                                                        <td><?php echo $sbj->subject_name; ?></td>
                                                        <td><?php echo $sbj->credit_unit; ?></td>
                                                        <?php
                                                            if (isset($sbj->first_name) && $sbj->first_name) {
                                                                echo '<td>'.$sbj->first_name.' '.$sbj->last_name.'</td>';
                                                            } else {
                                                                echo '<td style="color: #751517;font-weight: bold; font-style: italic;">Unassigned<td>';
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-solid">
                                    <div class="box-header ">
                                        <p class="box-title">Grade 12</p>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <div class="box-body">
                                    <table class="table table-condensed">
                                            <tbody>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Credit Units</th>
                                                    <th>Assigned Teacher</th>
                                                </tr>
                                                <?php foreach ($gradetwelve->result() as $sbj ) { ?>
                                                    <tr>
                                                        <td><?php echo $sbj->subject_name; ?></td>
                                                        <td><?php echo $sbj->credit_unit; ?></td>
                                                        <?php
                                                            if (isset($sbj->first_name) && $sbj->first_name) {
                                                                echo '<td>'.$sbj->first_name.' '.$sbj->last_name.'</td>';
                                                            } else {
                                                                echo '<td style="color: #751517;font-weight: bold; font-style: italic;">Unassigned<td>';
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php } ?>
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
    </section>
    
</div>

