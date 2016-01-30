<?php


if(!function_exists('collection_title'))
{
	function collection_title()
	{
	  $ci = &get_instance();
	
      $html_data='';
	  $ci->db->select('title');
      $ci->db->from('collections');
	  $ci->db->order_by('id', 'DESC');
      $ci->db->limit('1');
      $query = $ci->db->get();
     //echo $sql = $ci->db->last_query();exit;
      $result = $query->result_array();
  
  
	if(is_array($result) && !empty($result) )
	{
		  
		  $html_data.=''.$result[0]['title'].'';           
                          
	}


	return $html_data;
	}
	
	
	
}


if(!function_exists('collection_id'))
{
	function collection_id()
	{
	  $ci = &get_instance();
	
      $html_data='';
	  $ci->db->select('id');
      $ci->db->from('collections');
	  $ci->db->order_by('id', 'DESC');
      $ci->db->limit('1');
      $query = $ci->db->get();
     //echo $sql = $ci->db->last_query();exit;
      $result = $query->result_array();
  
  
	if(is_array($result) && !empty($result) )
	{
		  
		  $html_data.=''.$result[0]['id'].'';           
                          
	}


	return $html_data;
	}
	
	
	
}


if(!function_exists('username_photo_by_id'))
{
	function username_photo_by_id($id)
	{
	$ci = &get_instance();
	
	$sql_data=$ci->db->query("select photo from users where id='".$id."' LIMIT 1")->row_array();

	if($sql_data['photo']!=''){
    	
    	   	$photo_img='<img src="'.$ci->config->item('link_base_url').'upload/users_data/'.$sql_data['photo'].'" class="avatar-css"/>';
   	
   	 }else{
    
         $photo_img='<img src="'.$ci->config->item('link_base_url').'assets/curatigo/images/user.jpg" class="avatar-css" />';
   
    }

	return $photo_img;
	}
	
	
	
}

