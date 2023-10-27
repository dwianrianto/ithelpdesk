
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
			  
				
			<?php if($this->session->flashdata('sukses')){ ?>  
						<br/><br/>
					<?php echo $this->session->flashdata('sukses'); ?>
			<?php } ?>
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(); ?>dept/save" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Departement</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" required placeholder="Department Name">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Lokasi</label>
					<select name="loc" class="form-control" required>
				<?php foreach($location AS $loc){ ?>
						<option value="<?= $loc->id_location; ?>"><?= $loc->location_name; ?></option>
				<?php } ?>
					</select>
                </div>
              </div>
              <!-- /.box-body -->

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