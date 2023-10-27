
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
			
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url(); ?>assets/admin_temp/user.PNG" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
			  <?php foreach($user AS $pengaju){ ?>
			  
              <h3 class="widget-user-username"><?= $pengaju->nama_lengkap; ?></h3>
              <h5 class="widget-user-desc">Departemen : <?= $pengaju->dept_name; ?></h5>
              <h5 class="widget-user-desc">Jabatan : <?= $pengaju->jabatan_name; ?></h5>
              <h5 class="widget-user-desc">Lokasi : <?= $pengaju->location_name; ?></h5>
			  
			  <?php } ?>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Jumlah Pengajuan Anda <span class="pull-right badge bg-aqua">31</span></a></li>
                <li><a href="#">Menunggu Persetujuan <span class="pull-right badge bg-orange">5</span></a></li>
                <li><a href="#">Sedang Di Proses <span class="pull-right badge bg-blue">12</span></a></li>
                <li><a href="#">Proses Pengerjaan Selesai <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Closed <span class="pull-right badge bg-red">842</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
		
		
		
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