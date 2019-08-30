<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");
     
    $banner = $_POST['banner'];
    $link = $_POST['link'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $edit_gambar = "";
	
 
    if($_FILES["file"]["name"] != "")
    {
        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/slide/" . $nama_file);
         
        $edit_gambar  = ", gambar='$nama_file'";
    }
     
    if($button == "Add")
    {
        mysqli_query($db, "INSERT INTO banner (banner, link, gambar, status) VALUES ('$banner', '$link', '$nama_file', '$status')");
    }
    elseif($button == "Update")
    {
	    $banner_id = $_GET['banner_id'];
		
        mysqli_query($db, "UPDATE banner SET banner='$banner',
                                        link='$link',
                                        $edit_gambar
                                        status='$status'
										$edit_gambar WHERE banner_id='$banner_id'");
    }
     
     
    header("location: ".BASE_URL."index.php?page=my-profile&module=banner&action=list");
?>