<?php $__env->startSection('body'); ?>

    <form class="d-flex justify-content-center" action="/login" method="post">
        <fieldset>
            <legend>Preencha seus dados</legend>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guilherme/monitoria_web1/src/views/user/login.blade.php ENDPATH**/ ?>