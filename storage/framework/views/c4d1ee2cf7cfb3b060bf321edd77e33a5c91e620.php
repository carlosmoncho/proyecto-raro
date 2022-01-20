<?php $__env->startSection('content'); ?>
    <h1>Nuevo Producto</h1>
    <form action="<?php echo e(route('product.update', $product->id)); ?>" method='POST' enctype="multipart/form-data">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Escribe el título aquí" value="<?php echo e($errors->any() ?  old('name') : $product->name); ?>">
            <?php if($errors->has('name')): ?>
                <div class="text-danger">
                    <?php echo e($errors->first('name')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="original_price">Precio Original</label>
            <input type="text" name="original_price" id="original_price" class="form-control" placeholder="Escribe el título aquí" value="<?php echo e($errors->any() ? old('original_price') : $product->original_price); ?>">
            <?php if($errors->has('original_price')): ?>
                <div class="text-danger">
                    <?php echo e($errors->first('original_price')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="discount_price">Precio Descuento</label>
            <input type="text" name="discount_price" id="discount_price" class="form-control" placeholder="Escribe el título aquí" value="<?php echo e($errors->any() ? old('discount_price') : $product->discount_price); ?>">
            <?php if($errors->has('discount_price')): ?>
                <div class="text-danger">
                    <?php echo e($errors->first('discount_price')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="discount_price">Sale: </label>
            <select id="sale" name="sale">
                <?php if($product->sale == 1): ?>
                <option value="1">yes</option>
                <option value="0">no</option>
                <?php else: ?>
                    <option value="0">no</option>
                    <option value="1">yes</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="category_id">
            <label for="category_id">Categoria: </label>
            <select id="category_id" name="category_id">
                <option value="<?php echo e($product->category_id); ?>"><?php echo e($categoriaProduct->name); ?></option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="file">Imagen</label>
            <input type="file" name="img">
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">Afegir post</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.batoiPOP', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/projecte/resources/views/products/edit.blade.php ENDPATH**/ ?>