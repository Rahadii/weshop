<?php 
    include_once("../../function/koneksi.php");
    include_once("../../function/helper.php");

    session_start(); // memulai session

    // get pesanan_id
    $pesanan_id = $_GET['pesanan_id'];
    // set button
    $button = $_POST['button'];

    if($button == "Konfirmasi"){

        // set pada session
        $user_id = $_SESSION['user_id'];
        $nomor_rekening = $_POST['nomor_rekening'];
        $nama_account = $_POST['nama_account'];
        $tgl_transfer = $_POST['tanggal_transfer'];

        // query
        $queryPembayaran = mysqli_query($db, "INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES ('$pesanan_id','$nomor_rekening','$nama_account','$tgl_transfer')");

        if($queryPembayaran){
            mysqli_query($db, "UPDATE pesanan SET status = '1' WHERE pesanan_id='$pesanan_id'");
        }
        header("location:".BASE_URL."index.php?page=my-profile&module=pesanan&action=list");
    }
?>