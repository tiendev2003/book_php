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
						<div class="row">
							<div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
								<!-- Striped Rows -->
								<div class="card">
									<div class="card-header">
										<h4>Danh mục</h4>
										<?php if (count($listcategory)==0): ?>
											<p>Không có danh mục nào</p>
										<?php endif; ?>

										<?php if (isset($success)): ?>
											<div class="alert alert-success" role="alert">
												<?php echo htmlspecialchars($success); ?>
											</div>
										<?php endif; ?>

										<?php if (isset($failed)): ?>
											<div class="alert alert-danger" role="alert">
												<?php echo htmlspecialchars($failed); ?>
											</div>
										<?php endif; ?>


										<!-- Vertically Centered Modal -->
										<div class="col-lg-4 col-md-6">
											<div class="mt-3">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-primary"
													data-bs-toggle="modal" data-bs-target="#modalCenterCategory">
													Thêm danh mục </button>


											</div>
										</div>
									</div>



									<div class="table-responsive text-nowrap">
										<?php if (count($listcategory)>0): ?>
										<table class="table table-striped" th:if="${size>0}">
											<thead>
												<tr>
													<th>STT</th>
													<th>Tên danh mục </th>
													<th>Thao tác </th>
												</tr>
											</thead>
											<tbody class="table-border-bottom-0">
												<?php 
												$index = 0;
												foreach($listcategory as $category): 
												$index = $index + 1;
												?>
												<tr>
													<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
														<strong><?php echo $index ?></strong></td>
													<td><?php echo $category->getCatename() ?></td>

													<td><a id="editButton" type="button"
														class="btn rounded-pill btn-warning"
														href="?route=category&cateeditid=<?php echo $category->getCateid() ?>">Sửa</a>
														<a type="button"
														class="btn rounded-pill btn-danger"
														href="?route=deletecategory&cateid=<?php echo $category->getCateid() ?>">Xóa</a>
														<a type="button"
														class="btn rounded-pill btn-success"
														href="?route=category&cateid=<?php echo $category->getCateid() ?>">Xem</a>
													</td>
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
										<?php endif ?>
									</div>
								</div>
								<!--/ Striped Rows -->
							</div>
							
							<div class="col-12 col-lg-6 order-2 order-md-3 order-lg-2 mb-4">
							<div class="card">
									<div class="card-header">
										<h4><?php echo $cate->getCatename() ?></h4>
										<?php if (count($listgenre)==0): ?>
											<p>Không có thể loại nào</p>
										<?php endif; ?>

										<?php if (isset($successgenre)): ?>
											<div class="alert alert-success" role="alert">
												<?php echo htmlspecialchars($successgenre); ?>
											</div>
										<?php endif; ?>

										<?php if (isset($failedgenre)): ?>
											<div class="alert alert-danger" role="alert">
												<?php echo htmlspecialchars($failedgenre); ?>
											</div>
										<?php endif; ?>


										<!-- Vertically Centered Modal -->
										<div class="col-lg-4 col-md-6">
											<div class="mt-3">
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-primary"
													data-bs-toggle="modal" data-bs-target="#modalCenterGenre">
													Thêm thể loại </button>


											</div>
										</div>
									</div>



									<div class="table-responsive text-nowrap">
										<?php if (count($listgenre)>0): ?>
										<table class="table table-striped" th:if="${size>0}">
											<thead>
												<tr>
													<th>STT</th>
													<th>Tên thể loại</th>
													<th>Thao tác </th>
												</tr>
											</thead>
											<tbody class="table-border-bottom-0">
												<?php 
												$index = 0;
												foreach($listgenre as $genre): 
												$index = $index + 1;
												?>
												<tr>
													<td><i class="fab fa-angular fa-lg text-danger me-3"></i>
														<strong><?php echo $index ?></strong></td>
													<td><?php echo $genre->getGenrename() ?></td>

													<td><a id="editButton" type="button"
														class="btn rounded-pill btn-warning"
														href="?route=category&cateid=<?php echo $cate->getCateid() ?>&genreid=<?php echo $genre->getGenreid() ?>">Sửa</a>
														<a type="button"
														class="btn rounded-pill btn-danger"
														href="?route=deletegenre&cateid=<?php echo $cate->getCateid() ?>&genreid=<?php echo $genre->getGenreid() ?>">Xóa</a>
													</td>
												</tr>
												<?php endforeach ?>
											</tbody>
										</table>
										<?php endif ?>
									</div>
								</div>
							</div>
						</div>
					
					<div class="container-xxl flex-grow-1 container-p-y"></div>
					<!-- / Content -->


					<div class="content-backdrop fade"></div>
				</div>
				<!-- Content wrapper -->
			</div>
			</div>
			<!-- / Layout page -->
		</div>

		<!-- Overlay -->
		<div class="layout-overlay layout-menu-toggle"></div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalCenterCategory" tabindex="-1"
		aria-hidden="true">
		<form action="?route=addcategory" method="post">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCenterTitle">Thêm danh mục </h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label for="nameWithTitle" class="form-label">Tên</label> <input
									type="text" id="nameWithTitle" name="catename"
									class="form-control" placeholder="Nhập tên" />
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary"
							data-bs-dismiss="modal">Đóng </button>
						<button type="submit" class="btn btn-primary">Lưu</button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalCenterGenre" tabindex="-1"
		aria-hidden="true">
		<form action="?route=addgenre" method="post">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCenterTitle">Thêm thể loại </h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label for="nameWithTitle" class="form-label">Tên</label> <input
									type="text" id="nameWithTitle" name="namegenre"
									class="form-control" placeholder="Nhập tên" />
									<input type="hidden" name="cateid" value="<?php echo $cate->getCateid() ?>">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary"
							data-bs-dismiss="modal">Đóng </button>
						<button type="submit" class="btn btn-primary">Lưu </button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- Modal edit-->
	<div class="modal fade" id="editModalCategory" tabindex="-1" aria-hidden="true">
		<form action="?route=editcategory" method="post">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCenterTitle">Sửa danh mục</h5>
						<button type="button" id="closeModalButton" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label for="nameWithTitle" class="form-label">ID</label> <input
									id="idEdit" type="text" class="form-control" name="id" readonly />
							</div>
							<div class="row">
								<div class="col mb-3">
									<label for="nameWithTitle" class="form-label">Tên</label> <input
										id="nameEdit" type="text" class="form-control" name="name" />
								</div>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Lưu </button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- Modal edit-->
	<div class="modal fade" id="editModalGenre" tabindex="-1" aria-hidden="true">
		<form action="?route=editgemre" method="post">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalCenterTitle">Sửa thể loại </h5>
						<button type="button" id="closeModalButtonGenre" class="btn-close" data-bs-dismiss="modal"
							aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col mb-3">
								<label for="nameWithTitle" class="form-label">ID</label> <input
									id="idEditGenre" type="text" class="form-control" name="id" readonly />
							</div>
							<div class="row">
								<div class="col mb-3">
									<label for="nameWithTitle" class="form-label">Tên</label> <input
										id="nameEditGenre" type="text" class="form-control" name="namegenre" />
										<input type="hidden" name="cateid" id="cateidEditGenre">
								</div>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Lưu </button>
					</div>
				</div>
			</div>
		</form>
	</div>


	<script>
	<?php if (isset($cateedit)): ?>

