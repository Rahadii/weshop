<?php 
    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");
    
    
    $nama_barang    = $_POST['nama_barang'];
    $kategori_id    = $_POST['kategori_id'];
    $spesifikasi    = $_POST['spesifikasi'];
    $stok           = $_POST['stok'];
    $harga          = $_POST['harga'];
    $status     = $_POST['status'];
    $button     = $_POST['button'];

    $filename = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../" . $filename);

    // checking query
    if ($button == "Add") {
        mysqli_query($db, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, stok, harga, gambar, status) VALUES ('$nama_barang','$kategori_id','$spesifikasi','$stok','$harga','$filename','$status')");
     } //else if($button == "Update"){
//         $kategori_id = $_GET['kategori_id'];

//         mysqli_query($db, "UPDATE kategori 
//                             SET kategori='$kategori', status='$status' 
//                              WHERE kategori_id='$kategori_id'");
//     }
    header("location: ".BASE_URL."index.php?page=my-profile&module=barang&action=list");
?> 