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

    <title>Xem chi tiết </title>

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


				<!-- Content wrapper -->
				<div class="content-wrapper">



					<!-- Content -->

					<div class="container-xxl flex-grow-1 container-p-y">
						<h4 class="fw-bold py-3 mb-4">
							<span class="text-muted fw-light">Sản phẩm /</span> Xem chi tiết
						</h4>
						<!-- Layout Demo -->
						<!-- Basic Layout -->
						<div class="row">
                            <div class="col-12 col-lg-7 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="col-xl">
                                    <div class="card mb-4">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0">Xem chi tiết</h5>
                                        </div>
                                        <div class="card-body">
                                            <form th:action="" method="post">
                                                <div class="row g-2">
                                                    <label class="form-label" for="basic-default-fullname">Tên sản phẩm </label> 
                                                    <div class="col mb-0">
                                                        <input type="text" class="form-control" id="customer_fname" value="<?php echo $book->getBookName() ?>" name="customer_fname" readonly/>
                                                    </div> 
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Tên thể loại </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getGenre()->getGenrename() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basic-default-fullname">Số lượng tồn </label>
                                                        <input type="text" class="form-control" id="c_city" value="<?php echo $book->getQuantity() ?>" name="c_city" readonly/>
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Số lượng bán </label>
                                                        <input type="text" class="form-control" id="c_country" value="<?php echo $book->getQuantitySale() ?>" name="c_country" readonly/>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Giá mua  </label>
                                                        <input type="text" class="form-control" id="c_country" value="<?php echo $book->getCostPrice() ?>" name="c_country" readonly/>
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Giá bán </label>
                                                        <input type="text" class="form-control" id="customer_add" value="<?php echo $book->getSalePrice() ?>" name="customer_add" readonly/>
                                                    </div>
                                                </div>
                                                <?php if($book->getDistributor() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Nhà cung cấp </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getDistributor() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                <?php if($book->getPublisher() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Nhà  xuất bản </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getPublisher() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                <?php if($book->getAuthor() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Tác giả </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getAuthor() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                <?php if($book->getTranslator() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Dịch giả </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getTranslator() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                <?php if($book->getYear() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Năm  </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getYear() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                <?php if($book->getSize() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Kích thước  </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getSize() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                <?php if($book->getPages() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Số trang </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getPages() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                <?php if($book->getWeight() != null): ?>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Cân nặng </label> 
                                                    <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getWeight() ?>" name="c_odate" placeholder="" readonly/>
                                                </div>
                                                <?php endif ?>
                                                

                                            </form>
                                        </div>
                                    </div>
                                    <a type="button" class="btn btn-outline-primary" href="?route=editproduct&bookid=<?php echo $book->getBookId() ?>">Sửa sản phẩm </a>
                                    <a type="button" class="btn btn-outline-primary" href="?route=deleteproduct&bookid=<?php echo $book->getBookId() ?>">Xóa sản phẩm </a>
                                </div>
                            </div>
                            
                            <div class="col-12 col-lg-5 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Hình ảnh </label> 
                                            <img src="<?php echo $book->getImage(); ?>" 
                                            style="height: 20vw; width: 20vw; display: block; margin: 0 auto;">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-fullname">Mô tả</label> 
                                            <textarea class="form-control" id="c_weight" name="c_weight" rows="23" readonly><?php echo $book->getDescription(); ?></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>

                            
                        </div>




						<!--/ Layout Demo -->
					</div>
					<!-- / Content -->
					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			<!-- / Layout page -->
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>



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
