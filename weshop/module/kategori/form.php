<form action="<?php echo BASE_URL."module/kategori/action.php"; ?>" method="POST">

<div class="element-form">
	<label>Kategori</label>
	<span><input type="text" name="kategori" placeholder="Nama Kategori" autocomplete="off" /></span>
</div>
<div class="element-form">
	<label>Status</label>
     <span>
          <input type="radio" name="status" value="on" />On
          <input type="radio" name="status" value="off" />Off
     </span>
</div>
<div class="element-form">
	<span><input type="submit" value="Add" /></span>
</div>

</form>