document.addEventListener('DOMContentLoaded', function() {
    // Giả sử bạn đã có logic để lấy thông tin danh mục $cate
    // Thiết lập giá trị các trường trong modal
    document.getElementById('idEdit').value = "<?php echo $cateedit->getCateid() ?>";
    document.getElementById('nameEdit').value = "<?php echo $cateedit->getCatename() ?>";
    // Hiển thị modal
    var editModal = new bootstrap.Modal(document.getElementById('editModalCategory'));
    editModal.show();
});

document.getElementById('closeModalButton').addEventListener('click', function() {
    window.location.href = '?route=category';
});
<?php endif; ?>

<?php if (isset($genreedit)): ?>

document.addEventListener('DOMContentLoaded', function() {
    // Giả sử bạn đã có logic để lấy thông tin danh mục $cate
    // Thiết lập giá trị các trường trong modal
    document.getElementById('idEditGenre').value = "<?php echo $genreedit->getGenreid() ?>";
    document.getElementById('cateidEditGenre').value = "<?php echo $genreedit->getCate()->getCateid() ?>";
    document.getElementById('nameEditGenre').value = "<?php echo $genreedit->getGenrename() ?>";
    // Hiển thị modal
    var editModal = new bootstrap.Modal(document.getElementById('editModalGenre'));
    editModal.show();
});

document.getElementById('closeModalButtonGenre').addEventListener('click', function() {
    window.location.href = '?route=category&cateid=<?php echo $genreedit->getCate()->getCateid() ?>';
});
<?php endif; ?>
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
