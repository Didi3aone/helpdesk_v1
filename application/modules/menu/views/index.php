<section class="content">
     <div class="row">
     	<div style="float: right; margin-right: 10px; margin-top: 10px; margin-bottom: 10px;">
        	<a href="<?= site_url('menu/create'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
		                  	<th>Menu Name</th>
		                  	<th>Menu Icon</th>
		                  	<th>Menu Controller</th>
		                  	<th>Menu Group</th>
		                  	<th>Action</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php 
	                		if(!empty($datas)) :
	                			foreach($datas as $key => $value) :
	                	?>
		                <tr>
		                	<td><?= $value['menu_id']; ?></td>
		                  	<td><?= $value['menu_name']; ?></td>
		                  	<td><?= $value['menu_icon']; ?></td>
		                  	<td><?= $value['menu_controller_name'] ?></td>
		                  	<td><?= $value['menu_group_name']; ?></td>
		                  	<td>X</td>
		                </tr>
	                  	<?php 
		                  		endforeach;
		                  	endif;
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