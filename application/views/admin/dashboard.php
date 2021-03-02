
  <!-- Content Wrapper. Contains page content -->


<style>
  .box.box-solid > .box-header .btn:hover, .box.box-solid > .box-header a:hover{ background: #0c4324; }
  </style>




  <div id="dashboard-app">
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-solid">
        <div class="box-header">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-maroon" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-pencil"></i> Update Date
              </button>
            </div>
          </div>
        <div class="box-body">
            <div id="countdowntimer">
              <div class="count_down">
                <div class="count_cont">
                  <figure>
                    <img src="<?php echo base_url(); ?>assets/custom/images/sand_glass.gif" alt="count down clock">
                  </figure>

                  <div class="timer_count">
                    <div>
                      <h4 id="days_exp">0</h4>
                      <span>Days</span>
                    </div>
                    <div>
                      <h4 id="hours_exp">0</h4>
                      <span>Hours</span>
                    </div>
                    <div>
                      <h4 id="minutes_exp">0</h4>
                      <span>Minutes</span>
                    </div>
                    <div>
                      <h4 id="seconds_exp">0</h4>
                      <span>Seconds</span>
                    </div>
                  </div>
                  <p v-if="deadlineDate"> The submission of {{ grading }} grade is until {{ deadlineDate.date_deadline }}. </p>
                </div>
              </div>
            </div>
            <div id="default_counter">
              <?php if( $this->session->userdata("user_type") == "admin"){ ?>
                <p>Click "Update Date" button to set the deadline date for submitting grade.</p>
              <?php } else { ?>
                <p>Hello <span><?php echo $this->session->userdata("first_name")." ".$this->session->userdata("middle_name")." ". $this->session->userdata("last_name") ?></span></p>
              <?php } ?> 
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Update deadline for submitting grades:</h4>
          </div>
          <form action="" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label>Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="date_deadline" id="date_deadline" value="<?php echo date("m/d/Y"); ?>">
                </div>
                <!-- /.input group -->
              </div>
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Time:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control timepicker" name="time_deadline">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="form-group">
                  <label>Grading</label>
                  <select class="form-control select2" style="width: 100%;" name="grading">
                    <option value="1">First Grading</option>
                    <option value="2">Second Grading</option>
                    <option value="3">Third Grading</option>
                    <option value="4">Fourth Grading</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>School Year</label>
                  <select class="form-control select2" style="width: 100%;" name="sy_id">
                    <?php foreach( $schoolyears as $sy ) { ?>
                      <option value="<?php echo $sy["sy_id"]; ?>"><?php echo $sy["start_year"] . "-" . $sy["end_year"]; ?></option>
                    <?php } ?>
                    <!-- <option value="1">First Grading</option>
                    <option value="2">Second Grading</option>
                    <option value="3">Third Grading</option>
                    <option value="4">Fourth Grading</option> -->
                  </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-maroon">Save</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    </div>