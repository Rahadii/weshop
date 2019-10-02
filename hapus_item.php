<?php
     include_once('function/helper.php');

     session_start();

     // deklarasi variabel dengan method GET
     $barang_id = $_GET['barang_id'];
     $keranjang = $_SESSION['keranjang'];

     unset($keranjang[$barang_id]); // melepaskan session serta menghapusnya

     $_SESSION['keranjang'] = $keranjang;

     header('location: '.BASE_URL.'index.php?page=keranjang');
?>