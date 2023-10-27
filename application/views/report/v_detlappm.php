


	<script>
		function myFunction() {
		  window.print();
		}
	</script>


<style>
	body {
	background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
	color: #444;
	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
	text-shadow: 0 1px 0 #fff;
}

strong {
	font-weight: bold; 
}

em {
	font-style: italic; 
}

table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 100%;
}	

th {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}

th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

tr {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}
</style>

			<button onclick="myFunction()">Print this page</button>

			<center>
      <h4>
        <?= $judul; ?>
      </h4>
			</center>

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
			
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>No. Pengajuan</th>
					  <th>Tgl Pengajuan</th>
					  <th>Nama lengkap</th>
					  <th>Dept name</th>
					  <th>Jabatan name</th>
					  <th>Location name</th>
					  <th>Status pengajuan</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($user AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td><?= $du->no_pengajuan; ?></td>
					  <td><?= $du->tgl_pengajuan; ?></td>
					  <td><?= $du->nama_lengkap; ?></td>
					  <td><?= $du->dept_name; ?></td>
					  <td><?= $du->jabatan_name; ?></td>
					  <td><?= $du->location_name; ?></td>
					  <td>
	<?php if($du->status_pengajuan == 0){echo '<span class="label label-warning">Waiting Proses</span>';} ?>
	<?php if($du->status_pengajuan == 1){echo '<span class="label label-primary">Sedang Di Proses</span>';} ?>
	<?php if($du->status_pengajuan == 2){echo '<span class="label label-success">Proses Success</span>';} ?>
	<?php if($du->status_pengajuan == 5){echo '<span class="label label-danger">Colsed</span>';} ?>
					  </td>
					</tr>
					<?php $no++; } ?>
					
                </tbody>
              </table>
			  
			  
			  
			  
			  
			  