

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
              <h3 class="box-title">Laporan Grapik Pengajuan Masuk</h3>
			  
				
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
				
			<form action="<?= base_url(); ?>report/chart_pm" method="post">
			
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Periode Bulan</label>
					  <select class="form-control" name="bulan">
						<option value="semua">All</option>
						<option value="01">Januari</option>
						<option value="02">Februari</option>
						<option value="03">Maret</option>
						<option value="04">April</option>
						<option value="05">Mei</option>
						<option value="06">Juni</option>
						<option value="07">Juli</option>
						<option value="08">Agustus</option>
						<option value="09">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					  </select>
                </div>
				
                <div class="form-group">
                  <label for="exampleInputEmail1">Tahun</label>
					  <select class="form-control" name="tahun">
						<option>2019</option>
						<option>2018</option>
						<option>2017</option>
					  </select>
				  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="show" class="btn btn-primary" value="Tampilkan" />
              </div>
			  
			</form>
			
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
	  
	  <?php
			if($this->input->post('show') == 'Tampilkan'){
				$tahun = $this->input->post('tahun');
	  ?>
		
      <div class="row">
			
          <!-- BAR CHART -->
        <div class="col-md-12">
		
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Masuk Tahun <?= $tahun; ?>, Bulan <?= $this->input->post('bulan'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart" id="test">
                <canvas id="barChart" style="height:300px"></canvas>
              </div>
            </div>
          </div>
        </div>
        </div>
		
		<?php } ?>
	  
	  
	  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
  
  <?php
		if($this->input->post('show') == 'Tampilkan'){
  ?>
  
<script>
  $(function () {

    var areaChartData = {
      labels  : 
					<?php if($this->input->post('bulan') == 'semua'){ ?>
				['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
					<?php }else{ ?>
				['<?= $this->input->post('bulan'); ?>'],
					<?php } ?>
      datasets: [
        {
          label               : 'Menunggu Proses',
          fillColor           : 'orange',
          strokeColor         : 'orange',
          pointColor          : 'orange',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
								
					<?php if($this->input->post('bulan') == 'semua'){ ?>
									<?= $jumlah->cek_jumlah('0','01',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','02',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','03',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','04',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','05',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','06',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','07',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','08',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','09',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','10',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','11',$tahun); ?>,
									<?= $jumlah->cek_jumlah('0','12',$tahun); ?>,
					<?php }else{ ?>
						<?= $jumlah->cek_jumlah('0',$this->input->post('bulan'),$tahun); ?>,
					<?php } ?>
								]
        },
		
        {
          label               : 'Sedang Di Proses',
          fillColor           : 'lightblue',
          strokeColor         : 'lightblue',
          pointColor          : 'lightblue',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
									
					<?php if($this->input->post('bulan') == 'semua'){ ?>
									<?= $jumlah->cek_jumlah('1','01',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','02',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','03',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','04',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','05',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','06',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','07',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','08',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','09',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','10',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','11',$tahun); ?>,
									<?= $jumlah->cek_jumlah('1','12',$tahun); ?>,
					<?php }else{ ?>
						<?= $jumlah->cek_jumlah('1',$this->input->post('bulan'),$tahun); ?>,
					<?php } ?>
								]
        },
		
        {
          label               : 'Proses Selesai',
          fillColor           : 'green',
          strokeColor         : 'green',
          pointColor          : 'green',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
									
					<?php if($this->input->post('bulan') == 'semua'){ ?>
									<?= $jumlah->cek_jumlah('2','01',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','02',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','03',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','04',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','05',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','06',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','07',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','08',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','09',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','10',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','11',$tahun); ?>,
									<?= $jumlah->cek_jumlah('2','12',$tahun); ?>,
					<?php }else{ ?>
						<?= $jumlah->cek_jumlah('2',$this->input->post('bulan'),$tahun); ?>,
					<?php } ?>
								]
        },
		
        {
          label               : 'Pengajuan Di closed',
          fillColor           : 'red',
          strokeColor         : 'red',
          pointColor          : 'red',
          pointStrokeColor    : 'red',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
										
					<?php if($this->input->post('bulan') == 'semua'){ ?>
									<?= $jumlah->cek_jumlah('5','01',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','02',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','03',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','04',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','05',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','06',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','07',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','08',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','09',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','10',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','11',$tahun); ?>,
									<?= $jumlah->cek_jumlah('5','12',$tahun); ?>,
					<?php }else{ ?>
						<?= $jumlah->cek_jumlah('5',$this->input->post('bulan'),$tahun); ?>,
					<?php } ?>
								]
        }
      ]
    }
	
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = 'blue'
    barChartData.datasets[1].strokeColor = 'blue'
    barChartData.datasets[1].pointColor  = 'blue'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 2,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>

		<?php } ?>

