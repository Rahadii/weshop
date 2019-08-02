<?php
	session_start();

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;

	$user_id 	= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama 	= isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level 	= isset($_SESSION['level']) ? $_SESSION['level'] : false;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Weshop - Jual Barang-barang Elektronik</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL."css/style.css"; ?>">
</head>
<body>
	<div id="container">
		<div id="header">
			<a href="<?php echo BASE_URL."index.php"; ?>">
				<img src="<?php echo BASE_URL."images/logo.png"; ?>">
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
				
				<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
					<img src="<?php echo BASE_URL."images/cart.png"; ?>">
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
					echo "<h3>Sorry, Page Not Found | 404</h3>";
				}
			?>
		</div>

		<div id="footer">
			<p>Copyright Weshop 2019</p>
		</div>
	</div>
</body>
</html>
