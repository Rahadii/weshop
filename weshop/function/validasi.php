<?php
    // Validasi disetiap form inputan

    if ($notif == "require") {
        echo "<div class='notif'>Maaf, Kamu harus melengkapi Form dibawah !</div>";
    } else if($notif == "password") {
        echo "<div class='notif'>Maaf, Password yang kamu masukkan tidak sama !</div>";
    } else if($notif == "email") {
        echo "<div class='notif'>Maaf, E-mail yang kamu masukkan sudah terdaftar !</div>";
    } else if ($notif == "validasiNama") {
        echo "<div class='notif'>Maaf, Nama hanya berlaku menggunakan huruf !</div>";
    } else if ($notif == "validasiEmail") {
        echo "<div class='notif'>Maaf, format e-mail salah !</div>";
    } else if ($notif == "validasiPhone") {
        echo "<div class='notif'>Maaf, No Telepon/Hp hanya berlaku nomer !</div>";
    }
?>