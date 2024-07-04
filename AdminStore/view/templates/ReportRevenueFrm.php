<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Đơn hàng</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="view/static/assets/img/favicon/5.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="view/static/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="view/static/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="view/static/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="view/static/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="view/static/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="view/static/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="view/static/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="view/static/assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
			<?php require 'view/templates/menu.php'; ?>
            
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php require 'view/templates/header.php'; ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                <div class="container-fluid flex-grow-1 container-p-y">
                    <!--                     Striped Rows -->
                    <div class="row">
                        <div class="col-12 col-lg-7 order-2 order-md-3 order-lg-2 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Thống kê doanh thu </h4>
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <form action="?route=reportrevenue" method="post">
                                        <select name="type" onchange="this.form.submit()">
                                            <option <?php if($type == 0): ?>selected<?php endif ?> value="0">Ngày </option>
                                            <option <?php if($type == 1): ?>selected<?php endif ?> value="1">Tháng </option>
                                            <option <?php if($type == 2): ?>selected<?php endif ?> value="2">Quý </option>
                                            <option <?php if($type == 3): ?>selected<?php endif ?> value="3">Năm </option>
                                        </select> 
                                        </form> 
                                    </div>
                                    <?php if (empty($listrevenue)) { ?>
                                        <p>Không có doanh thu </p>
                                    <?php } ?>
                                </div>

                                <div class="table-responsive text-nowrap">
                                    <?php if (!empty($listrevenue)) { ?>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <?php if($type >= 1): ?>
                                                    <th>
                                                        Năm 
                                                        <?php if($type == 3): ?>
                                                        <a href="?route=reportrevenue&type=3&sort=down">&#9660;</a>
                                                        <a href="?route=reportrevenue&type=3&sort=up">&#9650;</a>
                                                        <?php endif ?>
                                                    </th><?php endif ?>
                                                <?php if($type == 2): ?>
                                                    <th>
                                                        Quý 
                                                        <a href="?route=reportrevenue&type=2&sort=down">&#9660;</a>
                                                        <a href="?route=reportrevenue&type=2&sort=up">&#9650;</a>
                                                    </th>
                                                <?php endif ?>
                                                <?php if($type == 1): ?>
                                                    <th>
                                                        Tháng 
                                                        <a href="?route=reportrevenue&type=1&sort=down">&#9660;</a>
                                                        <a href="?route=reportrevenue&type=1&sort=up">&#9650;</a>
                                                    </th>
                                                <?php endif ?>
                                                <?php if($type == 0): ?>
                                                    <th>
                                                        Ngày 
                                                        <a href="?route=reportrevenue&type=0&sort=down">&#9660;</a>
                                                        <a href="?route=reportrevenue&type=0&sort=up">&#9650;</a> 
                                                    </th>
                                                <?php endif ?>
                                                <th>Chi phí</th>
                                                <th>Doanh thu </th>
                                                <th>Lợi nhuận </th>
                                                <th>Thao tác </th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <?php 
                                            $index = 0;
                                            foreach ($listrevenue as $revenue):
                                            $index = $index + 1;    
                                            ?>
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    <strong><?php echo $index ?></strong></td>
                                                <?php if($type >= 1): ?>
                                                    <th>
                                                        <?php echo $revenue->getYear() ?> 
                                                        
                                                    </th>
                                                <?php endif ?>
                                                <?php if($type == 2): ?>
                                                    <th>
                                                        <?php echo $revenue->getQuanter() ?> 
                                                        
                                                    </th>
                                                <?php endif ?>
                                                <?php if($type == 1): ?>
                                                    <th>
                                                        <?php echo $revenue->getMonth() ?> 
                                                    </th>
                                                <?php endif ?>
                                                <?php if($type == 0): ?>
                                                    <th>
                                                        <?php echo $revenue->getDate() ?>
                                                    </th>
                                                <?php endif ?>
                                                <td><?php echo number_format($revenue->getTotalCost()) . "đ" ?></td>
                                                <td><?php echo number_format($revenue->getTotalRevenue()) . "đ" ?></td>
                                                <td><?php echo number_format($revenue->getTotalProfit()) . "đ" ?></td>
                                                <td><a type="button"
                                                    class="btn rounded-pill btn-success"
                                                    href="?route=reportrevenueview&year=<?php echo $revenue->getYear() ?>&quanter=<?php echo $revenue->getQuanter() ?>&month=<?php echo $revenue->getMonth() ?>&date=<?php echo $revenue->getDate() ?>">Xem</a></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 order-2 order-md-3 order-lg-2 mb-4">
                            <div class="col-12 mb-4">
                                <div class="card">
                                <h5 class="card-header m-0 me-2 pb-3">Kết quả kinh doanh</h5>
                                <canvas id="totalRevenueChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php if (!empty($listrevenue)):?>                    
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <!-- Basic Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php if ($currentPage != 0): ?>
                                        <li class="page-item">
                                            <a href="?route=reportrevenue&page=<?php echo $currentPage - 1; ?>" class="page-link">Trước</a>
                                        </li>
                                    <?php endif; ?>
                                    
                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li class="page-item <?php echo ($currentPage == $i - 1) ? 'active' : ''; ?>">
                                            <a href="?route=reportrevenue&page=<?php echo $i - 1; ?>" class="page-link"><?php echo $i; ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    
                                    <?php if ($currentPage + 1 != $totalPages): ?>
                                        <li class="page-item">
                                            <a href="?route=reportrevenue&page=<?php echo $currentPage + 1; ?>" class="page-link">Sau</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                            <!-- / Basic Pagination -->
                        </div>
                    </footer>
                    <?php endif ?>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script>
    
var dataTime = [];
var dataCost = [];
var dataSale = [];
var dataProfit = [];

<?php foreach ($listreportrevenue as $reportrevenue): ?>
    dataTime.push('<?php echo $reportrevenue->getString(); ?>');
    dataCost.push(<?php echo $reportrevenue->getTotalCost(); ?>);
    dataSale.push(<?php echo $reportrevenue->getTotalRevenue(); ?>);
    dataProfit.push(<?php echo $reportrevenue->getTotalProfit(); ?>);
<?php endforeach; ?>
// Lấy phần tử canvas
var ctx = document.getElementById('totalRevenueChart').getContext('2d');

// Tạo biểu đồ đường
var totalRevenueChart = new Chart(ctx, {
    type: 'line', // Loại biểu đồ là 'line' - đường
    data: {
        labels: dataTime, // Nhãn trên trục x
        datasets: [
            {
                label: 'Doanh thu', // Nhãn cho dataset nhiệt độ
                data: dataSale, // Dữ liệu trên trục y cho nhiệt độ
                fill: true, 
                backgroundColor: 'rgba(255, 0, 0, 0.1)',
                borderColor: 'red',
                pointRadius: 3, // Đường kính của điểm dữ liệu
                pointHoverRadius: 5, 
                borderWidth: 0,
                tension: 0.4
            },
            {
                label: 'Chi phí', // Nhãn cho dataset độ bụi
                data: dataCost, // Dữ liệu trên trục y cho độ bụi
                fill: true, 
                backgroundColor: 'rgba(0, 255, 0, 0.1)', 
                borderColor: 'green',
                pointRadius: 3, // Đường kính của điểm dữ liệu
                pointHoverRadius: 5, 
                borderWidth: 0,
                tension: 0.4
            },
            {
                label: 'Lợi nhuận', // Nhãn cho dataset độ ẩm
                data: dataProfit, // Dữ liệu trên trục y cho độ ẩm
                fill: true, 
                backgroundColor: 'rgba(0, 0, 255, 0.1)', 
                borderColor: 'blue',
                pointRadius: 3, // Đường kính của điểm dữ liệu
                pointHoverRadius: 5, 
                borderWidth: 0,
                tension: 0.4
            }
        ]
    },
    options: {
        plugins: {
            legend: {
                display: true,
                position: 'top',
                labels: {
                  color: '#6c757d'
                }
            }
        }
    }
});
    </script>

      <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="view/static/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="view/static/assets/vendor/libs/popper/popper.js"></script>
    <script src="view/static/assets/vendor/js/bootstrap.js"></script>
    <script src="view/static/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="view/static/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="view/static/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
