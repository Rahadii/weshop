<?php
    if ($user_id == false) {
        $_SESSION["proses_pesanan"] = true;

        header("location: ".BASE_URL."index.php?page=login");
        exit;
    }
?>

<!-- Form Data Pemesanan -->
<div id="frame-data-pemesanan">
    <h3 class="title">Alamat Pengiriman Barang</h3>
    <div id="frame-form-pengiriman">
        <form action="<?= BASE_URL."proses_pemesanan.php"; ?>" method="POST">
            <div class="element-form">
                <label>Nama Penerima</label>
                <span> <input type="text" name="nama_penerima" /> </span>
            </div>
            <div class="element-form">
                <label>Nomor Telepon</label>
                <span> <input type="text" name="nomor_telepon" /> </span>
            </div>
            <div class="element-form">
                <label>Alamat Pengiriman</label>
                <span> <textarea name="alamat"></textarea> </span>
            </div>
            <div class="element-form">
                <label>Kota</label>
                <span>
                    <select name="kota">
                        <?php
                            $query = mysqli_query($db, "SELECT * FROM kota");

                            while($row = mysqli_fetch_assoc($query)){
                                echo "<option value='$row[kota_id]'>$row[kota] - (".rupiah($row[tarif]).")</option>";
                            }
                        ?>
                    </select>
                </span>
            </div>
            <div class="element-form">
                <span> <input type="submit" value="Pesan"> </span>
            </div>
        </form>
    </div>
</div>
<!-- End Form Data Pemesanan -->

<!-- Detail Order -->
<div id="frame-data-order">
    <h3 class="title">Detail Order</h3>
    <div id="detail-order">
        <table class="table-list">
            <tr>
                <th class="left">Nama Barang</th>
                <th class="center">Qty</th>
                <th class="right">Total</th>
            </tr>
            <?php
            $subTotal = 0;
                foreach ($keranjang as $key => $value) {
                    $barang_id = $key;
                    // 
                    $nama_barang = $value['nama_barang'];
                    $harga = $value['harga'];
                    $quantity = $value['quantity'];
                    // 
                    $total = $quantity * $harga;
                    $subTotal += $total;
            
                echo "<tr>
                        <td class='left'>$nama_barang</td>
                        <td class='center'>$quantity</td>
                        <td class='right'>".rupiah($total)."</td>
                     </tr>";
                }

                echo "<tr>
                    <td class='right' colspan='2'><b>Sub Total</b></td>
                    <td class='right'><b>".rupiah($subTotal)."</b></td>
               </tr>";
            ?>
        </table>
    </div>
</div>
<!-- End Detail Order -->