<div id="kiri">
     <?php 
          echo kategori($kategori_id);
     ?>
</div>

<div id="kanan">
     <?php 
          $barang_id = $_GET['barang_id'];

          $query = mysqli_query($db, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on' ");
          
          $row = mysqli_fetch_assoc($query); 

          echo "<div id='detail-barang'>
                    <h2>$row[nama_barang]</h2>
                    <div id='frame-gambar'>
                         <img src='".BASE_URL."images/barang/$row[gambar]' /> 
                    </div>
                    <div id='frame-harga'>
                         <span>".rupiah($row['harga'])."</span>
                         <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'><i class='fa fa-plus'></i> Add to Cart</a>
                    </div>
                    <div id='keterangan'>
                         <b>Keterangan : </b> $row[spesifikasi]
                    </div>
               </div>";
     ?>
</div>
