<?php $__env->startSection('title'); ?>
    todo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <h1 class="text-center my-5">To-dos</h1>
    <div class="d-flex justify-content-center">
        <table class="table border-dark w-75">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Description</th>
                <th>Status</th>
                <th>options</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($value['title']); ?></td>
                    <td><?php echo e($value['description']); ?></td>
                    <td>
                        <button class="btn btn-success"><?php echo e($value['status'] ? 'Concluido' : 'Não concluido'); ?></button>
                    </td>
                    <td>
                        <button class="btn btn-primary">Atualizar</button>
                        <button class="btn btn-danger" onclick="del(<?php echo e($value['id']); ?>)">Deletar</button>
                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end m-5">
        <button onclick="window.location.href = '/todo/create'">criar tarefa</button>
    </div>

    <script>
        function del(id) {
            fetch(`/todo/${id}`, {
                method: 'DELETE'
            })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        window.location.href = '/todo';
                    } else {
                        alert('Não foi possível deletar');
                    }
                })
        }
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guilherme/monitoria_web1/src/views/todo/home.blade.php ENDPATH**/ ?>