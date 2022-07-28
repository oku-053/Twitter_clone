<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d714762381.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <div id="app">
        <div class="sticky-top">
            <nav class="navbar navbar-expand-md navbar-light bg-white" style="z-index:2">
                <div class="container">
                    <a class=" navbar-brand" href="<?php echo e(route('tweets.index')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                                <?php if(Route::has('login')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(Route::has('register')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <?php if(auth()->guard()->check()): ?>
            <aside class="bd-sidebar" style="z-index:1">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="<?php echo e(route('tweets.index')); ?>" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            <?php echo e(__('Home')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('users.index')); ?>" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            <?php echo e(__('Users')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('users.show', $user_id = Auth::id())); ?>" class="nav-link link-dark">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            <?php echo e(__('Profile')); ?>

                        </a>
                    </li>
                    <li>
                        <a class="btn btn-md btn-primary" href="<?php echo e(route('tweets.create')); ?>">
                            <svg class="bi me-2" width="16" height="16"></svg>
                            <?php echo e(__('Tweet')); ?>

                        </a>
                    </li>
                </ul>
                <hr>
                <div class="authDropdown" style="bottom: 0;">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo e(asset('storage/profile_image/' . Auth::user()->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" width="32" height="32" class="rounded-circle me-2">
                        <strong><?php echo e(Auth::user()->name); ?></strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </div>
            </aside>
        <?php endif; ?>

        <main class="bd-main order-1">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>

</html><?php /**PATH /var/www/app/resources/views/layouts/app.blade.php ENDPATH**/ ?>