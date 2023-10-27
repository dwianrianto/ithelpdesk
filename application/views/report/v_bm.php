
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Barang Masuk</h3>
			  
				
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<table width="50%" height="10px">
				<tr>
					<td>
				<?php echo $this->session->flashdata('sukses'); ?>
					</td>
				</tr>
			</table>
				
				<form action="<?= base_url(); ?>report/detail_lapbm" method="post" target="_new">
			
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dari Tanggal</label>
                  <input type="date" name="tgl1" class="form-control" id="exampleInputEmail1" required placeholder="Location Name">
                </div>
				
                <div class="form-group">
                  <label for="exampleInputEmail1">Sampai Tanggal</label>
                  <input type="date" name="tgl2" class="form-control" id="exampleInputEmail1" required placeholder="Location Name">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="Tampilkan" />
              </div>
			  
			</form>
			
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->