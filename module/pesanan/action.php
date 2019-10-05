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

        // query pembayaran
        $queryPembayaran = mysqli_query($db, "INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES ('$pesanan_id','$nomor_rekening','$nama_account','$tgl_transfer')");

        // validasi untuk query pembayaran
        if($queryPembayaran){
            mysqli_query($db, "UPDATE pesanan SET status = '1' WHERE pesanan_id='$pesanan_id'");
        
        } else if($button == "Edit Status"){
            $status = $_POST['status'];

            // query untuk update status pesanan
            mysqli_query($db, "UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id'");

            // identifikasi jika status 2
            if($status == 2){
                // get data
                $query = mysqli_query($db, "SELECT * FROM pesanan_detail WHERE pesanan_id='$pesanan_id'");
                
                // mengambil sesuai banyaknya data
                while($row = mysqli_fetch_assoc($query)){
                    $barang_id = $row['barang_id'];
                    $quantity = $row['quantity'];

                    // query untuk mengurangi stok
                    mysqli_query($db, "UPDATE barang SET stok='stok-$quantity' WHERE barang_id='$barang_id'");
                }
            }
        }
        
    }
    header("location:".BASE_URL."index.php?page=my-profile&module=pesanan&action=list");
?>