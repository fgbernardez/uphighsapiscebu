<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if( $this->session->userdata("profile_img") == null ){ ?>
            <img src="<?php echo base_url();  ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          <?php }else { ?>
              <img class="img-circle" src="<?php echo base_url();  ?>assets/custom/images/profile_images/<?php echo $this->session->userdata("profile_img"); ?>" alt="User profile picture">
          <?php } ?>

        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("first_name") .' '.$this->session->userdata("last_name") ; ?></p>
          <a href="#" style="text-transform: capitalize;"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata("user_type"); ?></a>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();  ?>assets/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?php echo base_url();  ?>assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        <?php if( $this->session->userdata("user_type") == "admin" || $this->session->userdata("user_type") == "superadmin" ){ ?>
        <li>
          <a href="<?php echo base_url( "admin" );  ?>">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>
        <?php } ?>
        
        <?php if( $this->session->userdata("user_type") == "teacher" ){ ?>
        <li >
          <a href="<?php echo base_url();  ?>">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>
        <li class="treeview <?php if( $this->uri->segment(1) == "schoolyear" || $this->uri->segment(2) == "SY" ){ echo "active"; } ?>">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>School Year</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach( $schoolyears as $sy ){ ?>
              <li><a href="<?php echo base_url("schoolyear") .'/'.$sy["sy_id"]; ?>"><i class="fa fa-circle-o"></i> SY: <?php echo $sy["start_year"] .'-'.$sy["end_year"]; ?> </a></li>
            <?php } ?>
          </ul>
        </li>
        
        <li <?php if( $this->uri->segment(1) == "request" ){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url("request");  ?>">
            <i class="fa fa-bookmark-o"></i> <span>Request</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php if( $pending_request >= 1 ) { echo $pending_request; } ?></small>
            </span>
          </a>
        </li>

        <?php } ?>
        

        <?php if( $this->session->userdata("user_type") == "admin" || $this->session->userdata("user_type") == "superadmin"){ ?>

        <li class="treeview <?php if( $this->uri->segment(2) == "schoolyear" || $this->uri->segment(2) == "SY" ){ echo "active"; } ?>" >
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>School Year</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url("admin/schoolyear"); ?>"><i class="fa fa-plus"></i> Add School Year</a></li>
            <?php foreach( $schoolyears as $sy ){ ?>
              <li><a href="<?php echo base_url("admin/SY") .'/'.$sy["sy_id"]; ?>"><i class="fa fa-circle-o"></i> SY: <?php echo $sy["start_year"] .'-'.$sy["end_year"]; ?> </a></li>
            <?php } ?>
          </ul>
        </li>


        <li <?php if( $this->uri->segment(2) == "manage-students" || $this->uri->segment(2) == "student"  ){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url("admin/manage-students");  ?>">
            <i class="fa fa-users"></i> <span>Students</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li <?php if( $this->uri->segment(2) == "manage-users" ){ echo "class='active'"; } ?> >
          <a href="<?php echo base_url( "admin/manage-users" );  ?>">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">Hot</small> -->
            </span>
          </a>
        </li>

        <li <?php if( $this->uri->segment(2) == "request" ){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url("admin/request");  ?>">
            <i class="fa fa-bookmark-o"></i> <span>Request</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php if( $pending_request >= 1 ) { echo $pending_request; } ?></small>
            </span>
          </a>
        </li>

        <li <?php if( $this->uri->segment(2) == "history" ){ echo "class='active'"; } ?>>
          <a href="<?php echo base_url("admin/history");  ?>">
            <i class="fa fa-history"></i> <span>History</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  