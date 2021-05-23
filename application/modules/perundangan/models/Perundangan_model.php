<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perundangan_model extends CI_Model
{
	public $primary		= 'id';
    public $search		= 'judul';
    public $tbl_name	= 'perundangan';
	
    // ===================================================================================================
    /** GET ALL : Mengambil data yang ada di tabel sesuai limit dan mengembalikannya ke dalam DataTabel */
    // ===================================================================================================
	public function get_all($limit, $offset, $search, $columns, $sort) {
		if (isset($search) && !empty($search)) {
            $this->db->like($this->search, $search);
        }
		if ($columns != ""){
        $this->db->order_by($columns, $sort);
		}else{
		$this->db->order_by('id', 'DESC');
		}
        
        $result = $this->db->get($this->tbl_name, $limit, $offset);

        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return array();
        }
    }
	
    // ===================================================================================================
    /** COUNT ALL : Menghitung semua data yang ada di dalem tabel */
    // ===================================================================================================
	public function count_all($search) {
        if (isset($search) && !empty($search)) {
            $this->db->like($this->search, $search);
        };
        $this->db->from($this->tbl_name);

        return $this->db->count_all_results();
    }

    // ===================================================================================================
    /** GET ONE : Menampilkan 1 data di dalam tabel */
    // ===================================================================================================
    public function get_one($id)
    {
        $this->db->where($this->primary, $id);
        $result = $this->db->get($this->tbl_name);

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    // ===================================================================================================
    /** SAVE : Membuat data baru ke dalam tabel */
    // ===================================================================================================
    public function save($data)
    {
        
		$this->db->insert($this->tbl_name, $data);
		
		
		return $this->db->insert_id();
    }

    // ===================================================================================================
    /** UPDATE : Memperbarui data berdasarkan ID yang dikirim */
    // ===================================================================================================
    public function update($id, $data) {
        
        $this->db->where($this->primary, $id);
        $this->db->update($this->tbl_name, $data);
        
        return $id;
    }

    // ===================================================================================================
    /** DESTROY : Menghapus data berdasarkan ID yang dikirim */
    // ===================================================================================================
    public function destroy($id)
    {
        $key = 'id_dokumen';
		
		$this->db->where($key, $id);
        $this->db->delete('data_pengarang');
		
		$this->db->where($key, $id);
        $this->db->delete('data_status');
		
		$this->db->where($key, $id);
        $this->db->delete('data_subyek');
		
		$this->db->where($key, $id);
        $this->db->delete('data_lampiran');
		
		$this->db->where($this->primary, $id);
        $this->db->delete($this->tbl_name);
		
		return true;
    }


}