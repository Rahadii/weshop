<div id="kiri">
     <div id="menu-kategori">
          <ul>
               <?php 
                    $query = mysqli_query($db, "SELECT * FROM kategori WHERE status = 'on' ORDER BY kategori ASC");

                    while($row = mysqli_fetch_assoc($query)){
                         if($kategori_id == $row['kategori_id']){
                              echo "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
                         } else {
                              echo "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
                         }
                    }    
               ?>
          </ul>
     </div>
</div>

<div id="kanan">
     <div id="slides">
          <?php 
               $queryBanner = mysqli_query($db, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");

               while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {
                    echo "<a href='".BASE_URL."$rowBanner[link]'><img src='".BASE_URL."images/slide/$rowBanner[gambar]' /></a>";
               }
          ?>
     </div>

     <div id="frame-barang">
          <ul>
               <?php
                    if($kategori_id){
                         $query = mysqli_query($db, "SELECT * FROM barang WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC LIMIT 9");
                    } else {
                         $query = mysqli_query($db, "SELECT * FROM barang WHERE status='on' ORDER BY rand() DESC LIMIT 9");
                    }

                    $no = 1;
                    while($row = mysqli_fetch_assoc($query)){
                         $style = false;
                         if ($no == 3) {
                              $style = "style='margin-right:0px;'";
                              $no = 0;
                         }
                         
                         echo "<li $style>
                                   <p class='price'>".rupiah($row['harga'])."</p>
                                   <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
                                        <img src='".BASE_URL."images/barang/$row[gambar]' />
                                   </a>
                                   <div class='keterangan-gambar'>
                                        <p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
                                        <span>Stok : $row[stok]</span>
                                   </div>
                                   <div class='button-add-cart'>
                                        <a href='".BASE_URL."tambah-keranjang.php?barang_id=$row[barang_id]'>+ Add to Cart</a>
                                   </div>";

                              $no++;
                    }
                    
               ?>
          </ul>
     </div>            
</div>