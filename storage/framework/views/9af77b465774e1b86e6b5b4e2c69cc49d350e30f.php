<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $validProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('products.fitxa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="d-flex justify-content-center">
        <?php echo e($products->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.batoiPOP', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/projecte/resources/views/welcome.blade.php ENDPATH**/ ?>