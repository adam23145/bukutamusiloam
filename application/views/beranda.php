<?php
$status = $this->session->userdata("status");
if (isset($status) != "login") {
	redirect('login');
}
$sidebar = 1;
if (isset($_POST['sidebar'])) {
    $sidebar = $_POST['sidebar'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
	<!-- Preloader -->
	<!-- /Preloader -->
	<div class="wrapper theme-1-active pimary-color-red">
		<!-- /Top Menu Items -->
		<?php include 'topbar.php';?>
		
		<!-- Main Content -->
		<div class="page-wrapper" style="margin-left: 0px;">
			<div class="container-fluid pt-25">
				<div class="row">
					
				<?php include 'sidebar.php'; ?>
					<!-- Row -->
					<div class="col-lg-10">
						<?php
						if ($sidebar == 1) {
							include 'daftar_tamu.php';
						} else if($sidebar == 2) {
							include 'daftar_vendor.php';
						}
						?>
					</div>
					<!-- /Row -->
				</div>
			</div>
		</div>
		<!-- Footer -->
		<footer class="footer container-fluid pl-30 pr-30">
			<div class="row">
				<div class="col-sm-12">
				</div>
			</div>
		</footer>
		<!-- /Footer -->
	</div>
	<!-- /#wrapper -->
	<?php include 'add_ons.php'?>
	<?php include 'script.php'?>

</body>



</html>