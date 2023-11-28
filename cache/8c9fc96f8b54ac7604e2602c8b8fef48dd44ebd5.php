<?php $__env->startSection('body'); ?>
    <form action="/todo/create" method="post">
        <fieldset class="w-75">
            <legend>Dados da tarefa</legend>
            <div>
                <label>Titulo</label>
                <input name="title">
            </div>
            <div>
                <label>Descrição</label>
                <input name="description">
            </div>
            <button>Criar tarefa</button>
        </fieldset>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guilherme/monitoria_web1/src/views/todo/create.blade.php ENDPATH**/ ?>