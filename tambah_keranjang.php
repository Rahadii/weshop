<?php 

     include_once('function/koneksi.php');
     include_once('function/helper.php');
     
     session_start();

     // Get id barang
     $barang_id = $_GET['barang_id'];

     $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

     // query
     $query = mysqli_query($db, "SELECT nama_barang, gambar, harga FROM barang WHERE barang_id='$barang_id' ");

     $row = mysqli_fetch_assoc($query);

     $keranjang[$barang_id] = array(
          "nama_barang" => $row['nama_barang'],
          "gambar" => $row['gambar'],
          "harga" => $row['harga'],
          "quantity" => 1
     );

     $_SESSION['keranjang'] = $keranjang;

     header('location: '.BASE_URL);

?>