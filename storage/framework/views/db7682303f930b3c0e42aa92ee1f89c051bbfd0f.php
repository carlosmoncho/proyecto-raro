<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->
        <?php if($validProduct->sale): ?>
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 12rem">Sale</div>
        <?php endif; ?>
        <?php if($validProduct->category): ?>
            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><a href="/?show=categories&category=<?php echo e($validProduct->category_id); ?>" > <?php echo e($validProduct->category->name); ?>  </a></div>
        <?php endif; ?>
        <!-- Product image-->
        <?php if($validProduct->img): ?>
            <img class="card-img-top" height="300px" src="<?php echo e($validProduct->img); ?>" alt="..." />
        <?php else: ?>
            <img class="card-img-top" src="http://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
        <?php endif; ?>
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"> <?php echo e($validProduct->name); ?></h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <?php for($i=0;$i<$validProduct->stars;$i++): ?>:
                        <div class="bi-star-fill"></div>
                    <?php endfor; ?>
                </div>
                <!-- Product price-->
                <?php if($validProduct->discount_price): ?>
                    <?php echo e($validProduct->discount_price??''); ?> $ -
                    <span class="text-muted text-decoration-line-through"><?php echo e($validProduct->original_price); ?> $</span>
                <?php else: ?>
                    <?php echo e($validProduct->original_price); ?> $
                <?php endif; ?>
                <br>
                <?php echo e($validProduct->TotalLikes); ?>

                <?php if(Auth::check()): ?>
                    <a href="<?php echo e(route('product.like', $validProduct->id)); ?>">
                        <?php if($validProduct->userLike): ?>
                            <i class="bi-star-fill"></i>
                        <?php else: ?>
                            <i class="bi bi-star"></i>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
                <form action="<?php echo e(route('shopping.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="id" value="<?php echo e($validProduct->id); ?>" hidden>
                    <button type="submit" class="btn badge bg-dark text-white position-absolute">Nueva Oferta</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/vagrant/code/projecte/resources/views/products/fitxa.blade.php ENDPATH**/ ?>