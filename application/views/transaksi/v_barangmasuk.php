
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
							<a href="barang_masuk/add">
						<button class="btn btn-primary">+ Add New <?= $judul; ?></button>	
							</a>
							
							<br/><br/>
			
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Tanggal Masuk</th>
					  <th>Jenis Asset</th>
					  <th>Nama Asset</th>
					  <th>Model Asset</th>
					  <th>Jumlah Masuk</th>
					  <th>User</th>
					  <th>Dept</th>
					  <th>Action</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($user AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td><?= $du->tgl_in; ?></td>
					  <td><?= $du->jenis_name; ?></td>
					  <td><?= $du->asset_name; ?></td>
					  <td><?= $du->model_name; ?></td>
					  <td><?= $du->qty_in; ?></td>
					  <td><?= $du->nama_lengkap; ?></td>
					  <td><?= $du->dept_name; ?></td>
					  <td>
						<a href="barang_masuk/detail/<?= $du->id_bm; ?>">
							<button class="btn btn-primary btn-xs">View Detail</button>
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