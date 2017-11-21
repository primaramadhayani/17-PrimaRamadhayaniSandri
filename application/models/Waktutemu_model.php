<?php 
/**
* 
*/
class Waktutemu_model extends CI_Model
{
	public $waktutemu	= 'waktutemu';
	public $id			= 'id_waktutemu';
	public $order		= 'ASC';

	function __construct()
	{
		parent::__construct();
	}

	function ambil_data()
	{
		$this->db->select('waktutemu.id_waktutemu, dokter.nama_dokter, member.nama_member, waktutemu.tanggal, waktutemu.jam');
        $this->db->from('waktutemu');
        $this->db->join('dokter', 'waktutemu.id_dokter = dokter.id_dokter');
        $this->db->join('member', 'waktutemu.username = member.id_member');
		$query = $this->db->get();
		return $query->result();
	}

	function edit_data($id,$data)
	{
		$this->db->where($this->id,$id);
		return $this->db->update($this->waktutemu,$data);
	}

	function ambil_data_id($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->get($this->waktutemu)->row();//1 data
	}
	function tambah_data($data)//array
	{
		return $this->db->insert($this->waktutemu,$data);
	}

	function hapus_data($id)
	{
		$this->db->where($this->id,$id);
		return $this->db->delete($this->waktutemu);
	}
}
 ?>