<?php 
    if($user_id) {
        $module = isset($_GET['module']) ? $_GET['module'] : false;
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        $mode   = isset($_GET['mode']) ? $_GET['mode'] : false;
    } else {
        header("location: ".BASE_URL."index.php?page=login");
    }
?>

<div id="bg-page-profile">

    <div id="menu-profile">
        <ul>
            <?php 
                if ($level == "superadmin") {
            ?>
            <li>
                <a <?php if($module == "kategori"){ echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=kategori&action=list"; ?>"><i class="fas fa-clipboard-list fa-lg"></i> Kategori</a>
            </li>
            <li>
                <a <?php if($module == "barang"){ echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=barang&action=list"; ?>"><i class="fas fa-box-open fa-lg"></i> Barang</a>
            </li>
            <li>
                <a <?php if($module == "kota"){ echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=kota&action=list"; ?>"><i class="fas fa-city fa-lg"></i> Kota</a>
            </li>
            <li>
                <a <?php if($module == "user"){ echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=user&action=list"; ?>"><i class="fas fa-users fa-lg"></i> Users</a>
            </li>
            <li>
                <a <?php if($module == "banner"){ echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=banner&action=list"; ?>"><i class="fas fa-bold fa-lg"></i> Banner</a>
            </li>
                <?php } ?>
            <li>
                <a <?php if($module == "pesanan"){ echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my-profile&module=pesanan&action=list"; ?>">Pesanan</a>
            </li>
        </ul>
    </div>

    <div id="profile-content">
        <?php 
            $file = "module/$module/$action.php";
            if(file_exists($file)) {
                include_once($file);
            } else {
                echo "<h3>Maaf, Halaman tidak ditemukan</h3>";
            }
        ?>
    </div>
</div>