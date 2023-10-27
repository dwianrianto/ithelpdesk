
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		 Ubah <?= $judul; ?>
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
              <h3 class="box-title">Ubah Form <?= $judul; ?></h3>
			  
				
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<table width="50%" height="10px">
				<tr>
					<td>
				<?php echo $this->session->flashdata('sukses'); ?>
					</td>
				</tr>
			</table>
			<?php echo form_open('location/save_edit'); ?>
			
					<?php foreach($user AS $users){ ?>
					
					
						<input type="hidden" name="id" value="<?= $users->id_location; ?>" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Location Name</label>
                  <input type="text" value="<?= $users->location_name; ?>" required name="nama" class="form-control" id="exampleInputEmail1" placeholder="Location Name">
                </div>
              </div>
					<?php } ?>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="simpan" />
              </div>
			  <?php echo form_close(); ?>
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