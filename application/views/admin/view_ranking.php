<style>
.summary-of-grades{text-align: center;}
.box-sidebar ul li a.active, .box-sidebar ul li.active > a:hover, .box-sidebar ul li > a:hover {
    background: #751517;
    color: white !important;
    border-left: 0px !important;
}
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
                                <a href="<?php echo base_url() .'admin/SY/'. $school_year_data["sy_id"]; ?>/grade-7">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 7</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() .'admin/SY/'. $school_year_data["sy_id"]; ?>/grade-8">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 8</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() .'admin/SY/'. $school_year_data["sy_id"]; ?>/grade-9">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 9</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() .'admin/SY/'. $school_year_data["sy_id"]; ?>/grade-10">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 10</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() .'admin/SY/'. $school_year_data["sy_id"]; ?>/grade-11">
                                    <i class="fa fa-graduation-cap"></i> <span>Grade 11</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() .'admin/SY/'. $school_year_data["sy_id"]; ?>/grade-12">
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
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/1" <?php if( $periodGrd == 1 ){ echo 'class="active"'; } ?>>First Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/2" <?php if( $periodGrd == 2 ){ echo 'class="active"'; } ?>>Second Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/3" <?php if( $periodGrd == 3 ){ echo 'class="active"'; } ?>>Third Grading</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . 'admin/view-ranking/'.$school_year_data["sy_id"]; ?>/4" <?php if( $periodGrd == 4 ){ echo 'class="active"'; } ?>>Fourth Grading</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="col col-md-9">
                <div class="box box-solid">
                    <div class="box-header ">
                        <h3 class="box-title sy_title">School Year: <?php echo $school_year_data["start_year"] ."-" . $school_year_data["end_year"] ; ?></h3>
                        <h3 class="box-title sy_title" style="margin-top: 10px !important;"><?php echo $periodText; ?></h3>
                        <div class="box-tools pull-right">
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
                                                    <th>Name</th>
                                                    <th>Ranking</th>
                                                    <th>Average</th>
                                                </tr>

                                                    <?php 
                                                        if (isset($grade7Students) && $grade7Students != null) {
                                                            foreach ($grade7Students as $std) { 
                                                                if ($std["grades"][$average_period] >= 88.000) {
                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $std["first_name"] .' '.$std["last_name"]; ?></td>
                                                                    <td><?php echo $std["rank"]; ?></td>
                                                                    <td><?php echo $std["grades"][$average_period]; ?></td>
                                                                </tr>
                                                    <?php
                                                                }
                                                            }
                                                        }
                                                    ?>
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
                                                    <th>Name</th>
                                                    <th>Ranking</th>
                                                    <th>Average</th>
                                                </tr>
                                                <?php 
                                                    if (isset($grade8Students) && $grade8Students != null) {
                                                        foreach ($grade8Students as $std) { 
                                                            if ($std["grades"][$average_period] >= 88.000) {
                                                ?>
                                                            <tr>
                                                                <td><?php echo $std["first_name"] .' '.$std["last_name"]; ?></td>
                                                                <td><?php echo $std["rank"]; ?></td>
                                                                <td><?php echo $std["grades"][$average_period]; ?></td>
                                                            </tr>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                                
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
                                                    <th>Name</th>
                                                    <th>Ranking</th>
                                                    <th>Average</th>
                                                </tr>
                                                <?php 
                                                    if (isset($grade9Students) && $grade9Students != null) {
                                                        foreach ($grade9Students as $std) { 
                                                            if ($std["grades"][$average_period] >= 88.000) {
                                                ?>
                                                            <tr>
                                                                <td><?php echo $std["first_name"] .' '.$std["last_name"]; ?></td>
                                                                <td><?php echo $std["rank"]; ?></td>
                                                                <td><?php echo $std["grades"][$average_period]; ?></td>
                                                            </tr>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                                
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
                                                    <th>Name</th>
                                                    <th>Ranking</th>
                                                    <th>Average</th>
                                                </tr>
                                                <?php 
                                                    if (isset($grade10Students) && $grade10Students != null) {
                                                        foreach ($grade10Students as $std) { 
                                                            if ($std["grades"][$average_period] >= 88.000) {
                                                ?>
                                                            <tr>
                                                                <td><?php echo $std["first_name"] .' '.$std["last_name"]; ?></td>
                                                                <td><?php echo $std["rank"]; ?></td>
                                                                <td><?php echo $std["grades"][$average_period]; ?></td>
                                                            </tr>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                                
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
                                                    <th>Name</th>
                                                    <th>Ranking</th>
                                                    <th>Average</th>
                                                </tr>
                                                <?php 
                                                    if (isset($grade11Students) && $grade11Students != null) {
                                                        foreach ($grade11Students as $std) { 
                                                            if ($std["grades"][$average_period] >= 88.000) {
                                                ?>
                                                            <tr>
                                                                <td><?php echo $std["first_name"] .' '.$std["last_name"]; ?></td>
                                                                <td><?php echo $std["rank"]; ?></td>
                                                                <td><?php echo $std["grades"][$average_period]; ?></td>
                                                            </tr>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                                
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
                                                    <th>Name</th>
                                                    <th>Ranking</th>
                                                    <th>Average</th>
                                                </tr>
                                                <?php 
                                                    if (isset($grade12Students) && $grade12Students != null) {
                                                        foreach ($grade12Students as $std) { 
                                                            if ($std["grades"][$average_period] >= 88.000) {
                                                ?>
                                                            <tr>
                                                                <td><?php echo $std["first_name"] .' '.$std["last_name"]; ?></td>
                                                                <td><?php echo $std["rank"]; ?></td>
                                                                <td><?php echo $std["grades"][$average_period]; ?></td>
                                                            </tr>
                                                <?php
                                                            }
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
    </section>
    
</div>

