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
							<h1 class="m-0 text-dark">Careers</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
                            <a href="<?php echo BASE_URL . 'admin/careers/add'; ?>" class="btn btn-primary float-sm-right">Add New</a>
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
                    
                    <?php echo ($this->session->flashdata('success') ? '<p style=" color:green !important;">'.$this->session->flashdata('success').'</p>' : '');?>
                    <table id="careers" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th data-priority="1">Position</th>
                                <th >Department</th>
                                <th>Employment Type</th>
                                <th>Status</th>
                                <th width="100">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(!empty($data)){
                                    foreach($data as $item){
                                        echo '<tr>';
                                            echo '<td>'.$item->position.'</td>';
                                            echo '<td>'.$item->department.'</td>';
                                            echo '<td>'.$item->emp_type.'</td>';
                                            echo '<td>'.($item->status == 1 ? 'Active' : 'Inactive').'</td>';
                                            echo '<td style="text-align: center;"><a href="'.BASE_URL .'admin/careers/edit/'.$item->id.'">Edit</a> | <a href="'.BASE_URL.'admin/careers/delete/'.$item->id.'" onclick="return confirm(\'Are you sure you want to delete?\');">Delete</a></td>';
                                        echo '</tr>';
                                    }
                                }
                            ?>
                        <tbody>
                    </table>

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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#careers').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
            });
        });
    </script>
</body>

</html>