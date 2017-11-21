<?php 
/**
* 
*/
class Member extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Member_model');
	}

	function index()
	{
		//print_r($this->member_model->ambil_data());
		$data['member'] = $this->Member_model->ambil_data();
		$this->load->view('Home_member',$data);
	}

	function data_member()
	{
		//print_r($this->member_model->ambil_data());
		$data['member'] = $this->Member_model->ambil_data();
		$this->load->view('admin/Member_list',$data);
	}

	function daftar()
	{
		$data = array(
			'aksi' 			=> site_url('daftar_aksi'),
			'username' 		=> set_value('username'),
			'password' 		=> set_value('password'),			
			'nama_member' 	=> set_value('nama_member'),
			'alamat_member' => set_value('alamat_member'),
			'nohp' 			=> set_value('nohp'),
			'button' 		=> 'Submit'
		);
		$this->load->view('Regis',$data);
	}

	function daftar_aksi()
	{
		$data = array(
			'username' 			=> $this->input->post('username'),
			'password'		 	=> $this->input->post('password'),
			'nama_member' 		=> $this->input->post('nama_member'),
			'alamat_member' 	=> $this->input->post('alamat_member'),
			'nohp' 				=> $this->input->post('nohp'),
		);
		$this->Member_model->tambah_data($data);
		redirect(site_url('Home'));
	}

	function login()
	{
		$this->load->view('user/Login');
	}

	function berhasil()
	{
		$this->load->view('berhasil');
	}

	function home()
	{
		$this->load->view('user/Home');
	}




	/* ADMIN */

	function delete($id)
	{
		$this->member_model->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Data berhasil dihapus!!</div></div>");
		redirect(site_url('member/Data_member'));
	}

	function update($id)
	{
		$member = $this->Member_model->ambil_data_id($id);
		$data = array(
			'aksi' 				=> site_url('member/update_aksi'),
			'username' 			=> set_value('email',$member->username),
			'password' 			=> set_value('password',$member->password),
			'nama_member'		=> set_value('nama',$member->nama_member),
			'alamat_member' 	=> set_value('alamat',$member->alamat_member),
			'nohp' 				=> set_value('nohp',$member->nohp),
			'id_member' 		=> set_value('id_member',$member->id_member),
			'button' 			=> 'Update'
		);
		$this->load->view('admin/Member_form',$data);		
	}

	function update_aksi()
	{
		$data = array(
			'username' 			=> $this->input->post('username'),
			'password'		 	=> $this->input->post('password'),
			'nama_member' 		=> $this->input->post('nama_member'),
			'alamat_member' 	=> $this->input->post('alamat_member'),
			'nohp' 				=> $this->input->post('nohp')
		);	
		$id_member = $this->input->post('id_member');
		$this->Member_model->edit_data($id_member,$data);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah!!</div></div>");
		redirect('member/Data_member');
	}

	function mau_daftar()
	{
		
		$this->load->view('Regis');
	}
}

?>