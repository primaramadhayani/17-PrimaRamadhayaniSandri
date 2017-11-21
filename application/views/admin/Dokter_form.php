<?php $this->load->view('templates/admin/header'); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $button; ?> Data Dokter</h1>
		</div>
<form action="<?php echo $aksi; ?>" method="POST">
	<div class="form-group">
		<label>NAMA :</label>
		<input type="text" name="nama_dokter" class="form-control"
		placeholder="Inputkan" required value="<?php echo $nama_dokter;?>">
	</div>	
	<div class="form-group">
		<label>ALAMAT :</label>
		<input type="text" name="alamat_dokter" class="form-control"
		placeholder="Inputkan" required value="<?php echo $alamat_dokter;?>"></div>
	<div class="form-group">
	<div class="form-group">
		<label>TNGGAL LAHIR :</label>
		<input type="text" name="tgl_lahir" class="form-control"
		placeholder="Inputkan" required value="<?php echo $tgl_lahir;?>"></div>
	<div class="form-group">
		<label>JENIS KELAMIN :</label>
		<input type="text" name="jenis_kelamin" class="form-control"
		placeholder="Inputkan" required value="<?php echo $jenis_kelamin;?>">
</div>	
<input type="hidden" name="id_dokter" value="<?php echo $id_dokter; ?>">
<button class="btn btn-primary" type="submit"><?php echo $button;?></button>
</form></div>
<?php $this->load->view('templates/admin/footer'); ?>