<?php 
/**
* 
*/
class Dokter extends CI_Controller
{
	var $limit=10;
	var $offset=10;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_model');
		$this->load->helper(array('url'));
	}

	function index($page=NULL,$offset='',$key=NULL)
	{
		//print_r($this->prodi_model->ambil_data());
		$data['dokter'] = $this->Dokter_model->ambil_data();
		$this->load->view('admin/Dokter_list',$data);
	}


//member-waktu temu

	function tambah()
	{
		$data = array(
			'aksi' 				=> site_url('dokter/tambah_aksi'),
			'nama_dokter' 		=> set_value('nama_dokter'),
			'alamat_dokter' 	=> set_value('alamat_dokter'),
			'tgl_lahir'		 	=> set_value('tgl_lahir'),
			'jenis_kelamin'	 	=> set_value('jenis_kelamin'),
			'id_dokter' 		=> set_value('id_dokter'),
			'button' 			=> 'Insert'
			);
		$this->load->view('admin/Dokter_form',$data);
	}

	function tambah_aksi()
	{

		$this->load->library('upload');
        $nmfile = "".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/admin/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '3072'; //maksimum besar file 3M
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                'nama_dokter' 		=> $this->input->post('nama_dokter'),
				'alamat_dokter' 	=> $this->input->post('alamat_dokter'),
				'tgl_lahir' 		=> $this->input->post('tgl_lahir'),
				'jenis_kelamin' 	=> $this->input->post('jenis_kelamin')            
                );
                $this->Dokter_model->tambah_data($data); //akses model untuk menyimpan ke database

                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Insert data berhasil !!</div></div>");
                redirect('dokter'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Insert data gagal !!</div></div>");
                redirect('Dokter_form'); //jika gagal maka akan ditampilkan form upload
            }
        }


		$data = array(
			'nama_dokter' 		=> $this->input->post('nama_dokter'),
			'alamat_dokter' 	=> $this->input->post('alamat_dokter'),
			'tgl_lahir' 		=> $this->input->post('tgl_lahir'),
			'jenis_kelamin' 	=> $this->input->post('jenis_kelamin')
			);
		$this->Dokter_model->tambah_data($data);
		redirect(site_url('dokter'));
	}

	function delete($id)
	{
		$this->Dokter_model->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Data berhasil dihapus!!</div></div>");
                redirect('dokter');
	}

	function update($id)
	{
		$dokter = $this->Dokter_model->ambil_data_id($id);
		$data = array(
			'aksi' 				=> site_url('dokter/update_aksi'),
			'nama_dokter' 		=> set_value('nama_dokter',$dokter->nama_dokter),
			'alamat_dokter' 	=> set_value('alamat_dokter',$dokter->alamat_dokter),
			'tgl_lahir'		 	=> set_value('tgl_lahir',$dokter->tgl_lahir),
			'jenis_kelamin'	 	=> set_value('jenis_kelamin',$dokter->jenis_kelamin),
			'id_dokter' 		=> set_value('id_dokter',$dokter->id_dokter),
			'button' 			=> 'Update'
			);
		$this->load->view('admin/Dokter_form',$data);		
	}

	function update_aksi()
	{
		$data = array(
			'nama_dokter' 		=> $this->input->post('nama_dokter'),
			'alamat_dokter' 		=> $this->input->post('alamat_dokter'),
			'tgl_lahir' 		=> $this->input->post('tgl_lahir'),
			'jenis_kelamin' 		=> $this->input->post('jenis_kelamin'),
			);	
		$id_dokter = $this->input->post('id_dokter');
		$this->Dokter_model->edit_data($id_dokter,$data);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah!!</div></div>");
                redirect('dokter');
	}
}

 ?>