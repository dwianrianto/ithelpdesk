
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
							
							<a href="pengguna/add">
						<button class="btn btn-primary">+ Tambah <?= $judul; ?> Baru</button>	
							</a>
							<br/><br/>
			
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Nama Lengkap</th>
					  <th>Username</th>
					  <th>Level</th>
					  <th>Department</th>
					  <th>Jabatan</th>
					  <th>Lokasi</th>
					  <th>Aksi</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($user AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td><?php cetak($du->nama_lengkap); ?></td>
					  <td><?php cetak($du->username); ?></td>
					  <td><?php cetak($du->level); ?></td>
					  <td><?php cetak($du->dept_name); ?></td>
					  <td><?php cetak($du->jabatan_name); ?></td>
					  <td><?php cetak($du->location_name); ?></td>
					  <td>
						<a href="pengguna/edit/<?= $du->id; ?>">
							<button class="btn btn-warning btn-xs">Edit</button>
						</a>
							<button class="btn btn-danger btn-xs">Delete</button>
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