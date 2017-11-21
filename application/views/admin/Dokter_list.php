	<?php $this->load->view('templates/admin/header') ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Dokter</h1>
		</div><?=$this->session->flashdata('pesan')?>	
		<div class="col-md-12 text-right">
		<a href="<?php echo site_url('dokter/tambah'); ?>" class="btn btn-primary" 
		style="margin-top:20px; margin-bottom:20px">
		<i class="fa fa-plus-circle"></i> Insert</a>
		</div>
	<div 
	class="row">
	<table id="example" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nama Dokter</th>
				<th>Alamat</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th style="width: 96px">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dokter as $key => $value) { ?>
			<tr>
				<td><?php echo $value->id_dokter; ?></td>
				<td><?php echo $value->nama_dokter; ?></td>
				<td><?php echo $value->alamat_dokter; ?></td>
				<td><?php echo $value->tgl_lahir; ?></td>
				<td><?php echo $value->jenis_kelamin; ?></td>
				<td>
					<a href="<?php echo site_url('Dokter/delete/'.$value->id_dokter); ?>" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>

					<a href="<?php echo site_url('Dokter/update/'.$value->id_dokter); ?>" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table></div>
	<?php $this->load->view('templates/admin/footer') ?>
</div>

	

	<script type="text/javascript">
	$(document).ready(function() {
	$('#example').DataTable();

} );
</script>