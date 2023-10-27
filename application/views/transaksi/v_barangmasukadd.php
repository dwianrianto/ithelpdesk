

	
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
              <h3 class="box-title">Create New Form <?= $judul; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(); ?>barang_masuk/save" method="post">
			
			
			<input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>" />
			
			
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Service</label>
                <select name="jenis" id="jenis" class="form-control">
						<option>- Pilih Jenis -</option>
					<?php foreach($ja AS $jenis){ if($jenis->id_jenis == '1'){ ?>
						<option value="<?= $jenis->id_jenis; ?>"><?= $jenis->jenis_name; ?></option>
					<?php } } ?>
				</select>
              </div>
			  
              <div class="form-group">
                <label>Nama Asset</label>
                <select name="asset" id="asset" class="form-control">
						<option>- Pilih Asset -</option>
					<?php foreach($an AS $asset_n){?>
						<option id="asset" class="<?= $asset_n->id_jenis; ?>" value="<?= $asset_n->id_asset; ?>">
							<?= $asset_n->asset_name; ?>
						</option>
					<?php } ?>
				</select>
              </div>
			  
              <div class="form-group">
				<a class="button" href="#popup1"><span class="label label-success">+ Add new</span></a>
					&nbsp;
				<label>Model Asset</label>
				
                <!-- /btn-group -->
				
                <select name="model" id="model" class="form-control">
						<option>- Pilih Model -</option>
					<?php foreach($ma AS $model){ ?>
						<option id="model" class="<?= $model->id_asset; ?>" value="<?= $model->id_detail; ?>">
							<?= $model->model_name; ?> <?= $model->basis; ?> <?= $model->version_name; ?>
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
                <label>Jumlah Barang Masuk</label>
					<input type="number" name="qty" class="form-control" />
              </div>
			  <div class="form-group">
                <label>Tanggal Masuk</label>
				<input type="date" name="tgl_masuk" class="form-control" />
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Keterangan</label>
				<textarea class="form-control" name="note"></textarea>
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
		
			
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Created by</h3>
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
					<?= $pengaju->jabatan_name; ?>
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
			  
			  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
<script src="<?php echo base_url(); ?>assets/dropdown/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dropdown/jquery.chained.min.js"></script>
        <script>
            $("#asset").chained("#jenis");
            $("#model").chained("#asset");
        </script>




<style class="cp-pen-styles">

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 2;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: white;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  font-size:20px;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: red;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .popup{
	  margin-top:120px;
    width: 70%;
  }
}
</style>

<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Tambah Asset Model Baru</h2>
			<hr/>
		<a class="close" href="#">&times;</a>
		<div class="content">
		
			<form role="form" action="<?php echo base_url(); ?>barang_masuk/save_modal" method="post">
				<div class="form-group">
                  <label for="exampleInputEmail1">Jenis Asset</label>
                  <select name="jenis_m" class="form-control">
						<option value="1">HARDWARE</option>
					</select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Asset Name</label>
				  <select name="asset_m" class="form-control">
						<?php foreach($an AS $asset_m){ if($asset_m->id_jenis == 1){?>
							<option value="<?= $asset_m->id_asset; ?>">
								<?= $asset_m->asset_name; ?>
							</option>
						<?php } } ?>
					</select>
                </div>
				<div class="form-group">
                  <label for="exampleInputPassword1">Asset Model</label>
                  <input type="text" name="model_m" class="form-control" placeholder="Asset Model">
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
				</div>
            </form>
			
		</div>
	</div>
</div>


