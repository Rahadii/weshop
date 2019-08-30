<?php 
	// absolute path
	define('BASE_URL', 'http://localhost/weshop/');

	function rupiah($nilai = 0){
		$string = "Rp " . number_format($nilai);
		return $string;
	}
?>
