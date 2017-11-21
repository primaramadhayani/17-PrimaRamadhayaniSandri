	<?php $this->load->view('templates/admin/header') ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Staff</h1>
		</div><?=$this->session->flashdata('pesan')?>	
		<div class="col-md-12 text-right">
		<a href="<?php echo site_url('staff/tambah'); ?>" class="btn btn-primary" 
		style="margin-top:20px; margin-bottom:20px">
		<i class="fa fa-plus-circle"></i> Insert</a>
		</div>
<div
	class="row">
	<table id="example" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAMA </th>
				<th>ALAMAT </th>
				<th>JABATAN </th>
				<th style="width: 96px">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($staff as $key => $value) { ?>
			<tr>
				<td><?php echo $value->id_staff; ?></td>
				<td><?php echo $value->nama_staff; ?></td>
				<td><?php echo $value->alamat_staff; ?></td>
				<td><?php echo $value->jabatan; ?></td>
				<td>
					<a href="<?php echo site_url('staff/delete/'.$value->id_staff); ?>" class="btn btn-danger">
						<i class="fa fa-trash"></i>
					</a>

					<a href="<?php echo site_url('staff/update/'.$value->id_staff); ?>" class="btn btn-warning">
						<i class="fa fa-pencil"></i>
					</a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<?php $this->load->view('templates/admin/footer') ?>
</div>

	

	<script type="text/javascript">
	$(document).ready(function() {
	$('#example').DataTable();

} );
</script>