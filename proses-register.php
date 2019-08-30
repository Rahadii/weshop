<?php 
	include_once('function/helper.php');
	include_once('function/koneksi.php');

	$level 		= "customer";
	$status 	= "on";
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email']; 
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];

	unset($_POST['password']);
	unset($_POST['re_password']);
	$dataform = http_build_query($_POST);

	$query = mysqli_query($db, "SELECT * FROM user WHERE email = '$email' ");

	
	if (empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password)) {
		header("location: ".BASE_URL."index.php?page=register&notif=require&$dataform");
	} else if (!preg_match("/^[a-zA-Z ]*$/", $nama_lengkap)) {
		header("location: ".BASE_URL."index.php?page=register&notif=validasiNama&$dataform");
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("location: ".BASE_URL."index.php?page=register&notif=validasiEmail&$dataform");
	} else if (!preg_match("/^[0-9]*$/", $phone)) {
		header("location: ".BASE_URL."index.php?page=register&notif=validasiPhone&$dataform");
	} else if ($password != $re_password) {
		header("location: ".BASE_URL."index.php?page=register&notif=password&$dataform");
	} else if (mysqli_num_rows($query) == 1) {
		header("location: ".BASE_URL."index.php?page=register&notif=email&$dataform");
	} else {
		$password = md5($password);
		mysqli_query($db, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
					VALUES ('$level','$nama_lengkap','$email','$alamat','$phone','$password','$status')");
		header("location: ".BASE_URL."index.php?page=login");
	}
	// }
?>
