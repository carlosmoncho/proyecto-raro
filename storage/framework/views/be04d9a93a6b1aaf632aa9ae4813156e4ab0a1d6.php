<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">

                <?php $__currentLoopData = config('menu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $nameLink = key($group); $link = $group[$nameLink]; ?>
                    <?php if(!is_array($link)): ?>
                        <?php if($nameLink === 'Load' && Auth::check() || $nameLink !== 'Load'): ?>
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                                href="<?php echo e($link); ?>">
                                <?php echo e($nameLink); ?> </a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><?= $nameLink ?></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $__currentLoopData = $link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subName => $subLink): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item" href="<?php echo e($subLink); ?>"><?php echo e($subName); ?> </a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <?php if(Auth::user()): ?>
                        <i class="bi bi-person"><a class="dropdown-item" href="logout">Logout <?php echo e(Auth::user()->name); ?></a></i>
                    <?php else: ?>
                        <i class="bi bi-person"><a class="dropdown-item" href="login">Login</a></i>
                    <?php endif; ?>
                </button>
            </form>
        </div>
    </div>
</nav>
<?php /**PATH /home/vagrant/code/projecte/resources/views/partials/navigation.blade.php ENDPATH**/ ?>