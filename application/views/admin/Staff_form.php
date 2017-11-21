<?php $this->load->view('templates/admin/header'); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $button; ?> Data Staff</h1>
		</div>
<form action="<?php echo $aksi; ?>" method="POST">
	<div class="form-group">
		<label>NAMA :</label>
		<input type="text" name="nama_staff" class="form-control"
		placeholder="Inputkan" required value="<?php echo $nama_staff;?>">
	</div>	
	<div class="form-group">
		<label>ALAMAT :</label>
		<input type="text" name="alamat_staff" class="form-control"
		placeholder="Inputkan" required value="<?php echo $alamat_staff;?>">
	</div>
	<div class="form-group">
		<label>JABATAN :</label>
		<input type="text" name="jabatan" class="form-control"
		placeholder="Inputkan" required value="<?php echo $jabatan;?>">
	</div>	
<input type="hidden" name="id_staff" value="<?php echo $id_staff; ?>">
<button class="btn btn-primary" type="submit"><?php echo $button;?></button>
</form></div>
<?php $this->load->view('templates/admin/footer'); ?>