<?php
     include_once('function/helper.php');

     session_start();

     $barang_id = $_GET['barang_id'];
     $keranjang = $_SESSION['keranjang'];

     unset($keranjang[$barang_id]); // melepaskan session 

     $_SESSION['keranjang'] = $keranjang;

     header('location: '.BASE_URL.'index.php?page=keranjang');
?>