<?php $__env->startSection('content'); ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <table class="table" style=" width: 200px;" >
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th><th scope="col">Name</th><th>Actions <a href="<?php echo e(route('product.create')); ?>" class="btn btn-sm btn-dark">New</a></th>
                    </tr>
                </thead>
                <?php if(\PHPUnit\Framework\isEmpty($products)): ?>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->id); ?></td><td><?php echo e($product->name); ?></td>
                        <td>
                            <a href="/delete/<?php echo e($product->id); ?>"><i class="bi bi-trash"></i></a>
                            <a href="<?php echo e(route('product.edit',$product->id)); ?>"><i class="bi bi-pencil"></i></a>
                            <a href="<?php echo e(route('product.show',$product->id)); ?>"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <?php endif; ?>
            </table>
            <div class="d-flex justify-content-center">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.batoiPOP', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/projecte/resources/views/products/index.blade.php ENDPATH**/ ?>