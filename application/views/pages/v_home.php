


		<?php $tahun=date('Y'); ?>


		<script language="javascript">
			
        </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
	  
	  
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-paper-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Menunggu Di Prosesdjhdjkfh</span>
              <span class="info-box-number"><?= $waiting; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		
		
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-paper-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sedang Di Proses</span>
              <span class="info-box-number"><?= $proses; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		
		
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-paper-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Proses Selesai</span>
              <span class="info-box-number"><?= $sukses; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
		
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-paper-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengajuan Di Close</span>
              <span class="info-box-number"><?= $close; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
			</div>
			
			
      <div class="row">
			
          <!-- BAR CHART -->
        <div class="col-md-7">
		
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Per Periode Tahun <?= date('Y'); ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:300px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
		
		
        <div class="col-md-5">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Berjalan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				
				<div style="overflow:auto; height:300px;">
			<table class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Nomor</th>
					  <th>Tanggal</th>
					  <th>Nama</th>
					  <th>Dept</th>
					  <th>Jabatan</th>
					  <th>Lokasi</th>
					  <th>Status</th>
					</tr>
                </thead>
                <tbody>
				
					<?php $no=1; foreach($pengajuan AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td>
							<?= $du->no_pengajuan; ?>
							<br/>
						<a href="pengajuan_masuk/detail/<?= $du->id_pengajuan; ?>">
							<button class="btn btn-info btn-xs">View Detail</button>
						</a>
					  </td>
					  <td><?= $du->tgl_pengajuan; ?></td>
					  <td><?= $du->nama_lengkap; ?></td>
					  <td><?= $du->dept_name; ?></td>
					  <td><?= $du->jabatan_name; ?></td>
					  <td><?= $du->location_name; ?></td>
					  <td>
							<?php if($du->status_pengajuan == 0){echo '<span class="label label-warning">Waiting Proses</span>';} ?>
							<?php if($du->status_pengajuan == 1){echo '<span class="label label-primary">Sedang Di Proses</span>';} ?>
							<?php if($du->status_pengajuan == 2){echo '<span class="label label-success">Proses Success</span>';} ?>
							<?php if($du->status_pengajuan == 5){echo '<span class="label label-danger">Colsed</span>';} ?>
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
       </div>
	
	
	  
      <div class="row">
          <!-- BAR CHART -->
        <div class="col-md-7">
		
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Persediaan Asset < 10</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart2" style="height:300px"></canvas>
              </div>
            </div>
          </div>
        </div>
		
		
          <!-- DONUT CHART -->
        <div class="col-md-5">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->

		
      </div>
		
		
      <div class="row">
			
        <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Persediaan Assets</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				<table id="example2" class="table table-bordered table-striped">
                <thead>
					<tr>
					  <th>No.</th>
					  <th>Model Asset</th>
					  <th>Nama Asset</th>
					  <th>Jenis Asset</th>
					  <th>Jumlah Asset Gudang</th>
					  <th>Action</th>
					</tr>
                </thead>
                <tbody>
					<?php $no=1; foreach($persediaan AS $du){ ?>
					<tr>
					  <td><?=  $no; ?></td>
					  <td><?php
								echo $du->model_name;
								if($du->id_jenis == 2){
									echo "<br/>Version : ".$du->version_name;
									echo "<br/>Basis : ".$du->basis;
								}
						   ?>
					  </td>
					  <td><?= $du->asset_name; ?></td>
					  <td><?= $du->jenis_name; ?></td>
					  <td>
							<?php
								if($du->id_jenis == 1){
									echo $du->stock_asset;
								}
							?>
					  </td>
					  <td>
						<a href="persediaan_asset/detail/<?= $du->id_detail; ?>">
							<button class="btn btn-primary btn-xs">Lihat History</button>
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
		
		
    
	</div>

			
			
		</section>
</div>
		
		
		
<script>
  $(function () {

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
		
        {
          label               : 'Pengajuan Masuk',
          fillColor           : 'blue',
          strokeColor         : 'blue',
          pointColor          : 'blue',
          pointStrokeColor    : 'blue',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
									<?= $jumlah->cek_jumlah('01',$tahun); ?>,
									<?= $jumlah->cek_jumlah('02',$tahun); ?>,
									<?= $jumlah->cek_jumlah('03',$tahun); ?>,
									<?= $jumlah->cek_jumlah('04',$tahun); ?>,
									<?= $jumlah->cek_jumlah('05',$tahun); ?>,
									<?= $jumlah->cek_jumlah('06',$tahun); ?>,
									<?= $jumlah->cek_jumlah('07',$tahun); ?>,
									<?= $jumlah->cek_jumlah('08',$tahun); ?>,
									<?= $jumlah->cek_jumlah('09',$tahun); ?>,
									<?= $jumlah->cek_jumlah('10',$tahun); ?>,
									<?= $jumlah->cek_jumlah('11',$tahun); ?>,
									<?= $jumlah->cek_jumlah('12',$tahun); ?>,
								]
        },
		
        {
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


<script>
  $(function () {

    var areaChartData = {
      labels  : [
						<?php foreach($cek AS $hasil){ ?>
					'<?= $hasil->asset_name; ?> - <?= $hasil->model_name; ?>',
						<?php } ?>
				],
      datasets: [
        {
        },
        {
          label               : 'Digital Goods',
          data                : [
								
						<?php foreach($cek AS $hasil){ ?>
					'<?= $hasil->stock_asset; ?>',
						<?php } ?>
		  ]
        },
        {
        }
      ]
    }
	
    var barChartCanvas                   = $('#barChart2').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = 'red'
    barChartData.datasets[1].strokeColor = 'red'
    barChartData.datasets[1].pointColor  = 'red'
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


<script>
  $(function () {
    "use strict";


    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["red", "orange", "silver"],
      data: [
        {label: "Stock Akan Habis", value: 12}, 
        {label: "Mendekati Habis", value: 30},
        {label: "Kosong", value: 0}
      ],
      hideHover: 'auto'
    });
  });
</script>



  
  <?php $tahun=date('Y'); ?>
  
<script>
  $(function () {
	  
    var lineChartd = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
		  
          data                : [
									<?= $jumlah->cek_jumlah('01',$tahun); ?>,
									<?= $jumlah->cek_jumlah('02',$tahun); ?>,
									<?= $jumlah->cek_jumlah('03',$tahun); ?>,
									<?= $jumlah->cek_jumlah('04',$tahun); ?>,
									<?= $jumlah->cek_jumlah('05',$tahun); ?>,
									<?= $jumlah->cek_jumlah('06',$tahun); ?>,
									<?= $jumlah->cek_jumlah('07',$tahun); ?>,
									<?= $jumlah->cek_jumlah('08',$tahun); ?>,
									<?= $jumlah->cek_jumlah('09',$tahun); ?>,
									<?= $jumlah->cek_jumlah('10',$tahun); ?>,
									<?= $jumlah->cek_jumlah('11',$tahun); ?>,
									<?= $jumlah->cek_jumlah('12',$tahun); ?>
								]
        }
      ]
    }

    var lineCharto = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = lineCharto
    lineChartOptions.datasetFill = false
    lineChart.Line(lineChartd, lineChartOptions)

  })
</script>
