<?php 
/**
* 
*/
class Staff extends CI_Controller
{
	var $limit=10;
	var $offset=10;
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Staff_model');
		$this->load->helper(array('url'));
	}

	function index($page=NULL,$offset='',$key=NULL)
	{
		//print_r($this->prodi_model->ambil_data());
		$data['staff'] = $this->Staff_model->ambil_data();
		$this->load->view('admin/Staff_list',$data);
	}

	function tambah()
	{
		$data = array(
			'aksi' 				=> site_url('staff/tambah_aksi'),
			'nama_staff' 	=> set_value('nama_staff'),
			'alamat_staff' 	=> set_value('alamat_staff'),
			'jabatan'		=> set_value('jabatan'),
			'id_staff' 		=> set_value('id_staff'),
			'button' 		=> 'Insert'
			);
		$this->load->view('admin/Staff_form',$data);
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
                'nama_staff' 		=> $this->input->post('nama_staff'),
				'alamat_staff' 		=> $this->input->post('alamat_staff'),
				'jabatan' 			=> $this->input->post('jabatan'),              
                );
                $this->Staff_model->tambah_data($data); //akses model untuk menyimpan ke database

                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Insert data berhasil !!</div></div>");
                redirect('staff'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Insert data gagal !!</div></div>");
                redirect('Staff_form'); //jika gagal maka akan ditampilkan form upload
            }
        }


		$data = array(
			'nama_staff' 		=> $this->input->post('nama_staff'),
			'alamat_staff' 	=> $this->input->post('alamat_staff'),
			'jabatan' 		=> $this->input->post('jabatan'),
			);
		$this->Staff_model->tambah_data($data);
		redirect(site_url('staff'));
	}

	function delete($id)
	{
		$this->Staff_model->hapus_data($id);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Data berhasil dihapus!!</div></div>");
                redirect('staff');
	}

	function update($id)
	{
		$staff = $this->Staff_model->ambil_data_id($id);
		$data = array(
			'aksi' 			=> site_url('staff/update_aksi'),
			'nama_staff' 	=> set_value('nama_staff',$staff->nama_staff),
			'alamat_staff' 	=> set_value('alamat_staff',$staff->alamat_staff),
			'jabatan'		=> set_value('jabatan',$staff->jabatan),
			'id_staff' 		=> set_value('id_staff',$staff->id_staff),
			'button' 		=> 'Update'
			);
		$this->load->view('admin/Staff_form',$data);		
	}

	function update_aksi()
	{
		$data = array(
			'nama_staff' 		=> $this->input->post('nama_staff'),
			'alamat_staff' 		=> $this->input->post('alamat_staff'),
			'jabatan' 			=> $this->input->post('jabatan'),
			);	
		$id_staff = $this->input->post('id_staff');
		$this->Staff_model->edit_data($id_staff,$data);
		$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah!!</div></div>");
                redirect('staff');
	}
}

 ?>