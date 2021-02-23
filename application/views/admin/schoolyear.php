
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
          <div class="box-tools pull-right">
              <a class="btn btn-maroon" data-toggle="modal" data-target="#modal-create-sy"> <i class="fa fa-plus"></i> Add School Year</a>
          </div>
        </div>
        <div class="box-body">
            <div class="schoolyear">
                <div class="sy_div" v-for="sy in schoolyears">
                    <!-- <a href="<?php echo base_url();  ?>admin/#{{sy.sy_id | trimSpaces}}">  -->
                    <a :href="'SY/'+sy.sy_id"> 
                        <i class="fa fa-calendar"></i>
                        <span>SY {{ sy.start_year }}-{{ sy.end_year }}</span>
                    </a>
                    <div class="sy_controls">
                        <button class="btn btn-darkgreen" @click="updateSY( sy.sy_id )"> <i class="fa fa-pencil"></i> </button>
                        <button class="btn btn-maroon" @click="deleteSY( sy.sy_id )"> <i class="fa fa-trash"></i> </button>
                    </div>
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


        <div class="modal fade" id="modal-create-sy">
          <div class="modal-dialog modal-md">
            <div class="modal-content ">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create School Year</h4>
              </div>
              <form v-on:submit.prevent="submitCreateSY" id="createSYForm" action="#">
                <div class="modal-body">
                    <div id="response_msg" v-if="axiosResponse" >
                        <div class="callout" :class="axiosResponse.status">
                            <p>{{ axiosResponse.msg }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Start Year:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="start_year" id="start_sy_datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>End Year:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="end_year" id="end_sy_datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-maroon">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="modal-update-sy">
          <div class="modal-dialog modal-md" v-if="syToUpdate">
            <div class="modal-content ">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update School Year</h4>
              </div>
              <form v-on:submit.prevent="submitUpdateSY" id="updateSYForm" action="#">
                <div class="modal-body">
                    <div id="response_msg" v-if="axiosResponse" >
                        <div class="callout" :class="axiosResponse.status">
                            <p>{{ axiosResponse.msg }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Start Year:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="hidden" class="form-control pull-right" name="sy_id"  :value="syToUpdate.sy_id">
                            <input type="text" class="form-control pull-right" name="start_year" id="upt_start_sy_datepicker" :value="syToUpdate.start_year">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>End Year:</label>s
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="end_year" id="upt_end_sy_datepicker" :value="syToUpdate.end_year">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-maroon">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



        <!-- DELETE MODAL -->
            <div class="modal fade" id="confirmationDeleteSYModal">
                <div class="modal-dialog modal-sm ">
                    <div class="modal-content confirmModal">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this school year?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-maroon pull-left" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-darkgreen" @click="confirmationBtnDeleteSY()" >Yes</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>


             <div class="modal fade " id="synotificationModal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content notifymodal">
                        <div class="modal-header">
                            <h4 class="modal-title">Notification</h4>
                        </div>
                        <div class="modal-body" v-if="syDeleteResponse">
                            <div v-if="syDeleteResponse.code == 200">
                                <span class="fa fa-check" ></span> {{ syDeleteResponse.msg }}
                            </div>
                            <div v-else-if="syDeleteResponse.code == 204">
                                <i class="fa fa-exclamation-circle"></i></span> {{ syDeleteResponse.msg }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-maroon pull-right" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>



      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->