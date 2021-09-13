<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Панель управления
                            </a>
                            <div class="sb-sidenav-menu-heading">-----------</div>
                            <a class="nav-link" href="<?php echo e(route('admin.categories.index')); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Categories
                                
                            </a>
                            <a class="nav-link" href="<?php echo e(route('admin.news.index')); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                News
                                
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div><?php /**PATH /var/www/html/resources/views/components/admin/sidebar.blade.php ENDPATH**/ ?>