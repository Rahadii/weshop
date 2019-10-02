<?php

    // validasi level
    if($level == "superadmin"){
        $queryPesanan = mysqli_query($db, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");    
    } else {
        $queryPesanan = mysqli_query($db, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id = '$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
    }
    

    // pengecekan query
    if(mysqli_num_rows($queryPesanan) == 0){
        // apabila tidak ada satupun sebuah data yang terinput
        echo "<h3>Saat ini belum ada data pesanan</h3>";
    }else {
        echo "<table class='table-list'>
                <tr class='baris-title'>
                    <th class='left'>Nomor Pesanan</th>
                    <th class='left'>Status</th>
                    <th class='left'>Nama</th>
                    <th class='left'>Action</th>
                </tr>";
        
        // tambahan button khusus untuk superadmin user
        $buttonUpdateStatus = "";
        
        while($row = mysqli_fetch_assoc($queryPesanan)){
            
            // validasi untuk super admin atau bukan
            if($level == "superadmin"){
                $buttonUpdateStatus = "<a class='tombol-action' href='".BASE_URL."index.php?age=my-profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
            }

            // menampung value status
            $status = $row['status'];
            
            echo "<tr>
                    <td class='left'>$row[pesanan_id]</td>
                    <td class='left'>$arrayStatusPesanan[$status]</td>
                    <td class='left'>$row[nama]</td>
                    <td class='left'>
                        <a class='tombol-action' href='".BASE_URL."index.php?page=my-profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
                        $buttonUpdateStatus
                    </td>
                  </tr>";
        }

        echo "</table>"; 
    }
?>