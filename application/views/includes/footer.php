


<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/custom/js/custom.js" type="module"></script>

<?php if( $this->uri->segment(2) == "manage-users" ){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/users.js" type="module"></script>
<?php } else if( $this->uri->segment(2) == "schoolyear" ){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/schoolyear.js" type="module"></script>
<?php } else if( $this->uri->segment(2) == "manage-students" ){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/student.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "SY" && $this->uri->segment(4) != null && $this->uri->segment(5) == null){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/school_year_grade_level.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "SY" && $this->uri->segment(4) != null && $this->uri->segment(5) != null){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/admin_manage_student.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == "manage-student" ){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/teacher_manage_student.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == "admin" && $this->uri->segment(2) == null ){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/dashboard.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == null ){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/dashboard.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == "request"){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/teacher_request.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "request"){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/admin_request.js" type="module"></script>
<?php } else if( $this->uri->segment(1) == "admin" && $this->uri->segment(2) == "summary-of-grades"){ ?>
  <script src="<?php echo base_url(); ?>assets/custom/js/summary_of_grades.js" type="module"></script>
<?php } ?>

<script>
  $(function () {



    $( "#logout-btn" ).click( function(){
      window.location.href = "<?php echo base_url("logout"); ?>";
    } );
    
    // $(".callout").hide(1000);
    $('.select2').select2()
    $('.select3').select2()
    // $('#students-tbl').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });


    //Date picker
    $('#start_sy_datepicker, #end_sy_datepicker, #upt_start_sy_datepicker, #upt_end_sy_datepicker').datepicker({
      autoclose: true,
      minViewMode: 2,
      format: 'yyyy'
    });

  

    $('#birthdate, #uptbirthdate').datepicker({
      format: 'yyyy-mm-dd'
    });

    //Date picker
    $('#date_deadline, #deadline_date').datepicker({
      autoclose: true
    });

    // $('#datetosubmit').datepicker({
    //   autoclose: true
    // });

    // $('#end_sy_datepicker').datepicker({
    //   autoclose: true,
    //   minViewMode: 2,
    //   format: 'yyyy'
    // })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    });


  })

  $(document).ready(function () {
    $('.sidebar-menu').tree();
    $(".callout").fadeOut(3000);
  });
</script>
</body>
</html>
