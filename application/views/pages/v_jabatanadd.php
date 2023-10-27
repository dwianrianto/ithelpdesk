
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
            <form role="form" action="<?php echo base_url(); ?>jabatan/save" method="post">
              <div class="box-body">
			  <div class="form-group">
                  <label for="exampleInputEmail1">Lokasi</label>
					<select name="location" id="location" class="form-control" required>
						<option>--- Pilih Location ---</option>
						<?php foreach($location AS $loc){ ?>
								<option value="<?= $loc->id_location; ?>">
									<?= $loc->location_name; ?>
								</option>
						<?php } ?>
					</select>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Departemen</label>
				  <select name="dept" id="dept" class="form-control" required>
						<option>--- Pilih Department ---</option>
						<?php foreach($department AS $dept){ ?>
						<option id="dept" class="<?= $dept->id_location; ?>" value="<?= $dept->id_dept; ?>">
							<?= $dept->dept_name; ?>
						</option>
						<?php } ?>
					</select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Jabatan</label>
                  <input type="text" name="nama" class="form-control" required id="exampleInputEmail1" placeholder="Jabatan Name">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
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
  
  
  
<script src="<?php echo base_url(); ?>assets/dropdown/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dropdown/jquery.chained.min.js"></script>
        <script>
            $("#dept").chained("#location");
            $("#jab").chained("#dept");
        </script>
  
  
  