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
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Control</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 10%;">Title</th>
                                            <th style="width: 25%;">Description</th>
                                            <th style="width: 10%;">Date</th>
                                            <th style="width: 10%;">Control</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo $news['id']; ?></td>
                                            <td><?php echo $news['title']; ?></td>
                                            <td><?php echo $news['description']; ?></td>
                                            <td><?php echo $news['created_at']->format('d-m-Y'); ?></td>
                                            <td>$320,800</td>
  
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                                </table>
                            </div>
                        </div>
<?php $__env->stopSection(); ?>

        <!--<h2><a href="<?=route('news.show', ['id' => $news['id']])?>"><?=$news['title']?></a></h2> -->
        
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/news/index.blade.php ENDPATH**/ ?>