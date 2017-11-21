<?php 
/**
* 
*/
class Admin_model extends CI_Model
{
	public $nama_table = 'admin';
	public $id = 'username';
	
	public $order = 'ASC'; 

	function __construct()
	{
		parent::__construct();
	}

	function ambil_data()
	{
		$this ->db->order_by($this->id,$this->order);
		return $this->db->get($this->nama_table)->result();
	}

	function ambil_data_id($id) 
	{
		$this ->db->where($this->id,$id);
		return $this->db->get($this->nama_table)->row();
	}

		function cek_login($username,$password) 
	{
		$this ->db->where('username',$username);
		$this ->db->where('password',$password);
		return $this->db->get($this->nama_table)->row();
	}

	function tambah_data($data)
	{
		return $this->db->insert($this->nama_table,$data);
	}

	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->nama_table);
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->nama_table, $data);
	}


}
