<style>

.pagination > li > a.current {
    background: #3c8dbc;
    color: #fff;
    border-color: #3c8dbc;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    text-transform: none;
}
</style>

<div class="content-wrapper">
    <section class="content-header">
    </section>
    <section class="content">
    
    
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">History</h3>

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
                            <th>Description</th>
                            <th>Date and Time</th>
                        </tr>

                        <?php
                        date_default_timezone_set('Asia/Manila');
                            
                        foreach( $histories->result() as $his ){
                                $date = new DateTime($his->date_created);
                                echo "<tr>";
                                    echo "<td>" . $his->description . '</td>';
                                    echo "<td>" . $date->format('F d Y, h:i:s A') . '</td>';
                                echo "<tr>";
                            }
                        ?>
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
          
        
    </section>
  </div>
</div>
