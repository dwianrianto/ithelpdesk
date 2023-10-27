

	
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
			  <div class="form-group">
                <label>Model Asset</label>
                <select name="asset" id="asset" class="form-control" disabled>
						<option><?= $detform->model_name; ?></option>
				</select>
              </div>
              <!-- /.form-group -->
				
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Jumlah Barang Masuk</label>
				<input type="number" name="qty" class="form-control" disabled value="<?= $detform->qty_in; ?>" />
              </div>
			  <div class="form-group">
                <label>Tanggal Masuk</label>
				<input type="date" name="tgl_masuk" class="form-control" disabled value="<?= $detform->tgl_in; ?>" />
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Keterangan</label>
				<textarea class="form-control" name="note" disabled><?php echo $detform->note_bm; ?></textarea>
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
              <h3 class="box-title">Created by</h3>
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
			 </div> 
			 </div> 
			 </div>
			 
			 
			  
		

		<div class="col-md-9">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Jumlah Stock Keseluruhan</h3>
            </div>
            <div class="box-body">
					<table width="50%">
						<tr>
							<td><b>Model Asset</b></td>
							<td><b>Total Stock</b></td>
						</tr>
						<tr>
							<td><?= $detform->asset_name; ?> <?= $detform->model_name; ?></td>
							<td><b><?= $detform->stock_asset; ?></b></td>
						</tr>
					</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		
      </div>
				<?php } ?>
			
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Riwayat Barang Masuk Terkait</h3>
            </div>
            <div class="box-body">
				
				
            <div class="box-body no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Tanggal Masuk</th>
					  <th>Nama Asset</th>
					  <th>Model Asset</th>
					  <th>Jumlah Masuk</th>
					  <th>User</th>
					  <th>Dept</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($riwayat AS $his){ ?>
					<tr>
					  <td <?php if($his->id_bm == $id){ echo "bgcolor=#edab07"; }?>><?=  $no; ?></td>
					  <td <?php if($his->id_bm == $id){ echo "bgcolor=#edab07"; }?>><?= $his->tgl_in; ?></td>
					  <td <?php if($his->id_bm == $id){ echo "bgcolor=#edab07"; }?>><?= $his->asset_name; ?></td>
					  <td <?php if($his->id_bm == $id){ echo "bgcolor=#edab07"; }?>><?= $his->model_name; ?></td>
					  <td <?php if($his->id_bm == $id){ echo "bgcolor=#edab07"; }?>><?= $his->qty_in; ?></td>
					  <td <?php if($his->id_bm == $id){ echo "bgcolor=#edab07"; }?>><?= $his->nama_lengkap; ?></td>
					  <td <?php if($his->id_bm == $id){ echo "bgcolor=#edab07"; }?>><?= $his->dept_name; ?></td>
					</tr>
					<?php $no++; } ?>
					
                </tbody>
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
  
  
  
  
  
  