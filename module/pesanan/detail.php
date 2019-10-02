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