<div class="login-box">
  <div class="login-logo">
    <!-- <a href="../../index2.html"><b>Admin</b>LTE</a> -->
    <figure>
        <img src="<?php echo base_url(); ?>assets/custom/images/company_logo.png" alt="">
    </figure>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <form id="createadminuserform" action="" method="POST" >
    <p class="login-box-msg">Create admin user</p>
        
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="first_name" placeholder="Enter first name" required>
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
        </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="last_name" placeholder="Enter last name" required>
            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
        </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-maroon btn-block btn-flat">Create</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
