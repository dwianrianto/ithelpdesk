
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit New <?= $judul; ?>
      </h1>
    </section>
	

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data <?= $judul; ?></h3>
			  
				
			<?php if($this->session->flashdata('sukses')){ ?>  
						<br/><br/>
					<?php echo $this->session->flashdata('sukses'); ?>
			<?php } ?>
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
			<?php foreach($user AS $du){ ?>
			
            <form role="form" action="<?php echo base_url(); ?>users/save_edit" method="post">
			<input type="hidden" value="<?= $du->id; ?>" name="id" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" value="<?= $du->nama_lengkap; ?>" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" value="<?= $du->username; ?>" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Level</label>
					<select name="level" class="form-control">
						<option <?php if($du->level == 'admin'){echo "selected";} ?>>admin</option>
						<option <?php if($du->level == 'user'){echo "selected";} ?>>user</option>
					</select>
                </div>
              </div>
              <!-- /.box-body -->
				
				<?php } ?>
				
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->