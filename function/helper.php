<?php 
	// absolute path
	define('BASE_URL', 'http://localhost/weshop/');

	function rupiah($nilai = 0){
		$string = "Rp " . number_format($nilai);
		return $string;
	}

	function kategori($kategori_id = false){
		global $db;

		$string = "<div id='menu-kategori'>";
        $string .= "<ul>";
               
        $query = mysqli_query($db, "SELECT * FROM kategori 
									WHERE status = 'on' 
									ORDER BY kategori ASC");

        while($row = mysqli_fetch_assoc($query)){
        
		if($kategori_id == $row['kategori_id']){
        	$string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
        } else {
            $string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
        }
     }    
        $string .= "</ul>";
		$string .= "</div>";
		
		return $string;
	}
?>
