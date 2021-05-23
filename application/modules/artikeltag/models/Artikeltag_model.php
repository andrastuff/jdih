<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Artikeltag_model extends CI_Model 
{
	public $primary		= 'id';
	public $search		= 'nama_tag';
    public $tbl_name	= 'tags';
	

	public function get_all($limit, $offset, $search, $columns, $sort) 
    {
		if(isset($search) && !empty($search)):
		$this->db->like($this->search, $search);
		endif;
		
		if ($columns != ""){
        $this->db->order_by($columns, $sort);
		}else{
		$this->db->order_by('id', 'DESC');
		}
		$result = $this->db->get($this->tbl_name, $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function count_all($search) 
    {
		if(isset($search) && !empty($search)):
		$this->db->like($this->search, $search);
		endif;
		$this->db->from($this->tbl_name);
		return $this->db->count_all_results();
        
    }
	
	
    public function get_one($id) 
    {
        $this->db->where($this->primary, $id);
        $result = $this->db->get($this->tbl_name);

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }
	
	public function save($data)
    {
       
        $this->db->insert($this->tbl_name, $data);

		return true;
    }
	
	
    public function update($id, $data)
    {
        $this->db->where($this->primary, $id);
        $this->db->update($this->tbl_name, $data);

		return true;
    }

    public function destroy($id)
    {       
        $this->db->where($this->primary, $id);
        $this->db->delete($this->tbl_name);
		
		return true;
        
    } 

	
}
