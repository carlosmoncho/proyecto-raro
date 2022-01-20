<?php $__env->startSection('content'); ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <table class="table" style=" width: 200px;" >
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th><th scope="col">Product</th><th scope="col">User</th><th scope="col">Demanded Price</th><th scope="col">Offer Price</th><th scope="col">Situation</th><th>Actions</th>
                    </tr>
                    </thead>
                    <?php if(\PHPUnit\Framework\isEmpty($offers)): ?>
                        <tbody>
                        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($offer->accepted === null): ?>
                                <tr>
                            <?php elseif($offer->accepted): ?>
                                <tr class="table-primary">
                            <?php else: ?>
                                <tr class="table-danger" >
                            <?php endif; ?>
                                <td><?php echo e($offer->id); ?></td>
                                <td><?php echo e($offer->getProduct()->name); ?></td>
                                <td><?php echo e($offer->getUser()->name); ?></td>
                                <td><?php echo e($offer->getProduct()->original_price); ?></td>
                                <td><?php echo e($offer->price); ?></td>
                                <td><?php echo e($offer->getSituationAttribute()); ?></td>
                                <td>
                                    <a href="/accepted/<?php echo e($offer->id); ?>"><i class="bi bi-hand-thumbs-up"></i></a>
                                    <a href="/rejected/<?php echo e($offer->id); ?>"><i class="bi bi-hand-thumbs-down"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    <?php endif; ?>
                </table>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.batoiPOP', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/projecte/resources/views/myOffers/index.blade.php ENDPATH**/ ?>