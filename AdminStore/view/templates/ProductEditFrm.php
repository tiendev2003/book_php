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

    <title>Sửa sản phẩm </title>

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
							<span class="text-muted fw-light">Sản phẩm /</span> Sửa sản phẩm 
						</h4>
						<!-- Layout Demo -->
						<!-- Basic Layout -->
                         
                        <form action="?route=doeditproduct" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                                    <div class="col-xl">
                                        <div class="card mb-4">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0">Sửa sản phẩm </h5>
                                            </div>
                                            <div id="error_product" class="alert alert-danger" role="alert" style="display: none;">
                                                <span id="error_span_product"></span>
                                            </div>
                                            <?php if (isset($failed)): ?>
											<div class="alert alert-danger" role="alert">
												<?php echo htmlspecialchars($failed); ?>
											</div>
										<?php endif; ?>
                                            <div class="card-body">
                                                    <input type="hidden" name="bookid" value="<?php echo $book->getBookId() ?>">
                                                    <input type="hidden" name="image" value="<?php echo $book->getImage() ?>">
                                                    <input type="hidden" name="quantitysale" value="<?php echo $book->getQuantitySale() ?>">
                                                    <div class="row g-2">
                                                        <label class="form-label" for="basic-default-fullname">Tên sản phẩm *</label> 
                                                        <div class="col mb-0">
                                                            <input type="text" class="form-control" id="bookname" value="<?php echo $book->getBookName() ?>" name="bookname"/>
                                                        </div> 
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Thể loại *</label> 
                                                        <select name="genreid" class="form-control" id="genreid">
                                                            <option value="null" disabled selected>-chưa chọn-</option>
                                                            <?php foreach($listgenre as $genre): ?>
                                                                <option value="<?php echo $genre->getGenreid() ?>" <?php if($genre->getGenreid() == $book->getGenre()->getGenreid()): ?>selected<?php endif ?>><?php echo $genre->getCate()->getCatename() . " - " . $genre->getGenrename() ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Số lượng *</label> 
                                                        <input type="text" class="form-control" id="quantity" value="<?php echo $book->getQuantity() ?>" name="quantity" placeholder=""/>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                        <label class="form-label" for="basic-default-fullname">Giá mua *</label>
                                                            <input type="text" class="form-control" id="costprice" value="<?php echo $book->getCostPrice() ?>" name="costprice"/>
                                                        </div>
                                                        <div class="col mb-0">
                                                        <label class="form-label" for="basic-default-fullname">Giá bán *</label>
                                                            <input type="text" class="form-control" id="saleprice" value="<?php echo $book->getSalePrice() ?>" name="saleprice"/>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Nhà cung cấp </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getDistributor() ?>" name="distributor" placeholder=""/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Nhà  xuất bản </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getPublisher() ?>" name="publisher" placeholder=""/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Tác giả </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getAuthor() ?>" name="author" placeholder=""/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Dịch giả </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getTranslator() ?>" name="translator" placeholder="" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Năm  </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getYear() ?>" name="year" placeholder="" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Kích thước  </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getSize() ?>" name="size" placeholder="" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Số trang </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getPages() ?>" name="pages" placeholder="" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basic-default-fullname">Cân nặng </label> 
                                                        <input type="text" class="form-control" id="c_odate" value="<?php echo $book->getWeight() ?>" name="weight" placeholder="" />
                                                    </div>

                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                            <img src="<?php echo $book->getImage(); ?>" 
                                            style="height: 20vw; width: 20vw; display: block; margin: 0 auto;">
                                            <label class="form-label" for="basic-default-fullname">Thay hình ảnh *</label> 
                                                <input type="file" name="imagenew" id="image">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="basic-default-fullname">Mô tả</label> 
                                                <textarea class="form-control" id="c_weight" name="description" rows="23"><?php echo $book->getDescription(); ?></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                
                            </div>


                            <button type="submit" class="btn btn-outline-primary"  onclick="return checkProduct()">Sửa sản phẩm </button>
                        </form>

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

<script>
function checkProduct(){
    let ok = true;
    let bookname = document.getElementById('bookname');
    let quantity = document.getElementById('quantity');
    let costprice = document.getElementById('costprice');
    let saleprice = document.getElementById('saleprice');
    let genreid = document.getElementById('genreid');
    var error = document.getElementById("error_product");
    if(bookname.value.length == 0 || quantity.value.length == 0 || costprice.value.length == 0 || saleprice.value.length == 0 || genreid.value == "null"){
        document.getElementById('error_span_product').innerHTML = "Không được để trống";
        error.style.display = "block";
        ok = false;
    }
    return ok;
}
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
