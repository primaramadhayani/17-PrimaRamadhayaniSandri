<?php $this->load->view('templates/admin/header'); ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo $button; ?> Data Waktutemu</h1>
		</div>
<form action="<?php echo $aksi; ?>" method="POST">
	<div class="form-group">
		<label>Tanggal :</label>
		<input type="date" name="tanggal" class="form-control"
		placeholder="Inputkan" required value="<?php echo $tanggal;?>">
	</div>	
	<div class="form-group">
		<label>Jam :</label>
		<input type="text" name="jam" class="form-control"
		placeholder="Inputkan" required value="<?php echo $jam;?>">
	</div>
	
<input type="hidden" name="id_waktutemu" value="<?php echo $id_waktutemu; ?>">
<button class="btn btn-primary" type="submit"><?php echo $button;?></button>
</form></div>
<?php $this->load->view('templates/admin/footer'); ?>