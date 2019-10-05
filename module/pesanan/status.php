<?php 
    // get pesanan_id
    $pesanan_id = $_GET['pesanan_id'];

    // query untuk mengambil status dari table pesanan
    $query = mysqli_query($db, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
    // get data
    $row = mysqli_fetch_assoc($query);
    // deklarasi data status
    $status = $row['status'];
?>

<form action="<?= BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
    <div class="element-form">
        <label>Pesanan (Faktur Id)</label>
        <span><input type="text" value="<?= $pesanan_id; ?>" name="pesanan_id" readonly/></span>
    </div>
    <div class="element-form">
        <label>Status</label>
        <span>
        <select name="status">
            <?php
                // get array status
                foreach ($arrayStatusPesanan as $key => $value) {
                    // menyesuaikan status pesanan
                    if($status == $key){
                        echo "<option value='$key' selected='true'>$value</option>";
                    }
                    echo "<option value='$key'>$value</option>";
                }
            ?>
        </select>
        </span> 
    </div>
    <div class="element-form">
        <span><input class='tombol-action' type="submit" value="Edit Status" name="button" /></span>
    </div>
</form>