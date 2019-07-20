<?php 
	if ($user_id) {
		header("location:".BASE_URL);
	}
?>
<div id="container-user-akses">
	
	<form action="<?php echo BASE_URL."proses-register.php" ?>" method="POST">
		
		<?php  
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
			$email = isset($_GET['email']) ? $_GET['email'] : false;
			$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
			$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

			// $dataform = http_build_query(query_data);
			
			include_once('function/validasi.php');

		?>

		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?php echo $nama_lengkap; ?>" autocomplete="off" / ></span>
		</div>

		<div class="element-form">
			<label>E-Mail</label>
			<span><input type="text" name="email" placeholder="E-mail" value="<?php echo $email; ?>" autocomplete="off" /></span>
		</div>

		<div class="element-form">
			<label>Nomer Telepon / Handphone</label>
			<span><input type="text" name="phone" value="<?php echo $phone; ?>" autocomplete="off" onkeypress="return restrictAlphabets(event)" /></span>
		</div>

		<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat"><?php echo $alamat; ?></textarea></span>
		</div>

		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" placeholder="Password" /></span>
		</div>

		<div class="element-form">
			<label>Re-type Password</label>
			<span><input type="Password" name="re_password" placeholder="Masukkan ulang password" /></span>
		</div>

		<div class="element-form">
			<span><input type="submit" value="Register" /></span>
		</div>

	</form>

	<script src="js/handlerkey.js"></script>
</div>
