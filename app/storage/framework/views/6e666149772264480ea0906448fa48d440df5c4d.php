<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Tweet')); ?></div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('tweets.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 p-3 w-100 d-flex">
                                    <img src="<?php echo e(asset('storage/profile_image/' .$user->profile_image)); ?>" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                                    <div class="ml-2 d-flex flex-column">
                                        <p class="mb-0"><?php echo e($user->name); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="tweetForm" name="text" required autocomplete="text" rows="4"><?php echo e(old('text')); ?></textarea>

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
                        <!-- フラッシュメッセージ -->
                        <?php if(session('flash_message')): ?>
                            <div class="flash_message">
                                <?php echo e(__(session('flash_message'))); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/app/resources/views/tweets/create.blade.php ENDPATH**/ ?>