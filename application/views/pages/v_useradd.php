
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New <?= $judul; ?>
      </h1>
    </section>
	

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Form <?= $judul; ?></h3>
			  
				
			<?php if($this->session->flashdata('sukses')){ ?>  
						<br/><br/>
					<?php echo $this->session->flashdata('sukses'); ?>
			<?php } ?>
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(); ?>users/save" method="post">
			
			<div class="col-md-6">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Usernames">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
				
              </div>
              <!-- /.box-body -->
			</div>
			
			<div class="col-md-6">
              <div class="box-body">
				<div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
					<select name="location" id="location" class="form-control">
						<option>--- Pilih Location ---</option>
						
				<?php foreach($location AS $loc){ ?>
						<option value="<?= $loc->id_location; ?>">
							<?= $loc->location_name; ?>
						</option>
				<?php } ?>
					</select>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Department</label>
				  <select name="dept" id="dept" class="form-control">
						<option>--- Pilih Department ---</option>
						
				<?php foreach($department AS $dept){ ?>
						<option id="dept" class="<?= $dept->id_location; ?>" value="<?= $dept->id_dept; ?>">
							<?= $dept->dept_name; ?>
						</option>
				<?php } ?>
					</select>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Jabatan</label>
				  <select name="jab" id="jab" class="form-control">
						<option>--- Pilih Jabatan ---</option>
						
				<?php foreach($jabatan AS $jab){ ?>
						<option id="jab" class="<?= $jab->id_dept; ?>" value="<?= $jab->id_jabatan; ?>">
							<?= $jab->jabatan_name; ?>
						</option>
				<?php } ?>
					</select>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Level System</label>
					<select name="level" id="level" class="form-control">
						<option value="user">User</option>
						<option value="admin">Admin</option>
					</select>
                </div>
				
              </div>
              <!-- /.box-body -->
			</div>
			
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
  
  
  
<script src="<?php echo base_url(); ?>assets/dropdown/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dropdown/jquery.chained.min.js"></script>
        <script>
            $("#dept").chained("#location");
            $("#jab").chained("#dept");
        </script>
  
  
  