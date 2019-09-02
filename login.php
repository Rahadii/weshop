<?php 
	if ($user_id) {
		header("location:".BASE_URL);
	}
?>

<div id="container-user-akses">
	
	<form action="<?php echo BASE_URL."proses-login.php" ?>" method="POST">
		
		<?php  
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

			// $dataform = http_build_query(query_data);

			if ($notif == true) {
				echo "<div class='notif'>Maaf, E-Mail atau Password yang kamu masukkan tidak cocok !</div>";
			} 
		?>

		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email" placeholder="Email" autocomplete="off" /></span>
		</div>

		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" placeholder="Password" /></span>
		</div>

		<div class="element-form">
			<span>
				<input type="submit" value="Login" /> 
			</span>
		</div>

	</form>

</div> 