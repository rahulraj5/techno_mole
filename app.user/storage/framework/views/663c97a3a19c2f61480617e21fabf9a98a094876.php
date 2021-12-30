	<!-- App footer start -->
				<div class="app-footer">© IHave Admin 2021</div>
				<!-- App footer end -->

			</div>
			<!-- Content wrapper scroll end -->

		</div>
		<!-- *************
				************ Main container end *************
			************* -->

	</div>
	<!-- Page wrapper end -->
	
	<!-- *************
			************ Required JavaScript Files *************
		************* -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/bootstrap.bundle.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/modernizr.js')); ?>"></script>
	<script src="<?php echo e(asset('public/js/moment.js')); ?>"></script>

	<!-- *************
			************ Vendor Js Files *************
		************* -->

	<!-- Megamenu JS -->
	<script src="<?php echo e(asset('public/vendor/megamenu/js/megamenu.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/megamenu/js/custom.js')); ?>"></script>

	<!-- Slimscroll JS -->
	<script src="<?php echo e(asset('public/vendor/slimscroll/slimscroll.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/slimscroll/custom-scrollbar.js')); ?>"></script>

	<!-- Search Filter JS -->
	<script src="<?php echo e(asset('public/vendor/search-filter/search-filter.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/search-filter/custom-search-filter.js')); ?>"></script>

	<!-- Apex Charts -->
	<script src="<?php echo e(asset('public/vendor/apex/apexcharts.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/apex/custom/home/salesGraph.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/apex/custom/home/ordersGraph.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/apex/custom/home/earningsGraph.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/apex/custom/home/visitorsGraph.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/apex/custom/home/customersGraph.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/apex/custom/home/sparkline.js')); ?>"></script>

	<!-- Circleful Charts -->
	<script src="<?php echo e(asset('public/vendor/circliful/circliful.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/circliful/circliful.custom.js')); ?>"></script>

	<!-- Main Js Required -->
	<script src="<?php echo e(asset('public/js/main.js')); ?>"></script>
	
	<script src="<?php echo e(asset('public/js/jquery.easing.1.3.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/notify/notify.js')); ?>"></script>
	<script src="<?php echo e(asset('public/vendor/notify/notify-custom.js')); ?>"></script>
	
	<!-- Summernote JS -->
	<script src="<?php echo e(asset('public/vendor/summernote/summernote-bs4.js')); ?>"></script> 
	
	<script>
	    setTimeout(function(){ 
	        $('.alert').css('display', 'none');
	    }, 3000);
	</script>
	<script>

		// Summernote
		$(document).ready(function () {
			$('.summernote').summernote({
				height: 120,
				tabsize: 2,
				focus: true,
				toolbar: [
					['font', ['bold', 'underline', 'clear']],
					['para', ['ul', 'ol']],
					['insert', ['link', 'picture', 'video']],
					['view', ['fullscreen', 'codeview', 'help']],
				]
			});
		});

	</script>

</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 05:27:59 GMT -->

</html>