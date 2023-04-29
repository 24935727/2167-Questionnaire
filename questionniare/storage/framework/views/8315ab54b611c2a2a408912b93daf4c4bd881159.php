<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="Dashboard">Dashboard</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    You are logged in!
                    <div class="card mt-4">
                        <div class="card-header">My Questionnaires</div>
                            <div class="card-body">
                             <?php $__currentLoopData = $questionnaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionnaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/questionnaires/<?php echo e($questionnaire->id); ?>"><?php echo e($questionnaire->title); ?></a></li>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                    </div>

                    </div>
                    <a class="btn btn-primary text-white" href="questionnaire/create" id="createQuestionnaireLink">Create a Questionnaire</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /workspaces/CIS2167-Laravel-6/2167-Questionnaire/questionniare/resources/views/home.blade.php ENDPATH**/ ?>