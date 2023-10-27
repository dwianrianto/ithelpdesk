
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
				<br/>
			<?php if($this->session->flashdata('sukses')){ ?>
								<p align="right">
				<table align="right">
					<tr>
						<td>
					<?php echo $this->session->flashdata('sukses'); ?>
						</td>
					</tr>
				</table>
								</p>
			<?php } ?>
			
			
			
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Model Asset</th>
					  <th>Nama Asset</th>
					  <th>Jenis Asset</th>
					  <th>Jumlah Asset Gudang</th>
					  <th>Jumlah Asset User</th>
					  <th>Action</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($user AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td><?php
								echo $du->model_name;
								if($du->id_jenis == 2){
									echo "<br/>Version : ".$du->version_name;
									echo "<br/>Basis : ".$du->basis;
								}
						   ?>
					  </td>
					  <td><?= $du->asset_name; ?></td>
					  <td><?= $du->jenis_name; ?></td>
					  <td><?php
								if($du->id_jenis == 1){
									echo $du->stock_asset;
								}
						   ?></td>
					  <td><?php
								if($du->id_jenis == 1){
									echo $du->stock_user;
								}
						   ?>
					  </td>
					  <td>
						<a href="persediaan_asset/detail/<?= $du->id_detail; ?>">
							<button class="btn btn-primary btn-xs">Lihat History</button>
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