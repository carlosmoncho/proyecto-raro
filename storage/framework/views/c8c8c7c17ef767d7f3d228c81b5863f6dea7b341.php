<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BatoiPOP Homepage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/css/app.css" rel="stylesheet" />
</head>
<!-- Header-->
<header class="bg-dark py-1">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Batoi POP</h1>
            <p class="lead fw-normal text-white-50 mb-0">La teu tenda de segona ma</p>
        </div>
    </div>
</header>
<?php echo $__env->make('partials.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Batoi Website 2021</p></div>
</footer>
<!-- Core theme JS-->
<script src="js/app.js"></script>
</body>
</html>
<?php /**PATH /home/vagrant/code/projecte/resources/views/layouts/batoiPOP.blade.php ENDPATH**/ ?>