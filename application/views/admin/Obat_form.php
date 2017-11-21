<?php $this->load->view('templates/admin/header'); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $button; ?> Data Obat</h1>
		</div>
<form action="<?php echo $aksi; ?>" method="POST">
	<div class="form-group">
		<label>NAMA :</label>
		<input type="text" name="nama_obat" class="form-control"
		placeholder="Inputkan" required value="<?php echo $nama_obat;?>">
	</div>	
	<div class="form-group">
		<label>JENIS :</label>
		<input type="text" name="jenis_obat" class="form-control"
		placeholder="Inputkan" required value="<?php echo $jenis_obat;?>">
	</div>	
	<div class="form-group">
		<label>JUMLAH :</label>
		<input type="text" name="jumlah" class="form-control"
		placeholder="Inputkan" required value="<?php echo $jumlah;?>">
	</div>
	<div class="form-group">
		<label>HARGA :</label>
		<input type="text" name="harga" class="form-control"
		placeholder="Inputkan" required value="<?php echo $harga;?>">
	</div>	
<input type="hidden" name="id_obat" value="<?php echo $id_obat; ?>">
<button class="btn btn-primary" type="submit"><?php echo $button;?></button>
</form> </div>
<?php $this->load->view('templates/admin/footer'); ?>