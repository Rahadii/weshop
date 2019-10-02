<?php
    include_once('function/koneksi.php');
    include_once('function/helper.php');

    session_start();

    $nama_penerima = $_POST['nama_penerima'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];

    $user_id = $_SESSION['user_id']; // mengambil id dari session
    $timeNow = date("Y-m-d H:i:s"); // set time

    // insert ke table pesanan 
    $query = mysqli_query($db, "INSERT INTO pesanan (nama_penerima, user_id, nomor_telepon, kota_id, alamat, tanggal_pemesanan, status) VALUES ('$nama_penerima','$user_id','$nomor_telepon','$kota','$alamat','$timeNow','0')");

    if($query){
        $last_pesanan_id = mysqli_insert_id($db); // mengambil id terakhir di pesanan
        
        $keranjang = $_SESSION['keranjang']; // mengambil keranjang dari session

        foreach ($keranjang as $key => $value) {
            $barang_id = $key; 
            $quantity = $value['quantity'];
            $harga = $value['harga'];

            $query = mysqli_query($db, "INSERT INTO pesanan_detail (pesanan_id, barang_id, quantity, harga) 
                                        VALUES('$last_pesanan_id','$barang_id','$quantity','$harga')");
        }

        unset($_SESSION['keranjang']); // menghapus list yang tersimpan di keranjang

        header('location: '.BASE_URL.'index.php?page=my-profile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id');
    }
?>