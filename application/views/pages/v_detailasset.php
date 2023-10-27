


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
  max-height: 20%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .popup{
	margin-top:120px;
	width: 70%;
  }
}


.popup2 {
  margin: 70px auto;
  padding: 20px;
  background: #e3e7ed;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.overlay2 {
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
.overlay2:target {
  visibility: visible;
  opacity: 2;
}

.popup2 h2 {
  margin-top: 0;
  font-size:20px;
}
.popup2 .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup2 .close:hover {
  color: red;
}
.popup2 .content {
  max-height: 20%;
  overflow: auto;
}
</style>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail <?= $judul; ?>
	  </h1>
    </section>
	
			
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
		  
			<?php if($this->session->flashdata('sukses')){ ?>
								<table align="right">
									<tr>
										<td>
									<?php echo $this->session->flashdata('sukses'); ?>
										</td>
									</tr>
								</table>
							<?php } ?>
							
            <form role="form" action="<?php echo base_url(); ?>assets_it/save" method="post">
				
				<?php foreach($asset AS $kategori){ $id=$kategori->id_asset;?>
				
              <div class="box-body">
				<div class="form-group">
                  <label for="exampleInputEmail1">Jenis Asset</label>
                  <select name="jenis" class="form-control" disabled>
						<option value="1" <?php if($jenis=$kategori->id_jenis == '1'){echo "selected";} ?>>HARDWARE</option>
						<option value="2" <?php if($kategori->id_jenis == '2'){echo "selected";} ?>>SOFTWARE</option>
					</select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kategori Asset</label>
                  <input type="text" name="nama" disabled value="<?= $nama_kategori=$kategori->asset_name; ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori Asset">
                </div>
              </div>
			  
				<?php } ?>
			  
            </form>
          </div>
          </div>
          </div>
          <!-- /.box -->
		
			
        <div class="col-xl-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title"><span class="label label-info">List Model Kategori Asset</span></h3>
				
				<a class="button" href="#popup1"><span class="label label-success">+ Tambah Model Baru</span></a>
			</div>
            <div class="box-body">
				
				
            <div class="box-body no-padding">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Model Asset</th>
					  <th>Nama Asset</th>
					  <th>Jenis Asset</th>
					  <th>Jumlah Asset Gudang</th>
					  <th>Status</th>
					  <th>Action</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($detail_asset AS $du){ ?>
					
													<div id="popup2-<?= $du->id_detail; ?>" class="overlay">
														<div class="popup2">
															<h2>Ubah Model Asset</h2>
																<hr/>
															<a class="close" href="#">&times;</a>
															<div class="content">
															
																<form role="form" action="<?php echo base_url(); ?>assets_it/save_editmodal" method="post">
																
																	<input type="hidden" name="id_detail" value="<?= $du->id_detail; ?>" />
																	<input type="hidden" name="id_asset" value="<?= $du->id_asset; ?>" />
																	<div class="form-group">
																	  <label for="exampleInputPassword1">Asset Kategori</label>
																		<br/>
																	  <input type="text" disabled value="<?= $nama_kategori; ?>" class="form-control" placeholder="Asset Model">
																	</div>
																	<div class="form-group">
																	  <label for="exampleInputPassword1">Asset Model</label>
																		<br/>
																	  <input type="text" value="<?= $du->model_name; ?>" name="model_m" class="form-control" placeholder="Asset Model" autocomplete="off">
																	</div>

																	<button type="submit" class="btn btn-primary">Simpan</button>
																</form>
																
															</div>
														</div>
													</div>

					<tr>
						<td><?=  $no; ?></td>
						<td>
							<?php
								echo $du->model_name;
								if($du->id_jenis == 2){
									echo "<br/>Version : ".$du->version_name;
									echo "<br/>Basis : ".$du->basis;
								}
						   ?>
						</td>
						<td><?= $du->asset_name; ?></td>
						<td><?= $du->jenis_name; ?></td>
						<td>
							<?php
								if($du->id_jenis == 1){
									echo $du->stock_asset;
								}
						   ?></td>
						<td>
							<?php $cek=$baris_detail->jumlahdetail_baris($du->id_detail); ?>
							<?php $cek_masuk=$baris_detail->jumlahdetail_masuk($du->id_detail); ?>
							
							
							<?php if($du->status == 0){echo "<span class='label label-success'>Aktif</span>";} ?>
							<?php if($du->status == 5){echo "<span class='label label-default'>Tidak Aktif</span>";} ?>
					  
						</td>
						<td>
						
								<a class="button" href="#popup2-<?= $du->id_detail; ?>">
									<span class="label label-warning">Ubah</span>
								</a>
								
						<?php if($cek > 0 OR $cek_masuk > 0){ ?>
						
							<a href="<?= base_url(); ?>persediaan_asset/detail/<?= $du->id_detail; ?>">
							<button class="btn btn-primary btn-xs">Lihat History</button>
							</a>
									<?php if($du->status == 0){ ?>
								<a href="<?= base_url(); ?>assets_it/non_activedetail/<?= $du->id_detail; ?>/<?= $du->id_asset; ?>">
									<button class="btn btn-default btn-xs">
										<span class="glyphicon glyphicon-remove"></span> Tidak Aktif </button>
								</a>
									<?php } ?>
									
									<?php if($du->status == 5){?>
								<a href="<?= base_url(); ?>assets_it/active_detail/<?= $du->id_detail; ?>/<?= $du->id_asset; ?>">
									<button class="btn btn-success btn-xs">
										<span class="glyphicon glyphicon-ok"></span> Aktif </button>
								</a>
						<?php } ?>
					  
						<?php }if ($cek == 0 AND $cek_masuk == 0){ ?>
								<a href="<?= base_url(); ?>assets_it/delete_detail/<?= $du->id_detail; ?>/<?= $du->id_asset; ?>">
									<button class="btn btn-danger btn-xs">
										<span class="glyphicon glyphicon-remove"></span> Hapus </button>
								</a>
						<?php } ?>
						</td>
					</tr>
					<?php $no++; } ?>
					
                </tbody>
              </table>
            </div>
				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		
      </div>
      <!-- /.row -->
        </div>
		
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
            $("#model").chained("#asset");
        </script>





<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Tambah Asset Model Baru</h2>
			<hr/>
		<a class="close" href="#">&times;</a>
		<div class="content">
		
			<form role="form" action="<?php echo base_url(); ?>assets_it/save_modal" method="post">
			
				<input type="hidden" name="id_asset" value="<?= $id; ?>" />
				<div class="form-group">
                  <label for="exampleInputPassword1">Asset Kategori</label>
                  <input type="text" disabled value="<?= $nama_kategori; ?>" name="model_m" class="form-control" placeholder="Asset Model">
                </div>
				<div class="form-group">
                  <label for="exampleInputPassword1">Asset Model</label>
                  <input type="text" name="model_m" class="form-control" placeholder="Asset Model" autocomplete="off">
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
				</div>
            </form>
			
		</div>
	</div>
</div>
