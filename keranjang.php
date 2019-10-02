<?php 
     if($totalBarang == 0){
          echo "<h3>Saat ini belum ada item dalam keranjang, Silakan <span class='belanja'><a href='".BASE_URL."index.php'>Belanja</a></span> terlebih dahulu</h3>";
     }else {

          $no = 1;

          echo "<table class='table-list'>
                    <tr class='baris-title'>
                         <th class='center'>No</th>
                         <th class='left'>Image</th>
                         <th class='left'>Nama Barang</th>
                         <th class='center'>Qty</th>
                         <th class='right'>Harga</th>
                         <th class='right'>Total</th>
                    </tr>";
          
          $subTotal = 0;
          foreach ($keranjang as $key => $value) {
               $barang_id = $key;

               $nama_barang = $value['nama_barang'];
               $quantity = $value['quantity'];
               $gambar = $value['gambar'];
               $harga = $value['harga'];
               
               $total = $quantity * $harga;
               $subTotal += $total;

               echo "<tr>
                         <td class='center'>$no</td>
                         <td class='left'><img src='".BASE_URL."images/barang/$gambar' height='100px' /></td>
                         <td class='left'>$nama_barang</td>
                         <td class='center'><input type='number' name='$barang_id' value='$quantity' class='update-quantity' /></td>
                         <td class='right'>".rupiah($harga)."</td>
                         <td class='right hapus-item'>".rupiah($total)."<a href='".BASE_URL."hapus_item.php?barang_id=$barang_id'><i class='fa fa-trash fa-2x'></i></a></td>
                    </tr>";
               
               $no++;
          }

          echo "<tr>
                    <td class='right' colspan='5'><b>Sub Total</b></td>
                    <td class='right'><b>".rupiah($subTotal)."</b></td>
               </tr>";
          
          echo "</table>";

          echo "<div id='frame-button-keranjang'>
                    <a id='lanjut-belanja' href='".BASE_URL."index.php'>< Lanjut Belanja</a>
                    <a id='lanjut-pemesanan' href='".BASE_URL."index.php?page=data_pemesanan'>Lanjut Pemesanan ></a>
               </div>";
     }
?>

<script>
     $(".update-quantity").on("input", function(e){
          var barang_id = $(this).attr("name");
          var value = $(this).val();

          // console.log("id => " + barang_id + ", qty => " + value);

          $.ajax({
               method: "POST",
               url: "update_keranjang.php",
               data: "barang_id="+barang_id+"&value="+value
          })
          .done(function(data){
               location.reload();
          })
     })
</script>