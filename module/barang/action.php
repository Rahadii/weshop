<?php 
    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");

    $nama_barang = $_POST['nama_barang'];
    $kategori_id   = $_POST['kategori_id'];
    $spek = $_POST['spesifikasi'];
    $status     = $_POST['status'];
    $button     = $_POST['button'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $updateGambar = "";
    
    $targetPath = BASE_URL."images/barang/";
    if(!empty($_FILES['file']['name'])){
        $targetFile = $_FILES['file']['name'];
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath);
        
        $updateGambar = ", gambar='$targetFile'";
    }

    // checking query
    if ($button == "Add") {
        mysqli_query($db, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stok, status) VALUES ('$nama_barang', '$kategori_id', '$spek', '$namaFile', '$harga', '$stok', '$status')");
    } 
    else if($button == "Update"){
        $barang_id = $_GET['barang_id'];

        mysqli_query($db, "UPDATE barang 
                            SET kategori_id = '$kategori_id', 
                                nama_barang = '$nama_barang',
                                spesifikasi = '$spek',
                                harga = '$harga',
                                stok = '$stok',
                                status='$status' 
                                $updateGambar WHERE barang_id = ' $barang_id '");
    }

    header("location: ".BASE_URL."index.php?page=my-profile&module=barang&action=list");
?>