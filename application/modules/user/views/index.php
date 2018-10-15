<section class="content">
     <div class="row">
     	<div style="float: right; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;">
        	<a href="<?= site_url('user/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  		</div>
        <div class="col-xs-12">
          	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title"><?= $title_form; ?></h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example2" class="table table-bordered table-striped">
	                <thead>
		                <tr>
		                  	<th>#</th>
		                  	<th>Full Name</th>
		                  	<th>Email</th>
		                  	<th>Level</th>
		                  	<th>Login Status</th>
		                  	<th>Login Time</th>
		                  	<th>Logout TIme</th>
		                  	<th>User Menu ID</th>
		                  	<th>Action</th>
		                </tr>
	                </thead>
	                <tbody>
	                  	<?php 
	                  		$no = 1;
							foreach( $datas as $key => $val ) : ?>
								<td><?= $no++; ?></td>
								<td><?= $val['UserFullName']; ?></td>
								<td><?= $val['UserEmail']; ?></td>
								<td><?= $val['role_name']; ?></td>
								<td><?= $val['State']; ?></td>
								<td><?= $val['UserLoginTime']; ?></td>
								<td><?= $val['UserLogoutTime']; ?></td>
								<td><?= $val['menu_id']; ?></td>
								<td></td>
							<?php 
							endforeach;
	                  	?>
	                </tfoot>
	              </table>
	            </div>
	            <!-- /.box-body -->
         	</div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
      <!-- /.row -->
</section>
    <!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->