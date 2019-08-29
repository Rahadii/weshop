<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my-profile&module=banner&action=form"; ?>">+ Tambah Banner</a>
</div>

<?php
    $no=1;
        
    $queryBanner = mysqli_query($db, "SELECT * FROM banner ORDER BY banner_id DESC");
        
    if(mysqli_num_rows($queryBanner) == 0)
    {
        echo "<h3>Saat ini belum ada banner di dalam database</h3>";
    }
    else
    {
        echo "<table class='table-list'>";
            
            echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Banner</th>
                    <th class='kiri'>Link</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'>Action</th>
                 </tr>";
    
            while($rowBanner=mysqli_fetch_array($queryBanner))
            {
                echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowBanner[banner]</td>
                        <td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a></td>
                        <td class='tengah'>$rowBanner[status]</td>
                        <td class='tengah'><a class='tombol-action' href='".BASE_URL."index.php?page=my-profile&module=banner&action=form&banner_id=$rowBanner[banner_id]"."'>Edit</a></td>
                     </tr>";
                
                $no++;
            }
            
        echo "</table>";
    }
?>