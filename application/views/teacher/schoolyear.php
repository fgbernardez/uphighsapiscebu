
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
      <div id="app-schoolyear">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">

    
      <!-- Default box -->
      <div class="box box-darkgreen">
        <div class="box-header with-border">
          <h3 class="box-title">School Year</h3>
        </div>
        <div class="box-body">
            <div class="schoolyear">
                <div class="sy_div">
                    <!-- <a href="<?php echo base_url();  ?>admin/#{{sy.sy_id | trimSpaces}}">  -->
                    
                   
                    <?php foreach( $schoolyears as $sy ){?>
                        <a href="schoolyear/<?php echo $sy["sy_id"]; ?>"> 
                            <i class="fa fa-calendar"></i>
                            <span>SY: <?php echo $sy["start_year"] .'-'.$sy["end_year"]; ?></span>
                        </a>
                    <?php } ?>

                </div>
                <!-- <div class="sy_div">
                    <a href="#"> 
                        <i class="fa fa-calendar"></i>
                        <span>SY 2018-2019</span>
                    </a>
                    <div class="sy_controls">
                        <button class="btn btn-darkgreen"> <i class="fa fa-pencil"></i> </button>
                        <button class="btn btn-maroon"> <i class="fa fa-trash"></i> </button>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
