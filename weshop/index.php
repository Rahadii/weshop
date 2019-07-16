<?php
	include_once("function/helper.php");
	$page = isset($_GET['page']) ? $_GET['page'] : false;
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
					<a href="<?php echo BASE_URL."index.php?page=login"; ?>">Login</a>
					<a href="<?php echo BASE_URL."index.php?page=register"; ?>">Register</a>
				</div>
				
				<a href="<?php echo BASE_URL."index.php?page=keranjang"; ?>" id="button-keranjang">
					<img src="<?php echo BASE_URL."images/cart.png"; ?>">
				</a>
			</div>
		</div>

		<div id="content">
			<?php
			// for checking file  
				$filename = "$page.php";
				// checking
				if(file_exists($filename)){
					include_once($filename); // include if file exist
				}else{
					echo "File Not Found | 404"; // Not Found Page
				}
			?>
		</div>

		<div id="footer">
			<p>Copyright Weshop 2019</p>
		</div>
	</div>
</body>
</html>
