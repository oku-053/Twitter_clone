<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-haeder p-3 w-100 d-flex">
                        <img src="<?php echo e(asset('storage/profile_image/' .$tweet->user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                        <div class="ml-2 d-flex flex-column">
                            <p class="mb-0"><?php echo e($tweet->user->name); ?></p>
                            <a href="<?php echo e(route('users.show', $tweet->user->user_id)); ?>" class="text-secondary"><?php echo e($tweet->user->user_id); ?></a>
                        </div>
                        <div class="d-flex justify-content-end flex-grow-1">
                            <p class="mb-0 text-secondary"><?php echo e($tweet->created_at->format('Y-m-d H:i')); ?></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo nl2br(e($tweet->text)); ?>

                    </div>
                    <div class="card-footer py-1 d-flex justify-content-end bg-white" style="z-index:4">
                        <div>
                            <?php if(!$tweet->isfavoritedBy(Auth::user())): ?>
                                <span class="favorites">
                                <i class="fa-solid fa-heart favoriteToggle" data-tweet-id="<?php echo e($tweet->tweet_id); ?>"></i>
                                <span class="favoriteCounter"><?php echo e($tweet->favoritesCount()); ?></span>
                                </span>
                            <?php else: ?>
                                <span class="favorites">
                                    <i class="fa-solid fa-heart favoriteToggle favorite"  data-tweet-id="<?php echo e($tweet->tweet_id); ?>"></i>
                                <span class="favoriteCounter"><?php echo e($tweet->favoritesCount()); ?></span>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
                <ul class="list-group col-md-8 mb-0">
                    <li class="list-group-item">
                        <div class="py-3">
                            <form method="POST" action="<?php echo e(route('comments.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 p-3 w-100 d-flex">
                                        <img src="<?php echo e(asset('storage/profile_image/' .$user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                                        <div class="ml-2 d-flex flex-column">
                                            <p class="mb-0"><?php echo e($user->name); ?></p>
                                            <a href="<?php echo e(route('users.show', $tweet->user->user_id)); ?>"  class="text-secondary"><?php echo e($user->user_id); ?></a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="tweet_id" value="<?php echo e($tweet->tweet_id); ?>">
                                        <textarea class="form-control <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tweetForm" name="text" required autocomplete="text" rows="4" placeholder="<?php echo e(__('Tweet a comment')); ?>"><?php echo e(old('text')); ?></textarea>

                                        <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-right">
                                        <p id="inputCount" class="mb-4 text-dark"><span id="inputCounter"><?php echo e(__('0')); ?></span><?php echo e(__('characters')); ?></p>
                                        <script src="<?php echo e(mix('js/tweet.js')); ?>"></script>
                                        <button type="submit" id="tweetButton" class="btn btn-primary">
                                            <?php echo e(__('Tweet')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                            <?php if(session('flash_message')): ?>
                                <div class="flash_message">
                                    <?php echo e(__(session('flash_message'))); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="list-group-item">
                            <div class="py-3 w-100 d-flex">
                                <img src="<?php echo e(asset('storage/profile_image/' .$comment->user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0"><?php echo e($comment->user->name); ?></p>
                                    <a href="<?php echo e(route('users.show', $tweet->user->user_id)); ?>" class="text-secondary"><?php echo e($comment->user->user_id); ?></a>
                                </div>
                                <div class="d-flex justify-content-end flex-grow-1">
                                    <p class="mb-0 text-secondary"><?php echo e($comment->created_at->format('Y-m-d H:i')); ?></p>
                                 </div>
                                </div>
                            <div class="py-3">
                                <?php echo nl2br(e($comment->text)); ?>

                            </div>
                            <div class="card-footer py-1 d-flex justify-content-end bg-white" style="z-index:3">
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="list-group-item">
                            <p class="mb-0 text-secondary"><?php echo e(__('No comments')); ?></p>
                        </li>
                    <?php endif; ?>
                </ul>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/tweets/show.blade.php ENDPATH**/ ?>