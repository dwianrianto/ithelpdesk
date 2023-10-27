<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. CJFI || IT Services</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_temp/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_temp/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_temp/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_temp/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_temp/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin_temp/dist/css/skins/_all-skins.min.css">

	
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
		<!-- vue JS -->
		<script src="<?php echo base_url(); ?>assets/vue/vue.js"></script>
		<script src='<?php echo base_url(); ?>assets/vue/axios-master/dist/axios.min.js'></script>
		
		
		
</head>
			<?php 
				// $side;
			?>
			
			<style>
				.main-header{
					width:100%;
					position:fixed;
					height:100%;
				}
			</style>
			
  <header class="main-header">
			<div class="musik"></div>
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CJFI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><p align="left"><img src="<?php echo base_url(); ?>assets/logo.jpg" width="30px" /> IT SERVICES </p> IT SERVICES </span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
			  
				<?php if($_SESSION['level'] == 'admin'){ ?>
            <a href="<?php echo base_url(); ?>Pengajuan_masuk" class="dropdown-toggle">
              <i class="fa fa-bell-o"></i>
		<span class="label label-pill label-danger count" style="border-radius:10px;"></span>
            </a>
				<?php } ?>
				
				<?php if($_SESSION['level'] == 'user'){ ?>
            <a href="<?php echo base_url(); ?>Pengajuan" class="dropdown-toggle">
              <i class="fa fa-bell-o"></i>
		<span class="label label-pill label-danger count" style="border-radius:10px;"></span>
            </a>
				<?php } ?>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/admin_temp/user.PNG" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_lengkap'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/admin_temp/user.PNG" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama_lengkap'); ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/admin_temp/user.PNG" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama_lengkap'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?= $_SESSION['level']; ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <li>
          <a href="<?php echo base_url(); ?>Home">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
          </a>
        </li>
		
		
		<?php if($_SESSION['level'] == 'user'){ ?>
		<li class="treeview active">
			<a href="#">
				<i class="fa fa-folder"></i>
				<span>Profile</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" >
					<li>
						<a href="#">
							<i class="fa fa-circle-o text-aqua"></i> 
								<span>Profile Anda</span>
						</a>
					</li>
				</ul>
		</li>
		<?php } ?>
		
		<?php if($_SESSION['level'] == 'admin'){ ?>
		<li class="treeview active">
			<a href="#">
				<i class="fa fa-folder"></i>
				<span>Master</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" >		
					<li>
					  <a href="<?php echo base_url(); ?>Assets_it">
						<i class="fa fa-files-o"></i> <span>Assets</span>
					  </a>
					</li>
					<li>
					  <a href="<?php echo base_url(); ?>Location">
						<i class="fa fa-table"></i> <span>Location</span>
					  </a>
					</li>
					<li>
					  <a href="<?php echo base_url(); ?>Dept">
						<i class="fa fa-laptop"></i> <span>Department</span>
					  </a>
					</li>
					<li>
					  <a href="<?php echo base_url(); ?>Jabatan">
						<i class="fa fa-share"></i> <span>Jabatan</span>
					  </a>
					</li>
					<li>
					  <a href="<?php echo base_url(); ?>pengguna">
						<i class="fa fa-user"></i> <span>Data Users</span>
					  </a>
					</li>
				</ul>
		</li>
		<?php } ?>
		
		
		<?php if($_SESSION['level'] == 'user'){ ?>
		<li class="treeview active">
			<a href="#">
				<i class="fa fa-folder"></i>
				<span>Transaksi</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" >	
					<li>
					  <a href="<?php echo base_url(); ?>Pengajuan">
						<i class="fa fa-edit"></i> <span>Pengajuan IT Services</span>
					  </a>
					</li>
				</ul>
		</li>
		<?php } ?>
		
		<?php if($_SESSION['level'] == 'admin'){ ?>
		<li class="treeview active">
			<a href="#">
				<i class="fa fa-folder"></i>
				<span>Transaksi</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" >	
					<li>
					  <a href="<?php echo base_url(); ?>Barang_masuk">
						<i class="fa fa-share"></i> <span>Barang Masuk</span>
					  </a>
					</li>
					<li>
					  <a href="<?php echo base_url(); ?>Pengajuan_masuk">
						<i class="fa fa-envelope"></i> <span>Pengajuan Masuk</span>
						<span class="pull-right-container">
						  <span class="label pull-right label-danger count" style="border-radius:10px;"></span>
						</span>
					  </a>
					</li>
				</ul>
		</li>
		<?php } ?>
		
		<?php if($_SESSION['level'] == 'admin'){ ?>
		<li class="treeview active">
			<a href="#">
				<i class="fa fa-folder"></i>
				<span>Laporan</span>
				<span class="pull-right-container">
				  <i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" >	
					<li>
					  <a href="<?php echo base_url(); ?>Persediaan_asset">
						<i class="fa fa-share"></i> <span>Persediaan Asset</span>
					  </a>
					</li>
					<li>
					  <a href="<?php echo base_url(); ?>Pengajuan_masuk/laprp">
						<i class="fa fa-envelope"></i> <span>IT SERVICES</span>
					  </a>
					</li>
				</ul>
		</li>
		<?php } ?>
		
		
		<?php if($_SESSION['level'] == 'user'){ ?>
        <li class="header">History Pengajuan</li>
        <li><a href="<?php echo base_url(); ?>pengajuan/riwayat"><i class="fa fa-circle-o text-aqua"></i> <span>Riwayat Pengajuan Anda</span></a></li>
		<?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
	<br/><br/>



 <script src="<?= base_url(); ?>assets/admin_temp/bower_components/jquery/dist/jquery.min.js"></script>
  
				<?php if($_SESSION['level'] == 'admin'){ ?>
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"<?= base_url(); ?>home/cek_notif",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdowns-menus').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
    $('.musik').html("<audio autoplay  id=playAudio><source src=<?php echo base_url(); ?>assets/sound.mp3></audio>");
   }
  }
 });
}
load_unseen_notification();
$(document).on('click', '.dropdowns-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>
				<?php } ?>
				
<?php if($_SESSION['level'] == 'user'){ ?>
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"<?= base_url(); ?>home/cek_notif_user",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdowns-menus').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
    $('.musik').html("<audio autoplay  id=playAudio><source src=<?= base_url(); ?>assets/sound.mp3></audio>");
   }
  }
 });
}
load_unseen_notification();
$(document).on('click', '.dropdowns-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>
				<?php } ?>
				
        <div class="col-xs-12">

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
	<div style='height:0px; width:100%;'></div>  
    <div style="padding-left:210px;">
		<?php echo $output; ?>
	</div>
		
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
		

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin_temp/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url(); ?>assets/admin_temp/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin_temp/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/admin_temp/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin_temp/dist/js/demo.js"></script>

</body>
</html>

		
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>