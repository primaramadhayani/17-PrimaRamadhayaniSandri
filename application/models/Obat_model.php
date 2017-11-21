<?php 
/**
* 
*/
class Obat_model extends CI_Model
{
	public $admin			= 'admin';
	public $obat			= 'obat';
	public $id				= 'id_obat';
	public $order			= 'ASC';

	function __construct()
	{
		parent::__construct();
	}

	function cek_login($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get($this->admin)->row();
	}

	function ambil_data()
	{
		$this->db->order_by($this->id,$this->order);
		return $this->db->get($this->obat)->result();//banyak data
	}

	function tambah_data($data)//array
	{
		return $this->db->insert($this->obat,$data);
	}


	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->obat);
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->obat,$data);
	}

	function ambil_data_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->obat)->row();
	}
}
 ?>