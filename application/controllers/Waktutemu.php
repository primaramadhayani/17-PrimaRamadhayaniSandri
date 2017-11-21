<?php 
/**
* 
*/
class Waktutemu extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Waktutemu_model');
		$this->load->model('Dokter_model');
		$this->load->model('Member_model');
	}

	function index()
	{
		$data['waktutemu'] = $this->Waktutemu_model->ambil_data();
		$this->load->view('admin/Waktutemu_list',$data);
	}


	function tambah()
	{
		$data['dokter']= $this->Dokter_model->ambil_data();
		$data2 = array(
			'aksi' 				=> site_url('dokter/tambah_aksi'),
			'id_dokter' 		=> set_value('id_dokter'),
			'username' 			=> set_value('username'),
			'tanggal'		 	=> set_value('tanggal'),
			'jam'	 			=> set_value('jam'),			
			'button' 			=> 'Insert'
			);
		
		$this->load->view('Form_waktutemu',$data);
	}
	function tambah_aksi()
	{

		$data2 = array(
			'id_dokter' 	=> $this->input->post('id_dokter'),
			'username' 		=> $this->input->post('username'),
			'tanggal' 		=> $this->input->post('tanggal'),
			'jam'			=> $this->input->post('jam'),
			
			);

		$this->waktutemu_model->tambah_data($data2);
		redirect(site_url('Member'));
	}

	function delete($id_waktutemu)
	{
		$this->Waktutemu_model->hapus_data($id_waktutemu);
        redirect(site_url('Waktutemu'));
	}

	function update($id)
	{
		$waktutemu = $this->Waktutemu_model->ambil_data_id($id);
		$data = array(
			'aksi' 				=> site_url('waktutemu/update_aksi'),
			'tanggal' 			=> set_value('tanggal',$waktutemu->tanggal),
			'jam' 				=> set_value('jam',$waktutemu->jam),
			'id_waktutemu' 		=> set_value('id_waktutemu',$waktutemu->id_waktutemu),
			'button' 			=> 'Update'
			);
		$this->load->view('admin/Waktutemu_form',$data);		
	}

	function update_aksi()
	{
		$data = array(
			'tanggal' 		=> $this->input->post('tanggal'),
			'jam' 			=> $this->input->post('jam'),
			);	
		$id_waktutemu = $this->input->post('id_waktutemu');
		$this->Waktutemu_model->edit_data($id_waktutemu,$data);
		$this->session->set_flashdata("waktutemu", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah!!</div></div>");
        redirect('waktutemu');
	}

	function daftar_aksi()
	{
		$data = array(
			'id_dokter' 			=> $this->input->post('id_dokter'),
			'id_member'		 		=> $this->input->post('id_member'),
			'tanggal' 				=> $this->input->post('tanggal'),
			'jam' 					=> $this->input->post('jam'),
		);
		$this->Waktutemu_model->tambah_data($data);
		redirect(site_url('Welcome/Home_member'));
	}

	function data_waktutemu()
	{
		//print_r($this->member_model->ambil_data());
		$data['waktutemu'] = $this->Waktutemu_model->ambil_data();
		//print_r($data);
		$this->load->view('admin/Waktutemu_list',$data);
	}
}

 ?>