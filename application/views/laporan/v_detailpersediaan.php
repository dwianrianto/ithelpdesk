

	
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
                <label>Jenis Asset</label>
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
                <label>Model Asset</label>
                <select name="asset" id="asset" class="form-control" disabled>
						<option><?= $detform->model_name; ?></option>
				</select>
              </div>
              <div class="form-group">
                <label>Jumlah Stock Keseluruhan</label>
				<input type="number" name="qty" class="form-control" disabled value="<?= $sa=$detform->stock_asset; ?>" />
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
			 
		<?php } ?>
		
		
		
		
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><span class="label label-primary">Riwayat Asset</span></h3>
            </div>
            <div class="box-body">
				
				
            <div class="box-body no-padding">
					<p align="right">
				<b>Stock Akhir : </b>
				<?= "<span class='label label-info'>".$sa."</span>"; ?>
					</p>
				
              <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Jenis Transaksi</th>
					  <th>Tangal Transaksi</th>
					  <th>Qty</th>
					  <th>Nama Asset</th>
					  <th>Lihat</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($riwayat_all AS $his){ ?>
						<tr>
							<td><?= $no; ?></td>
							<td>
								<?php 
									$tr=$his->jenis_tr;
									if($tr == 1){
										echo "<font color=blue>Barang Masuk</font>";
									}
									if($tr == 2){
										echo "<font color=red>Pemakaian</font>";
									}
								?>
							</td>
							<td><?= $his->tgl_tr; ?></td>
							<td>
								<?php
									if($tr == 1){
										echo "<span class='label label-primary'>".$his->qty_tr."</span>";
									}
									if($tr == 2){
										echo "<span class='label label-danger'>".$his->qty_tr."</span>";
									}
								?>
							</td>
							<td><?= $his->model_name; ?></td>
							<td>
								<?php
									if($tr == 1){
										echo "<a class='label label-primary' href=".base_url()."barang_masuk/detail/".$his->bm.">View</a>";
									}
									if($tr == 2){
										echo "<a class='label label-danger' href=".base_url()."pengajuan_masuk/detail/".$his->kl.">View</a>";
									}
								?>
							</td>
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
  
  
  
  
  
  