

	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Isi Form <?= $judul; ?></h3>
			  
				
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(); ?>pengajuan/save" method="post">
			
			
			<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>" />
			
			
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Asset</label>
                <select name="jenis" id="jenis" class="form-control" required>
						<option value=""> - Pilih Jenis -</option>
					<?php foreach($ja AS $jenis){ ?>
						<option value="<?= $jenis->id_jenis; ?>"><?= $jenis->jenis_name; ?></option>
					<?php } ?>
				</select>
              </div>
              <div class="form-group">
                <label>Nama Asset</label>
                <select name="model" id="asset" class="form-control" required>
						<option>- Pilih Asset -</option>
					<?php foreach($an AS $asset_n){ ?>
						<option id="asset" class="<?= $asset_n->id_jenis; ?>" value="<?= $asset_n->id_asset; ?>">
							<?= $asset_n->asset_name; ?>
						</option>
					<?php } ?>
				</select>
              </div>
              <!-- /.form-group -->
				
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Prioritas Kerja</label>
                <select class="form-control select2" name="wp" style="width: 100%;" required>
                  <option selected="selected">Normal</option>
                  <option>Medium</option>
                  <option>Urgent</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Pesan Untuk Teknisi</label>
				<textarea class="form-control" name="note" required></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
			<input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
			
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
		
			
        <div class="col-md-3">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Detail Pemohon</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
			  
			  <?php foreach($user AS $pengaju){ ?>
              <div class="form-group">
                <label>Nama User</label>

                <div class="input-group">
					<?= $pengaju->nama_lengkap; ?>
                </div>
                <!-- /.input group -->
              </div>
			  
              <div class="form-group">
                <label>Department</label>

                <div class="input-group">
					<?= $pengaju->dept_name; ?>
                </div>
                <!-- /.input group -->
              </div>
			  
              <div class="form-group">
                <label>Jabatan</label>

                <div class="input-group">
					Recruitment
                </div>
                <!-- /.input group -->
              </div>
			  
			  <div class="form-group">
                <label>Lokasi</label>

                <div class="input-group">
					<?= $pengaju->location_name; ?>
                </div>
                <!-- /.input group -->
              </div>
			  <?php } ?>
			  
			 </div> 
			 </div> 
			 </div> 
			  
			  
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Riwayat Pengajuan</h3>
            </div>
            <div class="box-body">
				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
<script src="<?php echo base_url(); ?>assets/dropdown/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dropdown/jquery.chained.min.js"></script>
        <script>
            $("#asset").chained("#jenis");
            // $("#model").chained("#asset");
        </script>
