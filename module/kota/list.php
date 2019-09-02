<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my-profile&module=kota&action=form"; ?>"><i class="fa fa-plus"></i> Tambah Kota</a>
</div>

<?php

	$queryKota = mysqli_query($db, "SELECT * FROM kota ORDER BY kota ASC");
	
	if(mysqli_num_rows($queryKota) == 0){
		echo "<h3>Saat ini belum ada nama kota yang didalam database.</h3>";
	}
	else{
		echo "<table class='table-list'>";
		
			echo "<tr class='baris-title'>
					<th class='numberColumn'>No</th>
					<th class='left'>Kota</th>
					<th class='left'>Tarif</th>
					<th class='center'>Status</th>
					<th class='center'>Action</th>
				 </tr>";
				 
			$no = 1;
			while($rowKota=mysqli_fetch_assoc($queryKota)){
				echo "<tr>
						<td class='numberColumn'>$no</td>
						<td>$rowKota[kota]</td>
						<td>".rupiah($rowKota['tarif'])."</td>
						<td class='center'>$rowKota[status]</td>
						<td class='center'>
							<a class='tombol-action' href='".BASE_URL."index.php?page=my-profile&module=kota&action=form&kota_id=$rowKota[kota_id]"."'><i class='fa fa-edit'></i> Edit</a>
						</td>
					 </tr>";
				
				$no++;
			}
		
		echo "</table>";
	}
?>