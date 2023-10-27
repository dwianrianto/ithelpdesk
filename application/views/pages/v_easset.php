


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit <?= $judul; ?>
      </h1>
    </section>
	

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Isi Form <?= $judul; ?></h3>
			  
				
			<?php if($this->session->flashdata('sukses')){ ?>  
						<br/><br/>
					<?php echo $this->session->flashdata('sukses'); ?>
			<?php } ?>
			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
					
					<?php foreach($user AS $ka){ ?>
					
            <form role="form" action="<?php echo base_url(); ?>assets_it/save_edit" method="post">
				<input type="hidden" name="id" value="<?= $ka->id_asset; ?>" />
              <div class="box-body">
				<div class="form-group">
                  <label for="exampleInputEmail1">Jenis Asset</label>
                  <select name="jenis" class="form-control" onchange="showUser(this.value)" required>
						<option value="1" <?php if($ka->id_jenis == 1){echo "selected";} ?>>HARDWARE</option>
						<option value="2" <?php if($ka->id_jenis == 2){echo "selected";} ?>>SOFTWARE</option>
					</select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kategori Asset</label>
                  <input type="text" value="<?= $ka->asset_name; ?>" name="nama" class="form-control" required id="exampleInputEmail1" placeholder="Nama Kategori Asset">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
				
				
				
            </form>
          </div>
		  
					<?php } ?>
		  
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->