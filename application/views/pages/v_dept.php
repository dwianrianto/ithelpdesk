
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
							
							<a href="dept/add">
						<button class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah <?= $judul; ?> Baru</button>	
							</a>
							<br/><br/>
			
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Nama Departement</th>
					  <th>Lokasi</th>
					  <th>Aksi</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($user AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td><?php cetak($du->dept_name); ?></td>
					  <td><?php cetak($du->location_name); ?></td>
					  <td>
						<a href="dept/edit/<?= $du->id_dept; ?>">
							<button class="btn btn-warning btn-xs">
								<span class="glyphicon glyphicon-pencil"></span>
								Ubah
							</button>
						</a>
						<a href="dept/delete/<?= $du->id_dept; ?>">
							<button class="btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-remove"></span>
								Hapus
							</button>
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