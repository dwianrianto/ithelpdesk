

	
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
              <h3 class="box-title">Detail From <?= $judul; ?></h3>
			  <?php foreach($detail AS $detform){ ?>
				
							 
			<table width="100%" border="0">
					<tr>
						<td width="20%">
							
				<h5>
					<b>No. Pengajuan : 
						<?= $detform->no_pengajuan; ?>
				</h5>
					Status : 
	<?php if($detform->status_pengajuan == 0){echo '<span class="label label-warning">Waiting Proses</span>';} ?>
	<?php if($detform->status_pengajuan == 1){echo '<span class="label label-primary">Sedang Di Proses</span>';} ?>
	<?php if($detform->status_pengajuan == 3){echo '<span class="label label-default glyphicon glyphicon-home"> Perbaikan Vendor</span>';} ?>
	<?php if($detform->status_pengajuan == 2){echo '<span class="label label-success">Proses Success</span>';} ?>
	<?php if($detform->status_pengajuan == 5){echo '<span class="label label-danger">Colsed</span>';} ?>
						
						</td>
						<td>
							
						</td>
						<td width="30%">
						
		
		<?php if($detform->status_pengajuan == 2){ ?>
		
        <form role="form" action="<?= base_url(); ?>pengajuan/close" method="post" align="right">
		<input type="hidden" name="id_pengajuan" value="<?= $detform->id_pengajuan; ?>" />
			
			<b>Note User :</b><textarea name="note" class="form-control col-sm">Terima Kasih</textarea>
		
		
					<br/>
			<button type="submit" class="btn btn-danger btn-md">
          <span class="glyphicon glyphicon-ok"></span> Close Pengajuan
			</button>
			
		</form>
		<?php } ?>
		
		
						</td>
					</tr>
				</table>  
				
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(); ?>pengajuan/save" method="post">
			
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Asset</label>
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
                <label>Prioritas Kerja</label>
                <select class="form-control select2" name="wp" style="width: 100%;" disabled>
                  <option <?php if($detform->work_priority == 'Normal'){echo "selected";} ?>>Normal</option>
                  <option <?php if($detform->work_priority == 'Medium'){echo "selected";} ?>>Medium</option>
                  <option <?php if($detform->work_priority == 'Urgent'){echo "selected";} ?>>Urgent</option>
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Pesan Untuk Teknisi</label>
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
                <!-- /.input group -->
              </div>
				<hr/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
			 </div> 
			 </div> 
			 </div>
				
				
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
  
  
  
  
  
  