
<div class="modal fade " id="modal-logout-confirmation">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-body">
                <p style="color:#751517; font-weight: 500; font-size: 15px;">Are you sure you want to log out?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" id="logout-btn" class="btn btn-danger" style="background-color:#751517; border-color: #751517;">Yes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        
<div class="wrapper">
  <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url();  ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>UPHS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>UPHS</b> SAPIS</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if( $this->session->userdata("profile_img") == null ){ ?>
                    <img src="<?php echo base_url();  ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <?php }else { ?>
                    <img class="user-image" src="<?php echo base_url();  ?>assets/custom/images/profile_images/<?php echo $this->session->userdata("profile_img"); ?>" alt="User profile picture">
                <?php } ?>




                <span class="hidden-xs"><?php echo $this->session->userdata("first_name") .' '.$this->session->userdata("last_name") ; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

                <?php if( $this->session->userdata("profile_img") == null ){ ?>
                  <img src="<?php echo base_url();  ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <?php }else { ?>
                    <img class="img-circle" src="<?php echo base_url();  ?>assets/custom/images/profile_images/<?php echo $this->session->userdata("profile_img"); ?>" alt="User profile picture">
                <?php } ?>

                  <p>
                  <?php echo $this->session->userdata("first_name") .' '.$this->session->userdata("last_name") ; ?> - <?php echo $this->session->userdata("user_type"); ?>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <?php if( $this->session->userdata("user_type") == "admin" || $this->session->userdata("user_type") == "superadmin" ){ ?>
                      <a href="<?php echo base_url("admin/profile"); ?>" class="btn btn-default btn-flat">Profile</a>
                    <?php } else { ?>
                      <a href="<?php echo base_url("profile"); ?>" class="btn btn-default btn-flat">Profile</a>
                    <?php } ?>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="javascript:;" data-toggle="modal" data-target="#modal-logout-confirmation"><i class="fa fa-sign-out"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
