<?php $__env->startSection('content'); ?>

<div id="fh5co-title-box"  data-stellar-background-ratio="0.5">
    <img src="https://dummyimage.com/1100x500/777/fff" alt=""/>
</div>
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla malesuada enim id enim congue
                    
                </p>
                <p>
                    Nulla tincidunt sit amet ligula interdum pulvinar. Sed nec volutpat enim. Praesent pretium
                    
                </p>
                <p>
                    Nam vehicula viverra quam, nec ornare ex convallis eget. Praesent pulvinar, justo at lacinia
                    
                </p>
                <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, modi!</li>
                    <li>Ea iure at, debitis culpa perspiciatis suscipit laudantium a, expedita.</li>
                    <li>Voluptate distinctio perspiciatis cum sed ipsum nisi accusantium a aut!</li>
                    <li>Sed vel quo dignissimos, quaerat totam officia, deserunt provident minus.</li>
                </ul>
                <p>
                    Maecenas consequat dictum aliquam. Praesent nec magna at ipsum facilisis dictum sit amet nec arcu.
                    
                </p>
            </div>
            <!-- <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                
                <div class="clearfix"></div> -->
                <?php echo $__env->make('news.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
            <!-- </div> -->
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/news/show.blade.php ENDPATH**/ ?>