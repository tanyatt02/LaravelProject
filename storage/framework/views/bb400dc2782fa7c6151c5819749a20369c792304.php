<?php $__env->startSection('content'); ?>


    <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                <?php $__empty_1 = true; $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img">
                                    <a href="<?php echo e(route('news.show', ['id' => $news['id']])); ?>">
                                        <img src="https://dummyimage.com/290x200/000/fff" alt=""/></div>
                                    </a>
                                <div></div>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="single.html" class="fh5co_magna py-2"> <a href="<?php echo e(route('news.show', ['id' => $news['id']])); ?>"><?php echo e($news['title']); ?><br></a>
                            </a> <?php echo e($news['created_at']->format('d M, Y')); ?> 
                            <div class="fh5co_consectetur"> <?php echo $news['description']; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h2>Нет новостей День сурка</h2>
                <?php endif; ?>
                
    </div>  

    <?php echo $__env->make('news.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/news/indexCategory.blade.php ENDPATH**/ ?>