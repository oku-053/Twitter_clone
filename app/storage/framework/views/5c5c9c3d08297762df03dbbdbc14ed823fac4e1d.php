<?php $__env->startSection('title', 'ユーザー一覧'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php $__currentLoopData = $all_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    <img src="<?php echo e(asset('storage/profile_image/' . $user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column">
                        <p class="mb-0"><?php echo e($user->name); ?></p>
                        <a href="<?php echo e(route('users.show', $user->user_id)); ?>" class="text-secondary"><?php echo e($user->user_id); ?></a>
                    </div>
                    <?php if(auth()->user()->isFollowed($user->user_id)): ?>
                    <div class="px-2">
                        <span class="px-1 bg-secondary text-light"><?php echo e(__('Followed')); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-end flex-grow-1">
                        <?php if(auth()->user()->isFollowing($user->user_id)): ?>
                        <form action="<?php echo e(route('unfollow', ['user' => $user->user_id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('DELETE')); ?>

                            <button type="submit" class="btn btn-danger"><?php echo e(__('un_Follow')); ?></button>
                        </form>
                        <?php else: ?>
                        <form action="<?php echo e(route('follow', ['user' => $user->user_id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <button type="submit" class="btn btn-primary"><?php echo e(__('Follow')); ?></button>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="my-4 d-flex justify-content-center">
        <?php echo e($all_users->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/users/index.blade.php ENDPATH**/ ?>