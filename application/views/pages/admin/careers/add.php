<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
	<?php $this->load->view('_partials/head') ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<?php $this->load->view('_partials/navbar') ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view('_partials/sidebar_main.php') ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Careers / Add New</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<!-- <ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
								<li class="breadcrumb-item active">Template</li>
							</ol> -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
                        <div class="errors" style="color:red;"><?php echo validation_errors(); ?></div>
						<form action="<?php echo BASE_URL . 'admin/careers/save'; ?>" method="POST">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="position">Position</label>
										<input type="text" name="position" placeholder="Enter Position" value="<?php echo (isset($_POST['position']) ? $_POST['position'] : ''); ?>" class="form-control">
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="department">Department</label>
										<input type="text" name="department" placeholder="Enter Department" value="<?php echo (isset($_POST['department']) ? $_POST['department'] : ''); ?>" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label for="emp_type">Employment Type</label>
										<input type="text" name="emp_type" placeholder="Enter Employment Type" value="<?php echo (isset($_POST['emp_type']) ? $_POST['emp_type'] : ''); ?>" class="form-control">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="form-group">
										<label for="qualifications">Qualifications</label>
										<textarea name="qualifications" id="qualifications" id="" cols="30" rows="10"><?php echo (isset($_POST['qualifications']) ? $_POST['qualifications'] : ''); ?></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										<label for="status">Status</label>
										<select name="status" id="status" class="form-control">
											<option value="0" <?php echo (isset($_POST['status']) && $_POST['status'] == 0 ? 'selected' : '' ); ?>>Inactive</option>
											<option value="1" <?php echo (isset($_POST['status']) && $_POST['status'] == 1 ? 'selected' : '' ); ?>>Active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="float-sm-right">
										<input type="submit" name="submit" value="Submit" class="btn btn-primary">
										<a href="<?php echo BASE_URL . 'admin/careers'; ?>" class="btn btn-secondary">Cancel</a>
									</div>
								</div>
							</div>

						</form>
						</div>
					</div>					
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<?php $this->load->view('_partials/footer.php') ?>

		<!-- Control Sidebar -->
		<?php $this->load->view('_partials/sidebar_control.php') ?>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<?php $this->load->view('_partials/js.php') ?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/ckeditor/ckeditor.js'); ?>"></script>
	<script type="text/javascript">
		CKEDITOR.editorConfig = function( config ) {
			config.language = 'es';
			config.uiColor = '#F7B42C';
		};

		$(document).ready(function(){
			CKEDITOR.config.height = 600;
			CKEDITOR.replace( 'qualifications' );
		});
	</script>
</body>

</html>