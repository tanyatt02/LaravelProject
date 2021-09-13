<?php $__env->startSection('content'); ?>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Панель администратора
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 10%;">ID</th>
                                            <th style="width: 55%;">Title</th>
                                            <th style="width: 15%;">Date</th>
                                            <th style="width: 10%;">Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $__currentLoopData = $categoriesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo $key; ?></td>
                                            <td><?php echo $category; ?></td>
                                            <td><?php echo now()->format('d-m-Y'); ?></td>
                                            <td>
                                            <a href="">Ред.</a>
                                                     &nbsp;
                                                    <a href="">Уд.</a>
                                            </td>
  
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
<?php $__env->stopSection(); ?>

        

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>