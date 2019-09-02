<div id="frame-tambah">
    <!-- <p class="header-left">Kategori</p> -->
    <a href="<?php echo BASE_URL."index.php?page=my-profile&module=kategori&action=form"; ?>" class="tombol-action"><i class="fa fa-plus"></i> Tambah Kategori</a>
</div>

<?php 
    $queryKategory = mysqli_query($db, "SELECT * FROM kategori");

    if(mysqli_num_rows($queryKategory) == 0){
        echo "<h3>Saat ini belum ada Nama Kategori di dalam table kategori</h3>";
    } else {
        
        echo "<table class='table-list'>";
        
        echo "<tr class='baris-title'>
                <th class='numberColumn'>No</th>
                <th class='left'>Kategori</th>
                <th class='center'>Status</th>
                <th class='center'>Action</th>
              </tr>";
        
        $no = 1; // untuk penomoran
        while ($row = mysqli_fetch_assoc($queryKategory)) {
            echo "<tr>
                    <td class='numberColumn'>$no</td>
                    <td class='left'>$row[kategori]</td>
                    <td class='center'>$row[status]</td>
                    <td class='center'><a href='".BASE_URL."index.php?page=my-profile&module=kategori&action=form&kategori_id=$row[kategori_id]' class='tombol-action'><i class='fa fa-edit'></i> Edit</a>
                    </td>
                  </tr>";
        $no++;
        }
            echo "</table>"; 
        }
?>
