<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo BASE_URL . 'admin/dashboard'; ?>" class="brand-link">
		<img src="<?php echo DOF_IMG_URL . 'logo.png'; ?>" alt="<?= $this->config->item('site_name') ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><?= get_env('APP_TITLE') ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?php echo BASE_URL . 'admin/careers'; ?>" class="nav-link">
						<i class="nav-icon fas fa-users-cog"></i>
						<p>
							Careers
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo BASE_URL . 'admin/dashboard'; ?>" class="nav-link">
						<i class="nav-icon fas fa-cogs"></i>
						<p>
							Email Settings
						</p>
					</a>
				</li>
				
				<li class="nav-item">
					<a href="<?php echo BASE_URL . 'logout'; ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>