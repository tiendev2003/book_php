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

    <title>Thông tin tài khoản </title>

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
							<span class="text-muted fw-light">Thông tin tài khoản 
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
                                        <div id="error_profile" class="alert alert-danger" role="alert" style="display: none;">
                                            <span id="error_span_profile"></span>
                                        </div>
                                        <?php if (isset($errorprofile)): ?>
											<div class="alert alert-danger" role="alert">
												<?php echo htmlspecialchars($errorprofile); ?>
											</div>
										<?php endif; ?>
                                        <div class="card-body">
                                            <form action="?route=doprofileedit" method="post">
                                            <input type="hidden" class="form-control" id="customer_fname" value="<?php echo $user->getUserId() ?>" name="userid"/>
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-default-fullname">Họ và tên *</label> 
                                                    <div class="col mb-0">
                                                        <input type="text" class="form-control" id="fullname" value="<?php echo $user->getFullName() ?>" name="fullname"/>
                                                    </div> 
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basic-default-fullname">Chức vụ </label>
                                                        <input type="text" class="form-control" id="c_city" value="<?php echo $user->getRoleId()->getRoleName() ?>" name="c_city" readonly/>
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Tên đăng nhập *</label>
                                                        <input type="text" class="form-control" id="username" value="<?php echo $user->getUserName() ?>" name="username"/>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                        <label class="form-label" for="basic-default-fullname">Số điện thoại </label>
                                                        <input type="text" class="form-control" id="c_city" value="<?php echo $user->getPhone() ?>" name="phone"/>
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Email </label>
                                                        <input type="text" class="form-control" id="c_country" value="<?php echo $user->getEmail() ?>" name="email"/>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Thành phố </label>
                                                        <input type="text" class="form-control" id="c_country" value="<?php echo $user->getCity() ?>" name="city"/>
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Huyện </label>
                                                        <input type="text" class="form-control" id="customer_add" value="<?php echo $user->getDistrict() ?>" name="district"/>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Xã </label>
                                                        <input type="text" class="form-control" id="c_country" value="<?php echo $user->getWard() ?>" name="ward"/>
                                                    </div>
                                                    <div class="col mb-0">
                                                    <label class="form-label" for="basic-default-fullname">Địa chỉ chi tiết  </label>
                                                        <input type="text" class="form-control" id="customer_add" value="<?php echo $user->getAddressDetail() ?>" name="addressdetail"/>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary" onclick="return checkProfile()">Lưu thông tin </button>
                                            </form>
                                        </div>
                                        
                                    
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-lg-5 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Đổi mật khẩu </h5>
                                    </div>
                                        <div id="error_pass" class="alert alert-danger" role="alert" style="display: none;">
                                            <span id="error_span"></span>
                                        </div>
                                        <?php if (isset($successchangpass)): ?>
											<div class="alert alert-success" role="alert">
												<?php echo htmlspecialchars($successchangpass); ?>
											</div>
										<?php endif; ?>
                                        <?php if (isset($errorchangepass)): ?>
											<div class="alert alert-danger" role="alert">
												<?php echo htmlspecialchars($errorchangepass); ?>
											</div>
										<?php endif; ?>
                                    <div class="card-body">
                                    <form action="?route=changepass&username=<?php echo $user->getUserName() ?>" method="post">
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-fullname">Mật khẩu cũ</label> 
                                            <input type="password" class="form-control" id="passwordold" value="" name="passwordold"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-fullname">Mật khẩu mới</label> 
                                            <input type="password" class="form-control" id="passwordnew" value="" name="passwordnew"/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="basic-default-fullname">Nhập lại mật khẩu mới</label> 
                                            <input type="password" class="form-control" id="passwordnew2" value="" name="passwordnew2"/>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary" onclick="return checkPass()">Đổi mật khẩu </button>
                                    </form>
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

    <script type="text/javascript">
        function checkPass(){
            let ok = true;
            let input_pass1 = document.getElementById('passwordold');
            let input_pass2 = document.getElementById('passwordnew');
            let input_pass3 = document.getElementById('passwordnew2');
            var error = document.getElementById("error_pass");
            if(input_pass1.value.length == 0 || input_pass2.value.length == 0 || input_pass3.value.length == 0){
                document.getElementById('error_span').innerHTML = "Không được để trống";
                error.style.display = "block";
                ok = false;
            }
            else if (input_pass2.value !== input_pass3.value){
                document.getElementById('error_span').innerHTML = "Mật khẩu không trùng nhau";
                error.style.display = "block";
                ok = false;
            }
            else {
                error.style.display = "none";
            }
            return ok;
        }

        function checkProfile(){
            let ok = true;
            let fullname = document.getElementById('fullname').value;
            let username = document.getElementById('username').value;
            var error = document.getElementById("error_profile");
            if(fullname.length == 0 || username == 0){
                document.getElementById('error_span_profile').innerHTML = "Không được để trống";
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
