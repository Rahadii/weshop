<?php 

     $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

     // $kategori = "";
     $nama_barang = "";
     $kategori_id = "";
     $spesifikasi = "";
     $stok = "";
     $harga  = "";
     $gambar = "";
     $status   = "";
     $button   = "Add";

    if($barang_id){
        $query = mysqli_query($db, "SELECT * FROM barang WHERE barang_id='$barang_id'");
        $row = mysqli_fetch_assoc($query);

        $nama_barang = $row['nama_barang'];
        $kategori_id = $row['kategori_id'];
        $spesifikasi = $row['spesifikasi'];
        $stok = $row['stok'];
        $harga = $row['harga'];
        $gambar = $row['gambar'];
        $status   = $row['status'];
        $button   = "Update";

        $gambar = "<img class='file_image' src='".BASE_URL."images/barang/$gambar' />";
    }

?>

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">

     <div class="element-form">
		<label>Kategori</label>
		    <span>
               <select name="kategori_id">
                    <?php 
                         // hanya menampilkan yang statusnya 'on'
                         $query = mysqli_query($db, "SELECT kategori_id, kategori FROM kategori WHERE status = 'on' ORDER BY kategori ASC");
                         while ($row = mysqli_fetch_assoc($query)) {
                             if ($kategori_id == $row['kategori_id']) {
                                echo "<option value='$row[kategori_id]' seleceted='true'>$row[kategori]</option>";
                             }else {
                                echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                             }
                        }
                    ?>
               </select>
            </span>
    </div>

     <div class="element-form">
		<label>Nama Barang</label>
		    <span>
               <input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" placeholder="Nama barang" />
            </span>
    </div>

    <div class="element-form">
		<label>Spesifikasi</label>
		    <span>
               <textarea name="spesifikasi" cols="30" rows="4"><?php echo $spesifikasi; ?></textarea>
            </span>
    </div>
     
    <div class="element-form">
		<label>Stok</label>
		    <span>
               <input type="number" name="stok" value="<?php echo $stok; ?>"/>
            </span>
    </div>

    <div class="element-form">
		<label>Harga</label>
		    <span>
               <input type="text" name="harga" value="<?php echo $harga; ?>"/>
            </span>
    </div>

    <div class="element-form">
		<label>Gambar Produk</label>
		    <span>
               <input type="file" name="file"/> <?php echo $gambar; ?>
            </span>
    </div>
    
    <div class="element-form">
        <label>Status</label>
            <input type="radio" name="status" value="on" <?php if($status == "on") { echo "checked='true'"; } ?>>On
            <input type="radio" name="status" value="off" <?php if($status == "off") { echo "checked='true'"; } ?>>Off
    </div>
        
    <div class="element-form">	 
        <span>
            <input type="submit" name="button" value="<?php echo $button; ?>"/>
        </span>
	</div>
</form>
