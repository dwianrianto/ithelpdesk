

	
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
							
				<h4>
					<b>No. Pengajuan : 
						<?= $detform->no_pengajuan; ?>
				</h4>
					Status : 
	<?php if($detform->status_pengajuan == 0){echo '<span class="label label-warning">Waiting Proses</span>';} ?>
	<?php if($detform->status_pengajuan == 1){echo '<span class="label label-primary">Sedang Di Proses</span>';} ?>
	<?php if($detform->status_pengajuan == 2){echo '<span class="label label-success">Proses Success</span>';} ?>
	<?php if($detform->status_pengajuan == 5){echo '<span class="label label-danger">Colsed</span>';} ?>
						
						</td>
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
						<td width="30%">
						
		
		<?php if($detform->status_pengajuan == 0){ ?>
		
        <form role="form" action="<?= base_url(); ?>pengajuan_masuk/acc" method="post" align="right">
		<input type="hidden" name="id_pengajuan" value="<?= $detform->id_pengajuan; ?>" />
			
			<b>Note Technisi :</b><textarea name="note" class="form-control col-sm">Akan Kami Proses Pengajuan Anda</textarea>
		
		
					<br/>
			<button type="submit" class="btn btn-info btn-md">
          <span class="glyphicon glyphicon-ok"></span> Proses Pengajuan
			</button>
			
		</form>
		<?php } ?>
		
		
		
						</td>
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
                <!-- /.input group -->
              </div>
			 </div>
			 </div> 
			 </div>
			 
			 
				<?php } ?>
			  
	
	
	
	
		<?php if($detform->status_pengajuan == 1){ ?>
			  
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
				
				
            <div class="box-body no-padding">
			
			
				<SCRIPT language="javascript">
		function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			var colCount = table.rows[0].cells.length;

			for(var i=0; i<colCount; i++) {

				var newcell	= row.insertCell(i);

				newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				//alert(newcell.childNodes);
				switch(newcell.childNodes[0].type) {
					case "text":
							newcell.childNodes[0].value = "";
							break;
					case "checkbox":
							newcell.childNodes[0].checked = false;
							break;
					case "select-one":
							newcell.childNodes[0].selectedIndex = 0;
							break;
				}
			}
		}

		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;

			for(var i=0; i<rowCount; i++) {
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}


			}
			}catch(e) {
				alert(e);
			}
		}

	</SCRIPT>
	
		<form action="<?= base_url(); ?>pengajuan_masuk/selesai" method="post">
		
		<input type="hidden" name="id_pengajuan" value="<?= $detform->id_pengajuan; ?>" />
			
	<p align="right">
			<button type="submit" class="btn btn-success btn-md">
          <span class="glyphicon glyphicon-thumbs-up"></span> Proses Selesai
			</button>
	</p>
	
			<b>Note To User :</b><textarea name="note" class="form-control col-sm">Proses Pengajuan Telah Di Selesaikan , Silahkan Anda Close Pengajuan Anda</textarea>
		
		<br/>
			<p align="right">
	<a href="#" class="btn btn-xs btn-primary" onclick="addRow('dataTable')">Add Row</a>

	<a href="#" class="btn btn-xs btn-danger" onclick="deleteRow('dataTable')">Delete</a>
			</p>
	<table id="dataTable" width="100%">
		<TR>
			<TD><INPUT type="checkbox" name="chk[]"/></TD>
			<TD>
				Asset : 
				<SELECT name="country[]" class="form-control">
					<OPTION value="0">Tidak Pakai</OPTION>
						<?php foreach($pakai AS $pakai_asset){?>
					<OPTION value="de">
						<?= $pakai_asset->asset_name; ?>
							-
						<?= $pakai_asset->model_name; ?>
					</OPTION>
						<?php } ?>
				</SELECT>
			</TD>
			<td width="10%">&nbsp;</td>
			<TD>Jumlah Pemakaian : <INPUT type="number" name="txt[]" class="form-control" /></TD>
		</TR>
	</table>
	
	</form>
			
			
			
            </div>
				
            </div>
			
            <!-- /.box-body -->
          </div>
		  
          <!-- /.box -->
		
      </div>
		<?php } ?>
	  
	  
	  
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">History Pengajuan</h3>
            </div>
            <div class="box-body">
				
				
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>User</th>
                  <th>Status</th>
                  <th>Note</th>
                  <th>Date</th>
                  <th>Progress</th>
                </tr>
				
				<?php $no=1; foreach($riwayat AS $history){ ?>
                <tr>
                  <td><?= $no; ?></td>
				  <td width="15%">
						
	<?php if($history->id_status == 0){echo '<b>User</b>';} ?>
	<?php if($history->id_status == 1){echo '<b>IT</b>';} ?>
	<?php if($history->id_status == 2){echo '<b>IT</b>';} ?>
	<?php if($history->id_status == 5){echo '<b>User</b>';} ?>
		<br/>
					<?= $history->nama_lengkap; ?>
				  </td>
                  <td width="10%">
	<?php if($history->id_status == 0){echo '<span class="label label-warning">Waiting Proses</span>';} ?>
	<?php if($history->id_status == 1){echo '<span class="label label-primary">Proses</span>';} ?>
	<?php if($history->id_status == 2){echo '<span class="label label-success">Proses Success</span>';} ?>
	<?php if($history->id_status == 5){echo '<span class="label label-danger">Colsed</span>';} ?>
				  </td>
				  <td width="25%"><?= $history->note; ?></td>
				  <td width="20%"><?= $history->tgl_detail; ?></td>
				  
				  
				  
				  
                  <td>
                    <div class="progress progress-xs">
                      
	<?php if($history->id_status == 0){echo '<div class="progress-bar progress-bar-warning" style="width: 25%"></div>';} ?>
	<?php if($history->id_status == 1){echo '<div class="progress-bar progress-bar-primary" style="width: 50%"></div>';} ?>
	<?php if($history->id_status == 2){echo '<div class="progress-bar progress-bar-success" style="width: 75%"></div>';} ?>
	<?php if($history->id_status == 5){echo '<div class="progress-bar progress-bar-danger" style="width: 100%"></div>';} ?>
                    </div>
                  </td>
                </tr>
				<?php $no++; } ?>
				
              </table>
            </div>
				
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
  
  
  
  
  
  