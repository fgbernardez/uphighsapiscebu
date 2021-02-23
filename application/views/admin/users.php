<style>
.pagination > li > a.current {
    background: #3c8dbc;
    color: #fff;
    border-color: #3c8dbc;
}

.btn-create-user{ margin-bottom: 5px; }
.btn-get-all-users{color: white; background:#751517; width: 43px; display: inline-block; text-align: center; line-height: 28px; vertical-align: middle; border-radius: 3px; margin: 0px 5px;}
</style>



<div id="app-users">

  <div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">

        <button class="btn btn-maroon btn-create-user" @click="createUser()" > <i class="fa fa-plus"></i> Create User</button>
    
        <div class="box box-darkgreen">
            <div class="box-header">
                <h3 class="box-title">Manage Users</h3>
                <div class="box-tools pull-right">
                    <form action="" method="POST" style="display: inline-block;vertical-align: middle;">
                    <div class="input-group input-group-sm hidden-xs" style="width: 250px; max-width: 100%;">
                        <input type="text" name="usr_search_key" class="form-control pull-right" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                    <a href="<?php echo base_url("admin/manage-users"); ?>" class="btn-get-all-users">All</a>
                    
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- <div class="control-btn">
                    <button class="btn btn-maroon"  @click="getAllUsers()">All</button>
                    <button class="btn btn-maroon" @click="getUsersBy('admin')">Admin</button>
                    <button class="btn btn-maroon" @click="getUsersBy('teacher')">Teacher</button>
                </div> -->
                <!-- <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                        <tr v-model="users" v-for="user in users">
                            <td>{{ user.first_name }}</td>
                            <td>{{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td class="user_type_td">{{ user.user_type }}</td>
                            <td v-if="user.active == 1"><span class="label label-success">Active</span></td>
                            <td v-else><span class="label label-danger">Inactive</span></td>
                            <td> <span class="btn btn-maroon" @click="deleteUser( user.user_id )"><i class="fa fa-trash"></i></span> <span class="btn btn-warning" @click="updateUser( user.user_id )"><i class="fa fa-pencil"></i></span></td>
                        </tr>
                    </tbody>
                </table> -->


                <!-- <div v-if="students"> -->
                    <!-- <table id="users-tbl" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-model="users" v-for="user in users">
                                <td>{{ user.first_name }}</td>
                                <td>{{ user.last_name }}</td>
                                <td>{{ user.email }}</td>
                                <td class="user_type_td">{{ user.user_type }}</td>
                                <td v-if="user.active == 1"><span class="label label-success">Active</span></td>
                                <td v-else><span class="label label-danger">Inactive</span></td>
                                <td> <span class="btn btn-maroon" @click="deleteUser( user.user_id )"><i class="fa fa-trash"></i></span> <span class="btn btn-warning" @click="updateUser( user.user_id )"><i class="fa fa-pencil"></i></span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                    </table> -->
                <!-- </div> -->

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                        <?php foreach( $users->result() as $user ){ ?>
                            <tr>
                                <td><?php echo $user->first_name; ?></td>
                                <td><?php echo $user->last_name; ?></td>
                                <td><?php echo $user->email; ?></td>
                                <td class="user_type_td"><?php echo $user->user_type; ?></td>
                                <?php if( $user->active == 1 ){ ?>
                                    <td ><span class="label label-success">Active</span></td>
                                <?php } else { ?>
                                    <td ><span class="label label-danger">Inactive</span></td>
                                <?php } ?>
                                <td> <span class="btn btn-maroon" @click="deleteUser( <?php echo $user->user_id; ?> )"><i class="fa fa-trash"></i></span> <span class="btn btn-warning" @click="updateUser( <?php echo $user->user_id; ?> )"><i class="fa fa-pencil"></i></span></td>
                            </tr>
                        <?php } ?>
                      
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->

            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                 <?php echo $this->pagination->create_links(); ?>
              </ul>
            </div>

        </div>

    </section>
  </div>


  


  <!-- MODALS -->
  
    <!-- CREARE USER MODAL -->
    <div class="modal fade" id="modal-create-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create User</h4>
                </div>
                <form v-on:submit.prevent="submitUser" id="createUserForm" action="#">
                    <div class="modal-body">
                        <div v-if="ajaxResponse">
                            <div class="callout" :class="ajaxResponseStatus" id="responsedata" >
                                <p>{{ ajaxResponse.msg }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" class="form-control" name="last_name"  id="" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <select class="form-control select2" style="width: 100%;" name="user_type" required>
                                <option value="teacher" selected="selected">Teacher</option>
                                <option value="admin">Admin</option>
                                <option value="superadmin">Super Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-darkgreen pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-maroon" >Submit</button>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- UPDATE USER MODAL -->
    <div class="modal fade" id="modal-update-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update User</h4>
                </div>
                <div v-if="userToUpdate">
                <form v-on:submit.prevent="saveUserUpdate" id="updateUserForm" action="#" method="POST">
                    <div class="modal-body">
                        <div v-if="ajaxResponse">
                            <div class="responsedata callout" :class="ajaxResponse.status">
                                <p>{{ ajaxResponse.msg }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" required v-model="userToUpdate.user_id">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" name="first_name"  id="upt_first_name" :value="userToUpdate.first_name" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" class="form-control" name="last_name"  id="upt_last_name" placeholder="Last Name" :value="userToUpdate.last_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" id="upt_email" :value="userToUpdate.email">
                        </div>

                         <div class="form-group">
                            <label for="exampleInputPassword1">Status</label>
                            <div v-if="userToUpdate.active == 1">
                                <select class="form-control select3" style="width: 100%;" name="active" >
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div v-else-if="userToUpdate.active == 0" >
                                <select class="form-control select2" style="width: 100%;" name="active">
                                    <option value="1" >Active</option>
                                    <option value="0" selected>Inactive</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label>User Type</label>
                            <div v-if="userToUpdate.user_type == 'teacher'">
                                <select class="form-control select2" style="width: 100%;" name="user_type" >
                                    <option value="teacher" selected>Teacher</option>
                                    <option value="admin">Admin</option>
                                    <option value="superadmin">Superadmin</option>
                                </select>
                            </div>
                            <div v-else-if="userToUpdate.user_type == 'admin'">
                                <select class="form-control select2" style="width: 100%;" name="user_type" >
                                    <option value="teacher" >Teacher</option>
                                    <option value="admin" selected>Admin</option>
                                    <option value="superadmin">Superadmin</option>
                                </select>
                            </div>
                            <div v-else-if="userToUpdate.user_type == 'superadmin'">
                                <select class="form-control select2" style="width: 100%;" name="user_type" >
                                    <option value="teacher" >Teacher</option>
                                    <option value="admin" >Admin</option>
                                    <option value="admin" selected>Superadmin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-darkgreen pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-maroon" >Save Changes</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- DELETE MODAL -->
    <div class="modal fade " id="confirmationModal">
        <div class="modal-dialog modal-sm ">
            <div class="modal-content confirmModal">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Do you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-maroon pull-left" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-darkgreen" @click="confirmationBtn()" >Yes</button>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>


        <!-- NOTIFICATION MODAL -->
    <div class="modal fade " id="notificationModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content notifymodal">
                <div class="modal-header">
                    <h4 class="modal-title">Notification</h4>
                </div>
                <div class="modal-body">
                    <div v-if="ajaxResponse">
                       <span class="fa fa-check" ></span> {{ ajaxResponse.msg }}
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
<!-- END USERS APP -->