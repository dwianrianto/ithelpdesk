
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data <?= $judul; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
			
							<?php if($this->session->flashdata('sukses')){ ?>
								<table align="right">
									<tr>
										<td>
									<?php echo $this->session->flashdata('sukses'); ?>
										</td>
									</tr>
								</table>
							<?php } ?>
							
							<a href="assets_it/add">
						<button class="btn btn-primary">+ Tambah <?= $judul; ?> Baru</button>	
							</a>
							<br/><br/>
							
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Jenis Asset</th>
					  <th>Kategori Asset</th>
					  <th>Status</th>
					  <th>Jumlah Model Asset</th>
					  <th>Aksi</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($user AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td><?= $du->jenis_name; ?></td>
					  <td><?= $du->asset_name; ?></td>
					  <td>
						<?php if($du->status == 0){echo "<span class='label label-success'>Aktif</span>";} ?>
						<?php if($du->status == 5){echo "<span class='label label-default'>Tidak Aktif</span>";} ?>
					  </td>
					  <td>
						<?php $cek=$baris_detail->jumlah_baris($du->id_asset); ?>
						
							<span class='badge badge-success'>
								<?= $stj=$st->jumlah_barisstatus($du->id_asset,0); ?>
							</span>
								Aktif
									<br/>
							<span class="badge badge-default">
								<?= $stj=$st->jumlah_barisstatus($du->id_asset,5); ?>
							</span>
								Tidak Aktif
							<br/>
						
					  </td>
					  <td>
						<a href="assets_it/edit/<?= $du->id_asset; ?>">
							<button class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil"></span> Ubah</button>
						</a>
						
						
						<?php if($cek > 0){ ?>
							
						<a href="assets_it/detail/<?= $du->id_asset; ?>">
							<button class="btn btn-info btn-xs">
								<span class="glyphicon glyphicon-eye-open"></span> Lihat Detail</button>
						</a>
									<?php if($du->status == 0){ ?>
								<a href="assets_it/non_active/<?= $du->id_asset; ?>">
									<button class="btn btn-default btn-xs">
										<span class="glyphicon glyphicon-remove"></span> Tidak Aktif </button>
								</a>
									<?php } ?>
									
									<?php if($du->status == 5){?>
								<a href="assets_it/active/<?= $du->id_asset; ?>">
									<button class="btn btn-success btn-xs">
										<span class="glyphicon glyphicon-ok"></span> Aktif </button>
								</a>
						<?php } ?>
					  
						<?php }if ($cek == 0){ ?>
							
						<a href="assets_it/detail/<?= $du->id_asset; ?>">
							<button class="btn btn-primary btn-xs">
								<span class="glyphicon glyphicon-plus"></span> Tambah Model </button>
						</a>
								<a href="users/edit/<?= $du->id_asset; ?>">
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