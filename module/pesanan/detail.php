<?php 
    // GET pesanan_id
    $pesanan_id = $_GET['pesanan_id'];

    // Select from three tables (Pesanan, User, and Kota)
    $query  = mysqli_query($db, "SELECT pesanan.pesanan_id, pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan
    JOIN user ON user.user_id = pesanan.user_id
    JOIN kota ON kota.kota_id = pesanan.kota_id
    WHERE pesanan.pesanan_id = '$pesanan_id'");

    $row = mysqli_fetch_assoc($query);

    $nama_penerima  = $row['nama_penerima'];
    $nomor_telepon  = $row['nomor_telepon'];
    $alamat         = $row['alamat'];
    $tgl_pemesanan  = $row['tanggal_pemesanan'];
    $nama_user      = $row['nama'];
    $nama_kota      = $row['kota'];
    $tarif          = $row['tarif'];
?>

<div id="frame-faktur">
    <h3 align='center'>Detail Pesanan</h3>
    <hr />

    <table>
        <tr>
            <td>Nomor Faktur</td>
            <td>:</td>
            <td><?php echo $pesanan_id; ?></td>
        </tr>
        <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td><?php echo $nama_user; ?></td>
        </tr>
        <tr>
            <td>Nama Penerima</td>
            <td>:</td>
            <td><?php echo $nama_penerima; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td><?php echo $nomor_telepon; ?></td>
        </tr>
        <tr>
            <td>Tanggal Pemesanan</td>
            <td>:</td>
            <td><?php echo $tgl_pemesanan; ?></td>
        </tr>
    </table>
</div>
    <table class="table-list">
        <tr class="baris-title">
            <th class="left">No</th>
            <th class="left">Nama Barang</th>
            <th>Qty</th>
            <th class="right">Harga Satuan</th>
            <th class="right">Total</th>
        </tr>

        <?php 
            // query detail
            $queryDetail = mysqli_query($db, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id = barang.barang_id WHERE pesanan_detail.pesanan_id = '$pesanan_id'");
            
            $no = 1; // untuk penomoran sesuai dengan data yang ada
            $subTotal = 0;

            while($rowDetail = mysqli_fetch_assoc($queryDetail)){
                
                // pentotalan = harga * quantity
                $total = $rowDetail['harga'] * $rowDetail['quantity'];
                $subTotal += $total;
                
                echo "<tr>
                        <td class='left'>$no</td>
                        <td class='left'>$rowDetail[nama_barang]</td>
                        <td class='center'>$rowDetail[quantity]</td>
                        <td class='right'>".rupiah($rowDetail['harga'])."</td>
                        <td class='right'>".rupiah($total)."</td>
                     </tr>";
                
                $no++;
            }

            // menampilkan subTotal
            $subTotal += $tarif;
        ?>

            <tr>
                <td class="right" colspan="4"><b>Biaya Pengiriman</b></td>
                <td class="right"><?= rupiah($row['tarif']); ?></td>
            </tr>
            <tr>
                <td class="right" colspan="4"><b>Sub Total</b></td>
                <td class="right"><?= rupiah($subTotal); ?></td>
            </tr>
    </table>

    <div id="frame-keterangan-pembayaran">
        <p>
            Silahkan Lakukan pembayaran ke Bank BNI <br />
            Nomor Rekening : 0605959153 a/n Weshop <br />
            setelah melakukan pembayaran silakan lakukan Konfirmasi Pembayaran
            <a href="<?= BASE_URL."index.php?page=my-profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id" ?>">Disini</a>
        </p>
    </div>