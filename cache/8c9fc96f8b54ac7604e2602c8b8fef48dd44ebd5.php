<?php $__env->startSection('body'); ?>

    <form class="d-flex justify-content-center" action="/todo/create" method="post">
        <fieldset>
            <legend>Dados da tarefa</legend>
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description">
            </div>
            <button class="btn btn-primary">Criar tarefa</button>
        </fieldset>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guilherme/monitoria_web1/src/views/todo/create.blade.php ENDPATH**/ ?>