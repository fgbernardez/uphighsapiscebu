  <div id="dashboard-app">
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
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
                    <p v-if="deadlineDate">Hello <?php echo $this->session->userdata("first_name")." ".$this->session->userdata("last_name") ?><br> Please submit the {{ grading }} grade before {{ deadlineDate.date_deadline }}!<br> Thank you! </p>
                    
                  </div>
                </div>
              </div>
              <div id="default_counter">
                <?php if( $this->session->userdata("user_type") == "admin"){ ?>
                  <p>Click "Update Date" button to set the deadline date for submitting grade.</p>
                  
                <?php } else { ?>
                  <p>Hello <span><?php echo $this->session->userdata("first_name")." ".$this->session->userdata("last_name") ?></span></p>
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
</div>