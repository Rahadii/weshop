<div id="frame-tambah">
    <a href="<?php echo BASE_URL."index.php?page=my-profile&module=barang&action=form"; ?>" class="tombol-action"><i class="fa fa-plus"></i> Tambah Barang</a>
</div>

<?php 
    $query = mysqli_query($db, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id = kategori.kategori_id ORDER BY nama_barang ASC");

    if(mysqli_num_rows($query) == 0){
        echo "<h3>Saat ini belum ada barang yang tersedia. </h3>";
    } else {
        
        echo "<table class='table-list'>";
        
        echo "<tr class='baris-title'>
                <th class='numberColumn'>No</th>
                <th class='left'>Nama Barang</th>
                <th class='left'>Kategori</th>
                <th class='left'>Harga</th>
                <th class='center'>Status</th>
                <th class='center'>Action</th>
              </tr>";
        
        $no = 1; // untuk penomoran
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td class='numberColumn'>$no</td>
                    <td class='left'>$row[nama_barang]</td>
                    <td class='left'>$row[kategori]</td>
                    <td class='left'>". rupiah($row['harga'])."</td>
                    <td class='center'>$row[status]</td>
                    <td class='center'><a href='".BASE_URL."index.php?page=my-profile&module=barang&action=form&barang_id=$row[barang_id]' class='tombol-action'>Edit</a>
                    </td>
                  </tr>";
        $no++;
        }
            echo "</table>"; 
        }
?>
