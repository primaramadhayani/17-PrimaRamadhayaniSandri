<?php $this->load->view('templates/admin/header');?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Waktu Temu</h1>
		</div><?=$this->session->flashdata('waktutemu')?>	
	</div>
	<div class="row">
		<table id="example" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID Waktutemu</th>
					<th>Dokter</th>
					<th>Member</th>
					<th>Tanggal</th>
					<th>Jam</th>
					<th style="width: 96px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($waktutemu as $key => $value) { ?>
				<tr>
					<td><?php echo $value->id_waktutemu; ?></td>
					<td><?php echo $value->nama_dokter; ?></td>
					<td><?php echo $value->nama_member; ?></td>
					<td><?php echo $value->tanggal; ?></td>
					<td><?php echo $value->jam; ?></td>
					<td>
						<a href="<?php echo site_url('waktutemu/delete/'.$value->id_waktutemu); ?>"
							class="btn btn-danger">
							<i class="fa fa-trash"></i>
						</a>
						<a href="<?php echo site_url('waktutemu/update/'.$value->id_waktutemu); ?>"
							class="btn btn-warning">
							<i class="fa fa-pencil-square"></i>
						</a>
					</td>	
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php $this->load->view('templates/admin/footer'); ?>
	<script type="text/javascript">
	$(document).ready(function () {
		$('#example').DataTable();
	});
</script>