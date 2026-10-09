<?php $__env->startSection('title', 'Forgot your password'); ?>
<?php $__env->startSection('content'); ?>


        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-6 col-xs-12 col-sm-12 login_form rounded-start-11">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <?php if(Session::has('message')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo e(Session::get('message')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <?php if(session('status')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo e(session('status')); ?>

                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                    <div class="card-body mt-2 mb-2">

                                        <h2 class="text-start mb-2">Forgot Password</h2>
                                        <p class="mb-3 text-muted tx-13 ms-0 text-start">Don't worry! We will help you
                                            to recover your password.</p>

                                        <center>
                                                                                    </center>

                                         <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                                <?php echo csrf_field(); ?>

                                            <div class="form-group text-start">
                                                <label class="tx-medium">Enter the Email Address associated with your
                                                    account</label>
                                                <input class="form-control" placeholder="Enter your email" type="email"
                                                    name="email" required="" >
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="fs-6 text-danger"><?php echo e($message); ?></small>
                                                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>


                                            <button type="submit" class="btn btn-primary btn-block"
                                                name="recover">Request reset link</button>

                                        </form>
                                        <div class="card-footer border-top-0 ps-0 mt-3 text-start mb-0 ">
                                            <p>Did you remembered your password?</p>
                                            <p class="mb-0">Try to <a href="<?php echo e(route('login')); ?>">Sign in</a></p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6 d-none d-lg-block text-center bg-primary details rounded-end-11">
                            <div class="mt-4 pt-3 p-2 pos-relative">
                                <div class="clearfix"></div>
                                <img src="<?php echo e(asset('temp/auth/main/forgot.svg')); ?>" class="ht-200 mb-0" alt="user">
                                <h2 class="mt-4 text-white tx-normal">Reset Your Password</h2>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Don't worry! We will help you to recover
                                    your password</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/trustequ/topratedsignal.com/resources/views/auth/forgot-password.blade.php ENDPATH**/ ?>