
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data <?= $judul; ?> Masuk
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
				<div class="box-body">
								
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
					  <th>Departemen</th>
					  <th>Jabatan</th>
					  <th>Lokasi</th>
					  <th>Status pengajuan</th>
					  <th>Aksi</th>
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
					  <td>
						<a href="pengajuan_masuk/detail/<?= $du->id_pengajuan; ?>">
							<button class="btn btn-info btn-xs">View Detail</button>
						</a>
					  </td>
					</tr>
					<?php $no++; } ?>
					
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->