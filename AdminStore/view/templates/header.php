<?php 
$current_url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($current_url);

if (isset($url_components['query'])) {
    parse_str($url_components['query'], $params);
}

?>



<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)"> <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->


                        <div class="navbar-nav align-items-center">
                        <?php if(isset($params) && ($params['route']=='product')): ?>
                            <form action="?route=product" method="post">
                                <div class="nav-item d-flex align-items-center">

                                    <i class="bx bx-search fs-4 lh-0"></i> <input type="search"
                                        id="search" name="keyword"
                                        class="form-control border-0 shadow-none"
                                        placeholder="Tìm theo tên sản phẩm ..." aria-label="Search..." />

                                </div>
                            </form>
                        <?php endif ?>

                        <?php if(isset($params) && ($params['route']=='customer')): ?>
                            <form action="?route=customer" method="post">
                                <div class="nav-item d-flex align-items-center">

                                    <i class="bx bx-search fs-4 lh-0"></i> <input type="search"
                                        id="search" name="keyword"
                                        class="form-control border-0 shadow-none"
                                        placeholder="Tìm theo tên khách hàng ..." aria-label="Search..." />

                                </div>
                            </form>
                        <?php endif ?>

                        <?php if(isset($params) && ($params['route']=='reportbook')): ?>
                            <form action="?route=reportbook" method="post">
                                <div class="nav-item d-flex align-items-center">

                                    <i class="bx bx-search fs-4 lh-0"></i> <input type="search"
                                        id="search" name="keyword"
                                        class="form-control border-0 shadow-none"
                                        placeholder="Tìm theo tên sản phẩm ..." aria-label="Search..." />

                                </div>
                            </form>
                        <?php endif ?>

                        <?php if(isset($params) && ($params['route']=='reportcustomer')): ?>
                            <form action="?route=reportcustomer" method="post">
                                <div class="nav-item d-flex align-items-center">

                                    <i class="bx bx-search fs-4 lh-0"></i> <input type="search"
                                        id="search" name="keyword"
                                        class="form-control border-0 shadow-none"
                                        placeholder="Tìm theo tên khách hàng ..." aria-label="Search..." />

                                </div>
                            </form>
                        <?php endif ?>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow"
                                href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="view/static/assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                            </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="?route=profile">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="view/static/assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">Quản lý</span> <small
                                                        class="text-muted">Quản lý</small>
                                                </div>
                                            </div>
                                    </a></li>
                                    

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li><a class="dropdown-item" href="?route=logout">
                                            <i class="bx bx-power-off me-2"></i> <span
                                            class="align-middle">Đăng xuất</span>
                                    </a></li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>