<?php 
/**
* 
*/
class Staff_model extends CI_Model
{
	public $admin			= 'admin';
	public $staff			= 'staff';
	public $id				= 'id_staff';
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
		return $this->db->get($this->staff)->result();//banyak data
	}

	function tambah_data($data)//array
	{
		return $this->db->insert($this->staff,$data);
	}


	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->staff);
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->staff,$data);
	}

	function ambil_data_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->staff)->row();
	}
}
 ?>