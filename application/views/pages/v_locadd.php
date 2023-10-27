
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Tambah <?= $judul; ?> Baru
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
              <h3 class="box-title">Isi Form <?= $judul; ?></h3>
			  
				
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
			<?php echo form_open('location/add'); ?>
			
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Location Name</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" required placeholder="Location Name">
                </div>
              </div>
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