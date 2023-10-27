

</div>
<!-- ./wrapper -->

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
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/morris.js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/raphael/raphael.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->


<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin_temp/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
			responsive: true
    })
	
    $('#dashboard').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
			'responsive': true,
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollY':        "300px",
			'scrollCollapse': true,
			'fixedColumns':   {
				leftColumns: 1,
				rightColumns: 1
			}
    })
	
    $('#example2').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
			'responsive': true,
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true,
			'scrollY':        "300px",
			'scrollCollapse': true,
			'fixedColumns':   {
				leftColumns: 1,
				rightColumns: 1
			}
    })
  })
</script>


</body>
</html>
