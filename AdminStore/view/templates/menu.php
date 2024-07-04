
<?php 
$current_url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($current_url);

if (isset($url_components['query'])) {
    parse_str($url_components['query'], $params);
}
require_once 'dao/OrderDAO.php';
$sizecancel = (new OrderDAO())->getCountOrderByRequestCancel();

?>


<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <img src="view/static/assets/img/favicon/sach021.png" alt="LOGO" style="width:150px;">
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item <?php if(isset($params) && $params['route']=='dashboard'): ?>active<?php endif ?>"><a href="?route=dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                    </a></li>
                    <li class="menu-header small text-uppercase">
                         <span class="menu-header-text">Quản lý </span>
                    </li>
                    <!-- Layouts -->
                    <li class="menu-item <?php if(isset($params) && $params['route']=='category'): ?>active<?php endif ?>">
                            <a href="?route=category" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-box"></i>
                                    <div data-i18n="Container">Thể loại</div>
                            </a>
                    </li>
                    
					<li class="menu-item <?php if(isset($params) && ($params['route']=='product' || $params['route']=='productview' || $params['route']=='addproduct')): ?>active<?php endif ?>"><a href="?route=product" class="menu-link">
						<i class="menu-icon tf-icons bx bx-box"></i>
							<div data-i18n="Container">Sản phẩm </div>
					</a></li>
					<li class="menu-item <?php if(isset($params) && ($params['route']=='customer' || $params['route']=='customerview')): ?>active<?php endif ?>"><a href="?route=customer" class="menu-link">
						<i class="menu-icon tf-icons bx bx-box"></i>
							<div data-i18n="Container">Khách hàng</div>
					</a></li>
					<li class="menu-item <?php if(isset($params) && ($params['route']=='order' || $params['route']=='orderview')): ?>active<?php endif ?>"><a href="?route=order" class="menu-link">
						<i class="menu-icon tf-icons bx bx-box"></i>
							<div data-i18n="Container">Đơn hàng</div>
					</a></li>
                    <li class="menu-item <?php if(isset($params) && $params['route']=='requestcancel'): ?>active<?php endif ?>"><a href="?route=requestcancel" class="menu-link">
						<i class="menu-icon tf-icons bx bx-box"></i>
							<div data-i18n="Container">Yêu cầu hủy hàng 
                                <?php if($sizecancel>0): ?>
                                <span class="position-absolute rounded-circle d-flex align-items-center justify-content-center px-1" 
                                style="top: 10px; right: 15px; height: 20px; min-width: 20px; background-color: red; color: white;">
                                    <?php echo $sizecancel ?>
                                </span>
                                <?php endif ?>
</div>
					</a></li>
                        
                        <li class="menu-header small text-uppercase">
                         <span class="menu-header-text">Báo cáo </span>
                    </li>
                    <li class="menu-item <?php if(isset($params) && ($params['route']=='reportrevenue' || $params['route']=='reportrevenueview')): ?>active<?php endif ?>">
                            <a href="?route=reportrevenue" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-collection"></i>
                                    <div data-i18n="Container">Thông kê doanh thu </div>
                            </a>
                    </li>
                    <li class="menu-item <?php if(isset($params) && ($params['route']=='reportbook' || $params['route']=='reportbookview')): ?>active<?php endif ?>">
                            <a href="?route=reportbook" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-collection"></i>
                                    <div data-i18n="Container">Thống kê sản phẩm </div>
                            </a>
                    </li>
                    <li class="menu-item <?php if(isset($params) && $params['route']=='reportcustomer'): ?>active<?php endif ?>">
                            <a href="?route=reportcustomer" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-collection"></i>
                                    <div data-i18n="Container">Thống kê khách hàng </div>
                            </a>
                    </li>
                        
                         <li class="menu-header small text-uppercase">
                         <span class="menu-header-text">Tài khoản</span>
                    </li> 
                    <li class="menu-item <?php if(isset($params) && $params['route']=='profile'): ?>active<?php endif ?>">
                            <a href="?route=profile" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                                    <div data-i18n="Container">Thông tin</div>
                            </a>
                    </li> 
                    <li class="menu-item">
                            <a href="?route=logout" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                                    <div data-i18n="Container">Đăng xuất</div>
                            </a>
                    </li>
                </ul>
            </aside>