<?php 
/**
* 
*/
class Obat extends CI_Controller
{
	var $limit=10;
	var $offset=10;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
		$this->load->helper(array('url'));
	}

	function index($page=NULL,$offset='',$key=NULL)
	{
		//print_r($this->prodi_model->ambil_data());
		$data['obat'] = $this->Obat_model->ambil_data();
		$this->load->view('admin/Obat_list',$data);
	}

	function tambah()
	{
		$data = array(
			'aksi' 				=> site_url('obat/tambah_aksi'),
			'nama_obat' 		=> set_value('nama_obat'),
			'jenis_obat' 		=> set_value('jenis_obat'),
			'jumlah'		 	=> set_value('jumlah'),
			'harga'	 			=> set_value('harga'),
			'id_obat' 			=> set_value('id_obat'),
			'button' 			=> 'Insert'
			);
		$this->load->view('admin/Obat_form',$data);
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
                'nama_obat' 	=> $this->input->post('nama_obat'),
				'jenis_obat' 	=> $this->input->post('jenis_obat'),
				'jumlah' 		=> $this->input->post('jumlah'),
				'harga' 		=> $this->input->post('harga'),                  
                );
                $this->Obat_model->tambah_data($data); //akses model untuk menyimpan ke database

                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Insert data berhasil !!</div></div>");
                redirect('obat'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Insert data gagal !!</div></div>");
                redirect('Obat_form'); //jika gagal maka akan ditampilkan form upload
            }
        }


		$data = array(
			'nama_obat' 	=> $this->input->post('nama_obat'),
			'jenis_obat' 	=> $this->input->post('jenis_obat'),
			'jumlah' 		=> $this->input->post('jumlah'),
			'harga' 		=> $this->input->post('harga'),
			);
		$this->Obat_model->tambah_data($data);
		redirect(site_url('obat'));
	}

	function delete($id)
	{
		$this->Obat_model->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Data berhasil dihapus!!</div></div>");
                redirect('obat');
	}

	function update($id)
	{
		$obat = $this->Obat_model->ambil_data_id($id);
		$data = array(
			'aksi' 			=> site_url('obat/update_aksi'),
			'nama_obat' 	=> set_value('nama_obat',$obat->nama_obat),
			'jenis_obat' 	=> set_value('jenis_obat',$obat->jenis_obat),
			'jumlah'		=> set_value('jumlah',$obat->jumlah),
			'harga'	 		=> set_value('harga',$obat->harga),
			'id_obat' 		=> set_value('id_obat',$obat->id_obat),
			'button' 		=> 'Update'
			);
		$this->load->view('admin/Obat_form',$data);		
	}

	function update_aksi()
	{
		$data = array(
			'nama_obat' 	=> $this->input->post('nama_obat'),
			'jenis_obat' 	=> $this->input->post('jenis_obat'),
			'jumlah' 		=> $this->input->post('jumlah'),
			'harga' 		=> $this->input->post('harga'),
			);	
		$id_obat = $this->input->post('id_obat');
		$this->Obat_model->edit_data($id_obat,$data);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah!!</div></div>");
                redirect('obat');
	}
}

 ?>