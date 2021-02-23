

<div id="profile-app">
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">

    
        <div class="box box-solid box-user-profile-info">
            <!-- <div class="box-header">
                <h3 class="box-title">Manage Users</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-maroon" @click="createUser()" > <i class="fa fa-plus"></i> Create User</button>
                </div>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body ">
                <div id="profile">
                    <div class="profile_cont">
                        <div class="profile_head">
                            <h4 class="pull-left">Personal Information</h4>
                            <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-pencil"></i> </button>
                        <div class="clearfix"></div>
                        </div>
                        <?php if($this->session->tempdata() != null) { ?>
                            <div class="callout <?php echo $this->session->tempdata("status") ?>" style="margin-top: 10px;">
                                <p><?php  echo $this->session->tempdata("msg"); ?></p>
                            </div>
                        <?php } ?>

                        <div class="profile_body">
                            <div class="profile_pic">
                                <?php if( $this->session->userdata("profile_img") == null ){ ?>
                                    <figure><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();  ?>assets/dist/img/user2-160x160.jpg" alt="User profile picture"></figure>
                                <?php }else { ?>
                                    <figure><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();  ?>assets/custom/images/profile_images/<?php echo $this->session->userdata("profile_img"); ?>" alt="User profile picture"></figure>
                                <?php } ?>
                            </div>
                            <div class="profile_info">
                                <p>First Name: <span> <?php echo $this->session->userdata("first_name"); ?> </span></p>
                                <p>Last Name: <span> <?php echo $this->session->userdata("last_name"); ?> </span></p>
                                <!-- <p>First Name: <span></span></p> -->
                                <p>Email: <span> <?php echo $this->session->userdata("email"); ?> </span></p>
                                <p>Password: <span>*************</span></p>
                                <p>User Type: <span> <?php echo $this->session->userdata("user_type"); ?> </span></p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </section>
  </div>




        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Profle</h4>
              </div>
              <form action="" method="POST"   enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" value="<?php echo $this->session->userdata("first_name"); ?>" placeholder="Enter last name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="exampleInputEmail1" value="<?php echo $this->session->userdata("last_name"); ?>"  placeholder="Enter first name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Enter password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Re-Type Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="retype_password" placeholder="Enter password">
                    </div>

                    <div class="form-group">
                    <label for="exampleInputFile">Profile Image</label>
                    <input type="file" id="exampleInputFile" name="profile_img" >
                    <p class="help-block">Upload 2x2 picture.</p>
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

</div>
