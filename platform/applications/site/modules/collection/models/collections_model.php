<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Collections_model extends core_Model {

    public function get_collections($param = array()) {
        return true;
    }

    public function get_collection($start,$end)
    {
        $today = date("Y-m-d ");
		$yesterday = date('Y-m-d', strtotime('yesterday'));
        $this->db->select('*');
        $this->db->from('collections');
		$where_au = "is_approved = 1  AND  is_featured = 1 ";
		$this->db->where($where_au);
		$this->db->limit(3,0);
		$this->db->order_by('updated_at','desc');
        $query = $this->db->get();
	   /* $last = $this->db->last_query();
		echo '<pre>';print_r($last); die();*/
        $result = $query->result_array();
        return $result ;
    }
	 public function get_collection_more($start,$end)
    {
        $today = date("Y-m-d ");
		$yesterday = date('Y-m-d', strtotime('yesterday'));
        $this->db->select('*');
        $this->db->from('collections');
		$this->db->where('is_approved', 1);
		$this->db->where('is_featured', 1);
		$where_au = "DATE(updated_at) != '".$today."' ";
		$this->db->where($where_au);
		$this->db->order_by('updated_at','desc');
		$this->db->limit(2,0);
        $query = $this->db->get();
	   /* $last = $this->db->last_query();
		echo '<pre>';print_r($last); die();*/
        $result = $query->result_array();
        return $result ;
    }
	 public function get_collection_end()
    {
        $this->db->select('*');
        $this->db->from('collections');
		$this->db->where('is_approved', 1);
		$this->db->where('is_featured', 1);
        $query = $this->db->get();
	   /* $last = $this->db->last_query();
		echo '<pre>';print_r($last); die();*/
        $result = $query->result_array();
	    $count = $query->num_rows();
        return $count ;
    }
	 public function get_collection_front($start,$end)
    {
         
        $this->db->select('*');
        $this->db->from('collections');
		$this->db->where('is_approved', 1);
		$this->db->where('is_featured', 1);
		$this->db->order_by('updated_at','desc');
		$this->db->limit($end,$start);
        $query = $this->db->get();
        $result = $query->result_array();
		//echo '<pre>';print_r($query); die();
        return $result ;
    }
	
	
	 public function get_collection_upcoming_start()
    {
         $today = date("Y-m-d ");  
		 $yesterday = date('Y-m-d', strtotime('yesterday'));     
        $this->db->select('*');
        $this->db->from('collections');
		$where_au = "is_approved = 1  AND  is_featured = 0 ";
		$this->db->where($where_au);
		$this->db->order_by('updated_at','desc');
		$this->db->limit(3,0);
        $query = $this->db->get();
		$last = $this->db->last_query();
        $result = $query->result_array();
        return $result  ;
    }
	
	 public function get_collection_upcoming_more()
    {
          $today = date("Y-m-d ");        
        $this->db->select('*');
        $this->db->from('collections');
		$this->db->where('is_approved', 1);
		$this->db->where('is_featured', 0);
		$where_au = "DATE(updated_at) != '".$today."' ";
		$this->db->where($where_au);
		$this->db->order_by('updated_at','desc');
		$this->db->limit(2,0);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    }
	
	 public function get_collection_upcoming_end()
    {
        $this->db->select('*');
        $this->db->from('collections');
		$this->db->where('is_approved', 1);
		$this->db->where('is_featured', 0);
        $query = $this->db->get();
	   /* $last = $this->db->last_query();
		echo '<pre>';print_r($last); die();*/
        $result = $query->result_array();
	    $count = $query->num_rows();
        return $count ;
    }
	
	 public function get_collection_front_upcoming($start,$end)
    {
         
        $this->db->select('*');
        $this->db->from('collections');
		$this->db->where('is_approved', 1);
		$this->db->where('is_featured', 0);
		$this->db->order_by('updated_at','desc');
		$this->db->limit($end,$start);
        $query = $this->db->get();
        $result = $query->result_array();
		//echo '<pre>';print_r($query); die();
        return $result ;
    }
	
	 public function get_collection_front_search($start)
    {
       

        $this->db->select('*');
        $this->db->from('collections');
		$where_au = "DATE(updated_at) = '".$start."' ";
		$this->db->where($where_au);
		$this->db->where('is_approved', 1);
		$this->db->where('is_featured', 1);
        $query = $this->db->get();
        $result = $query->result_array();
		//echo '<pre>';print_r($query); die();
        return $result ;
    }
	
	
	public function collection_list()
    {
               
        $this->db->select('*');
        $this->db->from('collections');
		$this->db->where('is_approved', 1);
		$this->db->order_by('created_at','desc');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    }
	
	
	public function single_collection($collection_slug)
    {
	        
       $this->db->select('s.id,s.user_id,s.cat_id,c.name,s.title,s.url_slug,s.tag_line,s.is_featured,s.is_enable,s.created_at,s.deleted');
		$this->db->where('url_slug', $collection_slug);
        $this->db->from('collections As s');
		$this->db->join('categories AS c', 's.cat_id = c.id ','LEFT');
        $query = $this->db->get();
        $result = $query->result_array();
			
        return $result  ;
    }
	
	
	public function single_upvote_collection($collection_id)
    {
               
        $this->db->select('*');
        $this->db->from('votes');
		$this->db->where('section_type_id', $collection_id);
		$this->db->where('section_type', 0);
		$this->db->order_by('added_date','desc');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result  ;
    }

}

?>