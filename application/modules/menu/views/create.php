<!--Main content -->
<section class="content" style="margin-left: 99px;">
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $title_form; ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="menu-form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Menu Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Menu Name">
                        </div>

                        <div class="form-group">
                            <label>Menu Icon</label>
                            <input type="text" name="icon" class="form-control" id="" placeholder="Menu Icon">
                            <i>Example:fa-plus {+} </i>
                        </div>
                        
                        <div class="form-group">
                            <label>Controller Name</label>
                            <input type="text" name="controller" class="form-control" id="" placeholder="Controller Name">
                        </div>

                        <div class="form-group">
                            <label>Menu Url</label>
                            <input type="text" name="url" class="form-control" id="" placeholder="Menu Url">
                            <i>Example:/create-group </i>
                        </div>

                        <div class="form-group">
                            <label>Menu Action</label>
                            <select name="action" class="form-control">
                                <option value="0">-- choose --</option>
                                <option value="1">CRUD</option>
                                <option value="2">EXPORT/IMPORT</option>
                            </select>
                            <!-- <i>opsional</i> -->
                        </div>

                        <div class="form-group">
                            <label>Menu Group</label>
                            <select name="group" class="form-control">
                                <option value="0">-- choose --</option>
                                <?php 
                                    foreach( $group as $key => $val ) : ?>
                                        <option value="<?= $val['menu_group_id']; ?>"><?= $val['menu_group_name']; ?></option>
                                    <?php endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="button" id="button-save" class="btn btn-primary"> Submit</button>
                        <a href="<?= site_url('menu'); ?>" class="btn btn-danger">cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>