<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-inline-flex">
                    <div class="p-3 d-flex flex-column">
                        <img src="<?php echo e(asset('storage/profile_image/' . $user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" width="100" height="100" class="rounded-circle">
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold"><?php echo e($user->name); ?></h4>
                            <span class="text-secondary"><?php echo e($user->user_id); ?></span>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex">
                            <div>
                                <?php if($loginDecision): ?>
                                <a href="<?php echo e(route('users.edit', $user->user_id)); ?>" class="btn btn-primary"><?php echo e(__('edit_profile')); ?></a>
                                <?php else: ?>
                                <?php if($isFollowing): ?>
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

                                <?php if($isFollowed): ?>
                                <span class="mt-2 px-1 bg-secondary text-light"><?php echo e(__('Followed')); ?></span>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold"><?php echo e(__('Tweet_count')); ?></p>
                                <span><?php echo e($tweetCount); ?></span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold"><?php echo e(__('Follow_count')); ?></p>
                                <span><?php echo e($followCount); ?></span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold"><?php echo e(__('Follower_count')); ?></p>
                                <span><?php echo e($followerCount); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(isset($timelines)): ?>
        <div class="col-md-8 mb-3">
            <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex" style="z-index:2">
                    <img src="<?php echo e(asset('storage/profile_image/' . $user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" width="50" height="50" class="rounded-circle">
                    <div class="ml-2 d-flex flex-column flex-grow-1">
                        <p class="mb-0"><?php echo e($user->name); ?></p>
                        <a href="<?php echo e(route('users.show', $timeline->user_id)); ?>" class="text-secondary"><?php echo e($timeline->user_id); ?></a>
                    </div>
                    <div class="d-flex justify-content-end flex-grow-1">
                        <p class="mb-0 text-secondary"><?php echo e($timeline->created_at->format('Y-m-d H:i')); ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <?php echo e($timeline->text); ?>

                    <a href="<?php echo e(route('tweets.show',$timeline->tweet_id)); ?>" class="card__link"></a>
                </div>
                <div class="card-footer py-1 d-flex justify-content-end bg-white" style="z-index:3">
                    <div>
                        <?php if(!$timeline->isfavoritedBy(Auth::user())): ?>
                            <span class="favorites">
                            <i class="fa-solid fa-heart favoriteToggle" data-tweet-id="<?php echo e($timeline->tweet_id); ?>"></i>
                            <span class="favoriteCounter"><?php echo e($timeline->favoritesCount()); ?></span>
                            </span>
                        <?php else: ?>
                            <span class="favorites">
                                <i class="fa-solid fa-heart favoriteToggle favorite"  data-tweet-id="<?php echo e($timeline->tweet_id); ?>"></i>
                            <span class="favoriteCounter"><?php echo e($timeline->favoritesCount()); ?></span>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="mr-3 d-flex align-items-center">
                        <a href="<?php echo e(route('tweets.show',$timeline->tweet_id)); ?>"><i class="far fa-comment fa-fw"></i></a>
                        <p class="mb-0 text-secondary"><?php echo e(count($timeline->comments)); ?></p>  
                    </div>                  
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="my-4 d-flex justify-content-center">
        <?php echo e($timelines->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/users/show.blade.php ENDPATH**/ ?>