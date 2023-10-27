
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
		
								<p align="right">
									
			<?php if($this->session->flashdata('sukses')){ ?>
				<table align="right">
					<tr>
						<td>
					<?php echo $this->session->flashdata('sukses'); ?>
						</td>
					</tr>
				</table>
			<?php } ?>
			
								</p>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail From <?= $judul; ?></h3>
			  			 <?php foreach($detail AS $detform){ ?>
						 
		<table width="100%" border="0">
					<tr>
						<td width="20%">
							
				<h5>
					<b>No. Pengajuan : 
						<?php $idp=$detform->id_pengajuan; ?>
						<?= $detform->no_pengajuan; ?>
				</h5>
					Status : 
	<?php if($detform->status_pengajuan == 0){echo '<span class="label label-warning">Waiting Proses</span>';} ?>
	<?php if($detform->status_pengajuan == 1){echo '<span class="label label-primary">Sedang Di Proses</span>';} ?>
	<?php if($detform->status_pengajuan == 3){echo '<span class="label label-default glyphicon glyphicon-home"> Perbaikan Vendor</span>';} ?>
	<?php if($detform->status_pengajuan == 2){echo '<span class="label label-success">Proses Success</span>';} ?>
	<?php if($detform->status_pengajuan == 5){echo '<span class="label label-danger">Colsed</span>';} ?>
						
						</td>
		<?php if($detform->status_pengajuan == 1 OR $detform->status_pengajuan == 5){ ?>
						<td width="10%">&nbsp;</td>
		<?php } ?>
						<td>
						
							
	<?php
	if($detform->status_pengajuan > 0){
			echo "<center><b><u>Durasi IT</u></b><br/><b>Pengajuan <i class='fa fa-share'></i> Proses : </b>";
			$aju = new DateTime($detform->tgl_pengajuan);
			$proses = new DateTime($detform->tgl_proses);
			$lama_proses    = 
			$aju->diff($proses)->format("%y tahun/%m bulan/%d hari<br/>%h jam/%i menit/%s detik");
			echo $lama_proses;
	}
	?>
		
	<?php
	if($detform->status_pengajuan > 1){
			echo "<br/><b>Proses <i class='fa fa-share'></i> Selesai : </b>";
			$proses2 = new DateTime($detform->tgl_proses);
			$selesai = new DateTime($detform->tgl_selesai);
			$lama_selesai    = 
			$proses2->diff($selesai)->format("%y tahun/%m bulan/%d hari<br/>%h jam/%i menit/%s detik");
			echo $lama_selesai;
	}
	?>
							</center>
			
						</td>
		<?php if($detform->status_pengajuan == 0){ ?>
						<td width="30%">
						
		
		
        <form role="form" action="<?= base_url(); ?>pengajuan_masuk/acc" method="post" align="right">
		<input type="hidden" name="id_pengajuan" value="<?= $detform->id_pengajuan; ?>" />
			
			<b>Note Technisi :</b><textarea name="note" class="form-control col-sm">Akan Kami Proses Pengajuan Anda</textarea>
		
		
					<br/>
			<button type="submit" class="btn btn-info btn-md">
          <span class="glyphicon glyphicon-ok"></span> Proses Pengajuan
			</button>
			
		</form>
		
		
		
						</td>
		<?php } ?>
					</tr>
				</table>
				
				
		
		
		
				
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Service</label>
                <select name="jenis" id="jenis" class="form-control" disabled>
						<option><?= $detform->jenis_name; ?></option>
				</select>
              </div>
              <div class="form-group">
                <label>Nama Asset</label>
                <select name="asset" id="asset" class="form-control" disabled>
						<option><?= $detform->asset_name; ?></option>
				</select>
              </div>
              <!-- /.form-group -->
				
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Work Priority</label>
                <select class="form-control select2" name="wp" style="width: 100%;" disabled>
                  <option <?php if($detform->work_priority == 'Normal'){echo "selected";} ?>>Normal</option>
                  <option <?php if($detform->work_priority == 'Medium'){echo "selected";} ?>>Medium</option>
                  <option <?php if($detform->work_priority == 'Urgent'){echo "selected";} ?>>Urgent</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Note To Technician</label>
				<textarea class="form-control" name="note" disabled><?php echo $detform->pesan; ?></textarea>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
			
              <!-- /.box-body -->
			  
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
              <div class="form-group">
                <label>Nama User</label>

                <div class="input-group">
					<?= $detform->nama_lengkap; ?>
                </div>
                <!-- /.input group -->
              </div>
			  
              <div class="form-group">
                <label>Department</label>

                <div class="input-group">
					<?= $detform->dept_name; ?>
                </div>
                <!-- /.input group -->
              </div>
			  
              <div class="form-group">
                <label>Jabatan</label>

                <div class="input-group">
					<?= $detform->jabatan_name; ?>
                </div>
                <!-- /.input group -->
              </div>
			  
			  <div class="form-group">
                <label>Lokasi</label>

                <div class="input-group">
					<?= $detform->location_name; ?>
                </div>
			 
				<hr/>
					<br/><br/><br/>
					<br/><br/><br/>
                <!-- /.input group -->
              </div>
			 </div>
			 </div> 
			 </div>
	
	
		<?php if($detform->status_pengajuan == 1 OR $detform->status_pengajuan == 3){ ?>
			  
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
				<div class="box-body no-padding">
			
			
				
	
		<form action="<?= base_url(); ?>pengajuan_masuk/selesai" method="post">
		<input type="hidden" name="id_pengajuan" value="<?= $idp=$detform->id_pengajuan; ?>" />
		
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<h5><b>Status Pengajuan : </b></h5>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<h5><b>Note User : </b></h5>
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<div id="tombol">
							<p align="right">
							<button type="submit" class="btn btn-success btn-md" name="simpan">
								<span class="glyphicon glyphicon-thumbs-up"></span> Selesai
							</button>
							</p>
						</div>
						<div id="tombol2">
							<p align="right">
							<button type="submit" class="btn btn-default btn-md" name="simpan">
								<img src="<?= base_url(); ?>assets/img_user/tech.png" width="20px" />
								
								Vendor
							</button>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<select name="pilihan" id="pilihan" class="form-control">
							<option value="2">Proses Selesai</option>
								<?php if($detform->status_pengajuan == 1){ ?>
							<option value="3">Perbaikan Vendor</option>
								<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<textarea name="note" class="form-control col-sm"></textarea>
					</div>
				</div>
			</div>
		</form>
			
			<script>
				$(document).ready(function () {
				  
					   $('#tombol2').prop("hidden", true);
				  $('#pilihan').change(function () {
					selectVal = $('#pilihan').val();
					if (selectVal == 3) {
					   $('#penggunaan').prop("hidden", true);
					   $('#tombol').prop("hidden", true);
					   $('#tombol2').prop("hidden", false);
					}
					else {
					  $('#penggunaan').prop("hidden", false);
					   $('#tombol').prop("hidden", false);
					   $('#tombol2').prop("hidden", true);
					}
				  })
				  
				});
			</script>
		
			
		
			<div id="penggunaan">
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<a  class="button btn btn-info btn-xs" href="#popup1" name="add">
								<span class="glyphicon glyphicon-plus"></span> Pemakaian Asset
							</a></h5>
						</div>
					</div>
				</div>
				
						<table width="100%" class="table table-striped">
							<thead>
								<tr>
									<th>Asset</th>
									<th>Jumlah Pemakaian</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($riwayat_keluar AS $rk){ ?>
								<tr>
									<td><?= $rk->asset_name; ?> - <?= $rk->model_name; ?></td>
									<td><?= $rk->qty_tr; ?></td>
									<td>
											<a href="<?= base_url(); ?>pengajuan_masuk/delete_pakai/<?= $rk->id_tr; ?>/<?= $rk->id_asset; ?>/<?= $rk->qty_tr; ?>/<?= $idp; ?>">
										<button class="btn btn-danger btn-xs">
											Hapus
										</button>
											</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
			
			</div>
			
		
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<?php if($detform->status_pengajuan == 2 AND $detform->pemakaian == 1 OR $detform->status_pengajuan == 5 AND $detform->pemakaian == 1){ ?>
			  
        <div class="col-md-9">
			<div class="box box-warning">
				<div class="box-body">
					<div class="box-body no-padding">
					<h4>Pemakaian Asset</h4>
						<table width="100%" id="example2" class="table table-striped">
							<thead>
								<tr>
									<th>Asset</th>
									<th>Jumlah Pemakaian</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($riwayat_keluar AS $rk){ ?>
								<tr>
									<td><?= $rk->asset_name; ?> - <?= $rk->model_name; ?></td>
									<td><?= $rk->qty_tr; ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
			
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	  
	  
	  
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">History Pengajuan</h3>
            </div>
            <div class="box-body">
			
				<table width="100%">
					<tr>
						<td width="10%"><b>Progress</b></td>
						<td>
							<br/>
			<?php if($detform->status_pengajuan == 0){echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-warning active" role="progressbar"aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">25% Waiting Process</div></div>';} ?>
			<?php if($detform->status_pengajuan == 1){echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-primary active" role="progressbar"aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">50% Process</div></div>';} ?>
			<?php if($detform->status_pengajuan == 2){echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">75% Process Success</div></div>';} ?>
			<?php if($detform->status_pengajuan == 5){echo '<div class="progress"><div class="progress-bar progress-bar-striped progress-bar-danger active" role="progressbar"aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">100% Closed</div></div>';} ?>
						</td>
					</tr>
				</table>
			 
				<?php } ?>
				
              <table id="example1" class="table table-bordered table-striped" width="100%">
			  <thead>
                <tr>
                  <th style="width: 10px">&nbsp;</th>
                  <th>User</th>
                  <th>Status</th>
                  <th>Note</th>
                  <th>Date</th>
                </tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($riwayat AS $history){ ?>
                <tr>
					<td width="5%">
						<?php if($history->id_status == 0){echo '
							<img src="'.base_url().'assets/img_user/user.png" width="35px" />
						';} ?>
						<?php if($history->id_status == 1){echo '
							<img src="'.base_url().'assets/img_user/admin.png" width="35px" />
						';} ?>
						<?php if($history->id_status == 3){echo '
							<img src="'.base_url().'assets/img_user/admin.png" width="35px" />
						';} ?>
						<?php if($history->id_status == 2){echo '
							<img src="'.base_url().'assets/img_user/admin.png" width="35px" />
						';} ?>
						<?php if($history->id_status == 5){echo '
							<img src="'.base_url().'assets/img_user/user.png" width="35px" />
						';} ?>
					</td>
					<td width="10%">
						<?php if($history->id_status == 0){echo '<b>User</b>';} ?>
						<?php if($history->id_status == 1){echo '<b>IT</b>';} ?>
						<?php if($history->id_status == 3){echo '<b>IT</b>';} ?>
						<?php if($history->id_status == 2){echo '<b>IT</b>';} ?>
						<?php if($history->id_status == 5){echo '<b>User</b>';} ?>
						<br/>
						<?= $history->nama_lengkap; ?>
					</td>
					<td width="10%">
						<?php if($history->id_status == 0){echo '<span class="label label-warning">Waiting Proses</span>';} ?>
						<?php if($history->id_status == 1){echo '<span class="label label-primary">Proses</span>';} ?>
						<?php if($history->id_status == 3){echo '<span class="label label-default glyphicon glyphicon-home"> Perbaikan Vendor</span>';} ?>
						<?php if($history->id_status == 2){echo '<span class="label label-success">Proses Success</span>';} ?>
						<?php if($history->id_status == 5){echo '<span class="label label-danger">Colsed</span>';} ?>
					</td>
					<td width="30%"><?= $history->note; ?></td>
					<td width="10%"><?= $history->tgl_detail; ?></td>
                </tr>
				<?php $no++; } ?>
				</tbody>
              </table>
				
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
		<h2>Tambah Pemakaian Asset</h2>
			<hr/>
		<a class="close" href="#">&times;</a>
		<div class="content">
		
			<form role="form" action="<?php echo base_url(); ?>pengajuan_masuk/save_modal" method="post">
				
		<input type="hidden" name="id_pengajuan" value="<?= $idp; ?>" />
		
						<div class="form-group">
								Nama Asset : 
							<SELECT name='ap' class='form-control col-sx' id='ap' required>
									<option value="">--- Pilih Asset ---</option>
								<?php foreach($pakai AS $pakai_asset){?>
									<OPTION value='<?= $pakai_asset->id_detail; ?>'>
									<?= $pakai_asset->asset_name; ?>-<?= $pakai_asset->model_name; ?> : Stock <?= $pakai_asset->stock_asset; ?>
									</OPTION>
								<?php } ?>
							</SELECT>
						</div>
						<div class="form-group">
								Jumlah Pemakaian : 
							<input required type='number' name='qty' id='qty' class='form-control' />
							<div id="report2"></div>
						</div>
              <div class="box-footer">
                <button type="submit" id="add_simpan" class="btn btn-primary">Simpan</button>
				</div>
            </form>
			
			<script>
								$("#add_simpan").prop("disabled", true);
				$("#qty").bind("keyup change", function(){
						
					  var jumlah = $(this).val();
					  var ap = $("#ap").val();

					  $.ajax({
						url:'<?= base_url(); ?>pengajuan_masuk/cek_stock',
						type: "POST",// <---- ADD this to mention that your ajax is post
						data:{jumlah:jumlah,ap:ap },// <-- ADD email here as pram to be submitted
						success:function(data){
							if(data == 0){
								$("#add_simpan").prop("disabled", false);
								$("#report2").text("");
								check2=1;
							}if(data == 1){
								$("#add_simpan").prop("disabled", true);
								$("#report2").html("<font color=red>*Jumlah Pemakaian Tidak Boleh Melebihi Jumlah Stock</font>");
								
								check2=0;
							}
						}
					  });

					});

			</script>
			
		</div>
	</div>
</div>
  
  