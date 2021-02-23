
<style>

    #modal-update-request  p{color: black; font-size: 14px; }
    #modal-update-request  p span{font-weight: 600; color: maroon;}
    .box-body > .table {margin-bottom: 0;text-align: center;}
    .box-body > .table tr th{ text-align: center; }
    .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{ text-transform: capitalize; }
    .pagination > li > a.current {
        background: #3c8dbc;
        color: #fff;
        border-color: #3c8dbc;
    }

    
</style>


<div id="teacher_request_app">
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

    
            <!-- Default box -->
            <div class="box box-solid">
                <div class="box-body">
                    <div class="box box-maroon">
                        <div class="box-header">
                            <h3 class="box-title">All Request</h3>

                            <!-- <div class="box-tools">
                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Student</th>
                                        <th>Subject</th>
                                        <th>Grade</th>
                                        <th>School Year</th>
                                        <th>Grading</th>
                                        <th>Reason</th>
                                        <th>Request Attempt</th>
                                        <th>Status</th>
                                        <th>Deadline Date</th>
                                        <th>Requested Date</th>
                                        <th></th>
                                    </tr>
                                    <!-- <tr v-for="req in allRequest" >
                                        <td> <a :href="'manage-student/'+req.sy_id+'/'+req.subject_id+'/'+req.student_id">{{ req.name }}</a> </td>
                                        <td>{{ req.subject_name }}</td>
                                        <td>{{ req.grade_level }}</td>
                                        <td>{{ req.start_year }} - {{ req.end_year }} </td>
                                        <td>{{ req.grading }}</td>
                                        <td> <span class="btn btn-primary" @click="viewreason( req.reason )"> <i class=" fa fa-eye"></i></span> </td>
                                        <td> {{ req.request_attempt }} </td>
                                        <td>
                                            <span class="label label-success " v-if="req.req_status == 'Accepted'" >{{ req.req_status }}</span>
                                            <span class="label label-warning " v-if="req.req_status == 'Pending'"> {{ req.req_status }} </span>
                                            <span class="label label-danger " v-if="req.req_status == 'Declined'"> {{ req.req_status }} </span>
                                        </td>
                                        <td>{{ req.deadline_date }}</td>
                                        <td>
                                            {{ req.requested_at }}
                                        </td>
                                        <td><span class="btn btn-warning" @click="updateRequest( req.request_id )" > <i class="fa fa-pencil"></i> </span>  <span class="btn btn-maroon" @click="deleteRequest( req.request_id )"> <i class="fa fa-trash"></i> </span> </td>
                                    </tr> -->

                                    <?php foreach( $all_request->result() as $req ){ 
                                        $req_date = new DateTime($req->requested_at);

                                    ?>
                                        <tr>
                                            <td> <a href="<?php echo base_url("manage-student/" . $req->sy_id . "/" . $req->subject_id ."/" . $req->student_id ); ?>"><?php echo $req->first_name.' '.$req->last_name; ?></a> </td>
                                            
                                            <td><?php echo $req->subject_name; ?></td>
                                            <td><?php echo $req->grade_level; ?></td>
                                            <td><?php echo $req->start_year ." - ".$req->end_year; ?></td>
                                            <td><?php echo $req->grading; ?></td>
                                        
                                            <td><span class="btn btn-primary" @click="viewreason( '<?php echo $req->reason; ?>' )"> <i class=" fa fa-eye"></i></span> </td>
                                            <td><?php echo $req->request_attempt; ?></td><td>
                                            <span class="label
                                                <?php 
                                                    if( $req->req_status == 'Pending' )
                                                        { echo 'label-warning'; } 
                                                    else if( $req->req_status == 'Accepted' ){
                                                        { echo 'label-success'; } 
                                                    } else {
                                                        { echo 'label-danger'; } 
                                                    }
                                                ?>">
                                                <?php echo $req->req_status; ?></td>
                                            </span>
                                            <td><?php echo $req->deadline_date; ?></td>
                                            <td>
                                                <?php echo $req_date->format('F d, Y h:i:s a'); ?>
                                            </td>
                                           <td><span class="btn btn-warning" @click="updateRequest( <?php echo $req->request_id; ?> )" > <i class="fa fa-pencil"></i> </span>  <span class="btn btn-maroon" @click="deleteRequest( <?php echo $req->request_id; ?> )"> <i class="fa fa-trash"></i> </span> </td>
                                        </tr> 
                                    <?php } ?>

                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="modal-update-request">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Update Request</h4>
        </div>
        <form v-on:submit.prevent="submitupdateRequest" id="updateRequestForm" method="POST" >
            <div class="modal-body" v-if="requestToUpdate" id="">
                <div class="responsedata_div" v-if="responseData">
                    <div class="callout " :class="responseData.status">
                        <p style="color: #fff;">{{ responseData.msg }}</p>
                    </div>
                </div>
                <div class="row">

                    <div class="col col-md-6">
                        <p> Student Name: <br><span>{{ requestToUpdate.first_name }} {{ requestToUpdate.last_name }}</span> </p>
                        <p> Grade Level: <br><span>{{ requestToUpdate.grade_level }}</span> </p>
                    </div>
                    <div class="col col-md-6">
                        <p> School Year: <br><span>{{ requestToUpdate.start_year }} - {{ requestToUpdate.end_year }} </span> </p>
                        <p> Grading: <br> <span>{{ requestToUpdate.grading }}</span> </p>
                    </div>
                    <div class=" col col-md-12">
                        <div class="form-group">
                            <label>Reason: </label>
                            <input type="hidden" name="request_id" :value="requestToUpdate.request_id">
                            <textarea rows="3" name="reason" placeholder="Enter reason ..." required="required" class="form-control" :value="requestToUpdate.reason"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-maroon">Save changes</button>
        </div>
        </form>
        
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade " id="viewreasonModal">
        <div class="modal-dialog modal-md ">
            <div class="modal-content" style="border-top: 5px solid #00a65a;">
                <div class="modal-header">
                    <h4 class="modal-title">Reason:</h4>
                </div>
                <div class="modal-body">
                   <p v-if="reasondetails"> {{ reasondetails }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-maroon pull-right" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal fade " id="confirmationModal">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content confirmModal">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Do you want to delete this request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-maroon pull-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-darkgreen" @click="confirmationBtn()" >Yes</button>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
