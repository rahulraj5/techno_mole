<?php echo $__env->make('front.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div><?php echo $__env->yieldContent('content'); ?></div><br>
<?php echo $__env->make('front.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

