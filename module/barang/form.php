<?php 

    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $nama_barang = "";
    $kategori_id = "";
    $gambar = "";
    $spek = "";
    $stok = "";
    $harga = "";
    $status   = "";
    $button   = "Add";
    $keteranganGambar = "(Klik Gambar jika ingin mengganti gambar disamping)";


    if($barang_id){
        $queryBarang = mysqli_query($db, "SELECT * FROM barang WHERE barang_id = '$barang_id'");
        $row = mysqli_fetch_assoc($queryBarang);

        $nama_barang = $row['nama_barang'];
        $kategori_id = $row['kategori_id'];
        $spek = $row['spesifikasi'];
        $gambar = $row['gambar'];
        $harga = $row['harga'];
        $stok = $row['stok'];
        $status   = $row['status'];
        $button   = "Update";

        $keteranganGambar = "(Klik Gambar jika ingin mengganti gambar disamping)";
        $gambar = "<img src='".BASE_URL."images/barang/$gambar' style='width : 200px; vertical-align: middle;'/>";
    }

?>

<script src="<?php echo BASE_URL."js/ckeditor5/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data">

    <div class="element-form">
		<label>Kategori</label>
		    <span>
                <select name="kategori_id">
                     <?php
                         $query = mysqli_query($db, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                         while ($row = mysqli_fetch_assoc($query)) {
                             if($kategori_id == $row['kategori_id']){
                                echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
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
                <input type="text" name="nama_barang" value="<?php echo $nama_barang;?>" placeholder="Nama Barang" required />
            </span>
    </div>
    
    <div class="element-form">
		<label>Spesifikasi</label>
		    <span>
                <textarea name="spesifikasi" id="editor"><?php echo $spek; ?></textarea>
            </span>
            <script>
                ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
        } );
            </script>
    </div>

    <div class="element-form">
		<label>Stok</label>
		    <span>
                <input type="number" name="stok" value="<?php echo $stok;?>" required />
            </span>
    </div>

    <div class="element-form">
		<label>Harga</label>
		    <span>
                <input type="text" name="harga" value="<?php echo $harga;?>" required />
            </span>
    </div>

    <div class="element-form">
		<label>Gambar Produk <?php echo $keteranganGambar; ?></label>
		    <span>
                <input type="file" name="file" /> <?php echo $gambar; ?>
            </span>
    </div>
    
    <div class="element-form">
        <label>Status</label>
            <input type="radio" name="status" value="on" <?php if($status == "on") { echo "checked='true'"; } ?>>On
            <input type="radio" name="status" value="off" <?php if($status == "off") { echo "checked='true'"; } ?>>Off
    </div>
        
    <div class="element-form">	 
        <span>
            <input type="submit" name="button" value="<?php echo $button ?>"/>
        </span>
	</div>
</form>