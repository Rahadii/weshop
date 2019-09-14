<?php
    // call file helper dan koneksi
    include_once('function/helper.php');
    include_once('function/koneksi.php');
    
    $email      = $_POST['email'];
    $password   = md5($_POST['password']); // hashing password

    $query = mysqli_query($db, "SELECT * FROM user WHERE email = '$email' AND password='$password' AND status='on'");

    // cek data
    if (mysqli_num_rows($query) == 0) {
        header("location: ".BASE_URL."index.php?page=login&notif=true");
    }else {
        $row = mysqli_fetch_assoc($query);
        
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['nama']    = $row['nama'];
        $_SESSION['level']   = $row['level'];

        if(isset($_SESSION["proses_pesanan"]) && $_SESSION['level'] == "customer"){
            header("location: ".BASE_URL."index.php?page=data_pemesanan");
        }else{
            header("location: ".BASE_URL."index.php?page=my-profile&module=pesanan&action=list");   
        }
    }
?>