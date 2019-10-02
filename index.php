<?php
	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	$user_id 	= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama 	= isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level 	= isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();

	$totalBarang = count($keranjang);

	// echo "<pre>";
	// print_r($keranjang);
	// echo "</pre>";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Weshop - Jual Barang-barang Elektronik</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/style.css"; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/banner.css"; ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- jQuery -->
	<script src="https://kit.fontawesome.com/7700bc3a8a.js"></script>
	<script src="<?php echo BASE_URL."js/jquery-3.4.1.min.js"; ?>"></script>
	<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
	<!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  	<script>
    		$(function() {
      		$('#slides').slidesjs({
				height: 350,
				play: {
					auto: true,
					interval: 5000
				},
        			navigation: true
      		});
		});
  	</script>
  	<!-- End SlidesJS Required -->
</head>
<body>
	<div id="container">
		<div id="header">
			<a href="<?= BASE_URL."index.php"; ?>">
				<img src="<?= BASE_URL."images/logo.png"; ?>">
			</a>

			<div id="menu">
				<div id="user">
					<?php
						if($user_id){
							echo "Hi, <b>$nama</b>, 
							<a href='".BASE_URL."index.php?page=my-profile&module=pesanan&action=list'>My Profile</a>
							<a href='".BASE_URL."logout.php'>Logout</a>";
						}else{
							echo "<a href='".BASE_URL."index.php?page=login'>Login</a>
							<a href='".BASE_URL."index.php?page=register'>Register</a>";
						}
					?>

				</div>
				
				<a href="<?= BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
					<img src="<?= BASE_URL."images/cart.png"; ?>">
					<?php 
						if($totalBarang != 0){
							echo "<span class='total-barang'>$totalBarang</span>";
						}
					?>
				</a>

			</div>
		</div>

		<div id="content">
			<?php
				$filename = "$page.php";
				// checking
				if(file_exists($filename)){
					include_once($filename);
				}else{
					include_once('main.php');
				}
			?>
		</div>

		<div id="footer">
			<p><i class="fas fa-copyright fa-lg"></i> Copyright Weshop 2019</p>
		</div>
	</div>
</body>
</html>
