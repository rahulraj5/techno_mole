<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	
	<!--end switcher-->
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	
	<!-- Bootstrap JS -->
	<script src="<?php echo e(asset('assets/js/bootstrap.bundle.min.js')); ?>"></script>
	<!--plugins-->
	<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/chartjs/js/Chart.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/chartjs/js/Chart.extension.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js')); ?>"></script>
	<!--notification js -->
	<script src="<?php echo e(asset('assets/plugins/notifications/js/lobibox.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/notifications/js/notifications.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/index.js')); ?>"></script>
	<!--app JS-->
	<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
	
	<script src="<?php echo e(asset('assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
	
	<script src="<?php echo e(asset('assets/plugins/datetimepicker/js/legacy.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/datetimepicker/js/picker.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/datetimepicker/js/picker.time.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/datetimepicker/js/picker.date.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')); ?>"></script>
	
	<script>
		$('.datepicker').pickadate({
			selectMonths: true,
	        selectYears: true
		}),
		$('.timepicker').pickatime()
	</script>
	
</body>

</html>