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

    <title>Dashboard</title>

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

				<!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="view/static/assets/img/icons/tick.png"
                                alt="Category"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" th:href="@{/categories}">Xem chi tiết </a>
                                
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Thể loại</span>
                          <h3 class="card-title mb-2"><?php echo $countgenre ?></h3>
                          <small class="text-success fw-semibold">Có sách: <?php echo $countgenreactive ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="view/static/assets/img/icons/tick.png"
                                alt="Category"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" th:href="@{/categories}">Xem chi tiết </a>
                                
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Sản phẩm</span>
                          <h3 class="card-title mb-2"><?php echo $countbook ?></h3>
                          <small class="text-success fw-semibold">Đang bán: <?php echo $countbooksale ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="view/static/assets/img/icons/tick.png"
                                alt="Category"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" th:href="@{/categories}">Xem chi tiết </a>
                                
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Đơn hàng</span>
                          <h3 class="card-title mb-2"><?php echo $countorder ?></h3>
                          <small class="text-success fw-semibold">Hoàn thành: <?php echo $countordersuccess ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="view/static/assets/img/icons/tick.png"
                                alt="Category"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" th:href="@{/categories}">Xem chi tiết </a>
                                
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Khách hàng</span>
                          <h3 class="card-title mb-2"><?php echo $countcustomer ?></h3>
                          <small class="text-success fw-semibold">Đã mua: <?php echo $countcustomerorder ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">Tổng doanh thu</h5>
                                <!-- <span class="badge bg-label-warning rounded-pill">Năm 2023</span> -->
                              </div>
                              <div class="mt-sm-auto">
                                
                                <h3 class="mb-0"><?php echo number_format($totalrevenue) . "đ" ?></h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="col-12 mb-4">
                    <div class="card">
                      <h5 class="card-header m-0 me-2 pb-3">Kết quả kinh doanh</h5>
                      <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <form action="?route=dashboard" method="post">
                          <select name="type" onchange="this.form.submit()">
                            <option <?php if($type == 0): ?>selected<?php endif ?> value="0">Ngày </option>
                            <option <?php if($type == 1): ?>selected<?php endif ?> value="1">Tháng </option>
                            <option <?php if($type == 2): ?>selected<?php endif ?> value="2">Quý </option>
                            <option <?php if($type == 3): ?>selected<?php endif ?> value="3">Năm </option>
                          </select> 
                        </form> 
                      </div>
                      <canvas id="totalRevenueChart" width="400" height="200"></canvas>
                    </div>
                  </div>
                </div>
                
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                          <div class="card-title">
                            <h5 class="text-nowrap mb-2">Khách hàng</h5>
                            <!-- <span class="badge bg-label-warning rounded-pill">Year 2021</span> -->
                          </div>
                        </div>
                      </div>
                        <canvas id="customerChart" width="50" height="50"></canvas>
                    </div>
                  </div>
                </div>
              </div>

             
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Thể loại bán chạy </h5>
                      
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <?php 
                        $index = 0;
                        foreach ($listgenre as $genre): 
                        $index = $index + 1;
                        ?>
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="view/static/assets/img/icons/number-<?php echo $index ?>.png" alt="Category" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Tên thể loại</small>
                                <h6 class="mb-0" style="text-overflow: ellipsis; max-width: 20ch;"><?php echo $genre->getGenrename() ?></h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
  <!--                               <span class="text-muted">$</span> -->
                                <h6 class="mb-0"><?php echo $genre->getTotalBook() ?></h6>
                                
                              </div>
                            </div>
                          </li>
                        <?php endforeach ?>
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Sản phẩm bán chạy </h5>
                      
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <?php 
                          $index = 0;
                          foreach ($listbook as $book): 
                          $index = $index + 1;
                        ?>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="view/static/assets/img/icons/number-<?php echo $index ?>.png" alt="Category" class="rounded" />
                            </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Tên sản phẩm </small>
                              <h6 class="mb-0" style="text-overflow: ellipsis; max-width: 20ch;"><?php echo $book->getBookName() ?></h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
<!--                               <span class="text-muted">$</span> -->
                              <h6 class="mb-0"><?php echo $book->getQuantitySale() ?></h6>
                              
                            </div>
                          </div>
                        </li>
                        <?php endforeach ?>
                        
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Doanh thu từ khách hàng </h5>
                      
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0" th:each="order,state: ${orderTop}"  >
                        <?php 
                          $index = 0;
                          foreach ($listuser as $user): 
                          $index = $index + 1;
                        ?>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                              <img src="view/static/assets/img/icons/number-<?php echo $index ?>.png" alt="Category" class="rounded" />
                            </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Khách hàng</small>
                              <h6 class="mb-0" style="text-overflow: ellipsis; max-width: 20ch;"><?php echo $user->getUserName() ?></h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <!-- <span class="text-muted">$</span> -->
                              <h6 class="mb-0"><?php echo number_format($user->getTotalbook()) . " đ" ?></h6>
                              
                            </div>
                          </div>
                        </li>
                        <?php endforeach ?>
                        
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

            <script>
// Giả sử các dữ liệu sau được cung cấp hoặc lấy từ nguồn nào đó
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

let customerold = <?php echo $countcustomerold ?>;
let customernew  = <?php echo $countcustomernew ?>;
var ctx = document.getElementById('customerChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Khách hàng mới', 'Khách hàng cũ'],
        datasets: [{
          label: 'Phần trăm',
          data: [customerold*100/(customerold+customernew), customernew*100/(customerold+customernew)],
          backgroundColor: [
            'lightblue',
            'lightyellow'
          ],
          borderColor: [
            'lightblue',
            'lightyellow'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
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
    <script src="view/static/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <!-- Vendors JS -->
    <script src="view/static/assets/js/dashboards-analytics.js"></script>
    <!-- Main JS -->
    <script src="view/static/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
