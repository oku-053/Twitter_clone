<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php if(isset($timelines)): ?>
            <script src="<?php echo e(mix('js/favorite.js')); ?>"></script>
                <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-8 mb-0">
                        <div class="card">
                            <div class="card-haeder p-3 w-100 d-flex" style="z-index:2">
                                <img src="<?php echo e(asset('storage/profile_image/' .$timeline->user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0"><?php echo e($timeline->user->name); ?></p>
                                    <a href="<?php echo e(route('users.show', $timeline->user_id)); ?>" class="text-secondary"><?php echo e($timeline->user_id); ?></a>
                                </div>
                                <div class="d-flex justify-content-end flex-grow-1">
                                    <p class="mb-0 text-secondary"><?php echo e($timeline->created_at->format('Y-m-d H:i')); ?></p>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo nl2br(e($timeline->text)); ?>

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
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="my-4 d-flex justify-content-center">
            <?php echo e($timelines->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/tweets/index.blade.php ENDPATH**/ ?>