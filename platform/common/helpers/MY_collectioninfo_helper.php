<?php

if(!function_exists('products_collections'))
{
	function products_collections($cid)
	{
	$ci = &get_instance();
	

	  $ci->db->select('pm.file_name');
      $ci->db->from('products_in_collection as pc');
      $ci->db->where('pc.col_id', $cid);
      $ci->db->where('p.is_enable', '1');
      $ci->db->join("products as p","p.id = pc.product_id","inner");
      $ci->db->join("product_media as pm","p.id = pm.product_id","inner");
      $query = $ci->db->get();
     //echo $sql = $ci->db->last_query();exit;
      $result = $query->result_array();

      $count_product = count($result) - 6;

	$html_data=' <div class="list-bottom" style="text-align:left;">
      <ul>
       ';


	if(is_array($result) && !empty($result) )
	{
		$i=0;
		foreach($result as $result_val)
		{
			$url=$ci->db->query("select url_slug from collections where id='".$cid."'")->row_array();

			
		if($i==6){
			$html_data.='<li class="last">
           <span class="more-css"><img src="'.base_url().'upload/products/'.$result_val['file_name'].'" />
           <span class="num-count">+'.$count_product.'</span></span></li>';
           break;
		}else{
		$html_data.='<li class="images-box">
		<a href="'.base_url().'collection/'.$url['url_slug'].'"><img src="'.base_url().'upload/products/'.$result_val['file_name'].'" /></a></li>';
		}
		$i++;

		}
	}

       
      $html_data.=' 
           
      
      </ul>
   
   </div>';

	return $html_data;
	}
	
	
	
}


if(!function_exists('comment_count_collection'))
{
	
	function comment_count_collection($id)
	{
		
	$ci = &get_instance();
	$num_count=0;
	$sql_data=$ci->db->query("select id from comments where section_type='0' and section_type_id='".$id."'")->result_array();
	$num_count=count($sql_data);
	return $num_count;
	
	}

}




if(!function_exists('products_collection_detail'))
{
	function products_collection_detail($cid)
	{
	  $ci = &get_instance();
	
      $html_data='';
	  $ci->db->select('pm.file_name,p.title_p,p.id,c.id as cid,c.title,p.product_description,p.product_url,p.price,p.sale_price');
      $ci->db->from('products_in_collection as pc');
      $ci->db->where('pc.col_id', $cid);
      $ci->db->where('p.is_enable', '1');
      $ci->db->join("products as p","p.id = pc.product_id","inner");
	  $ci->db->join("collections as c","c.id = pc.col_id","inner");
      $ci->db->join("product_media as pm","p.id = pm.product_id","inner");
      $query = $ci->db->get();
     //echo $sql = $ci->db->last_query();exit;
      $result = $query->result_array();
      $user_id = $ci->session->userdata('_current_user_id');
      $result_json=array();

	if(is_array($result) && !empty($result) )
	{
		
		foreach($result as $index=>$result_val)
		{
			$vote=vote_count_by_id('0',$result_val['id']);
			$result_val['vote']=$vote;
			$result_json[$index]=$result_val;

		}
		//trace($result);


		$html_data.= "<script>".
               "var sliderData={products:''}; ".
               'sliderData.products='.json_encode($result_json).';'.
          '</script>';
		  
		foreach($result as $index=>$result_val)
		{
			

			$collection_id = $result_val['cid'];

			$vote=vote_count_by_id('0',$result_val['id']);

  $html_data.='<div class="pi-col-sm-4 pi-col-xs-6 isotope-item common-col-popup"><div class="pi-img-w images-box"><a href="javascript:;" rel="#img-'.$index.'_'.$cid.'"><img src="'.base_url().'upload/products/'.$result_val['file_name'].'" alt=""><div class="hover-icons"><span class="pin-it"><img src="../assets/curatigo/images/pin.png" alt="" /></span><span data-toggle="modal" data-target="#share-product" class="share-section"><i class="fa fa-share-alt" id="'.$result_val['id'].'"></i></span> </div></a><div class="products-view-info"> <a class="votes-col-count" href="javascript:;"'; 
   
                if($ci->session->userdata('user_logged')!=''){ 
				
				$html_data.='onclick="increase(0,'.$result_val['id'].','.$user_id.')"';	
				
				}else{
					
				$html_data.='data-toggle="modal" data-target="#common-form"';	
					}
          
		  
		  $html_data.='><i class="fa fa-caret-up" ></i><span id="number_0_'.$result_val['id'].'">'.$vote.'</span></a><h4>'.$result_val['title_p'].'.</h4></div></div></div>';           
                          

		}
	}


	return $html_data;
	}
	
	
	
}


if (!function_exists('comments_data_collection')){  

    function comments_data_collection($collection_id,$limit='0',$pop='')
    {
		$ci = &get_instance();

		if($limit>0){
			
			$limit_data='LIMIT '.$limit;

		}else{
			$limit_data='';

		}
		
		$html='<div class="comment-list-css common-new">';

		$comment=$ci->db->query("select * from comments where section_type_id='".$collection_id."' and section_type='0' and parent_comment_id='0' order by id desc $limit_data")->result_array();

		if(is_array($comment) && !empty($comment) )
		{
		$html.='<h3>Discussion <span class="btn-group"><a href="javascript:;" data-toggle="dropdown" aria-expanded="true" class="dropdown-toggle">Most upvoted <b class="caret"></b></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="javascript:;">popular</a> </li>
                                <li><a href="javascript:;">most upvoted</a> </li>
                                <li><a href="javascript:;">oldest</a> </li>
                                <li><a href="javascript:;">newest</a> </li>
                            </ul>
                          </span> </h3>
		<div class="comment-main-box-css common-new">';


		foreach($comment as $comment_val)
		{
		$comment_user=user_allinfo_id($comment_val['user_id']);

		if($ci->session->userdata('user_logged')!=''){
		$htmlcomment='onclick="increase_comment(3,'.$comment_val['id'].','.$ci->session->userdata('_current_user_id').');"';
		$htmlreply='class="replyshowhide'.$pop.'"';
		}else{
		$htmlcomment=' data-toggle="modal" data-target="#common-form"';
		$htmlreply=' data-toggle="modal" data-target="#common-form"';

		}

		$html.='  <div class="comment-box-css common-new">
		<div class="col-lg-1 col-md-1 col-sm-2 pro-left">
		<a href="javascript:;" class="avatar-image-css">'.username_photo_by_id($comment_val['user_id']).'</a>
		</div>
		<div class="col-lg-11 col-md-11 col-sm-10 pro-right">
		<div class="comment-main-box comment-main-new">
		<div class="name-user">'.$comment_user['first_name'].' '.$comment_user['last_name'].'</div> 
		<div>'.$comment_val['comments'].'</div>
		<div class="share-list">
		<a href="javascript:;" '.$htmlcomment.'><i class="fa  fa-caret-up"></i>Upvote <span id="comment_3_'.$comment_val['id'].'">'.vote_count_by_id('3',$comment_val['id']).'</span> </a>&nbsp;
		<a '.$htmlreply.' id="'.$comment_val['id'].'" href="javascript:;">Reply</a>
		<a href="javascript:;" class="days-after">'.get_days_count_from_dates($comment_val['created_date'],date('Y-m-d')).'</a>
		</div>
		</div> 
		<div class="common-new comment-textarea" style="display:none;" id="showhide'.$pop.'_'.$comment_val['id'].'">
                                   <span id="reply_msg'.$pop.'_'.$comment_val['id'].'"></span>
                                    <textarea class="form-control from_collection-reply'.$pop.'" placeholder="Add a reply....." id="'.$pop.'formreply_'.$collection_id.'_'.$comment_val['id'].'"></textarea> <a href="javascript:;" class="enter-text"><i class="fa fa-level-down"></i></a>
                             
                                 </div>
		</div>
		</div>';

				
		$comment_reply=$ci->db->query("select * from comments where section_type_id='".$collection_id."' and section_type='0' and parent_comment_id='".$comment_val['id']."' order by id desc $limit_data")->result_array(); 

					foreach($comment_reply as $comment_reply_val)
					{

					$comment_reply_user=user_allinfo_id($comment_reply_val['user_id']);
					if($ci->session->userdata('user_logged')!=''){
					$htmlsecondreply='onclick="increase_comment(3,'.$comment_reply_val['id'].','.$ci->session->userdata('_current_user_id').');"';	
					}else{
					$htmlsecondreply='data-toggle="modal" data-target="#common-form"';
					}

					$html.='<div class="comment-box-css-reply">
					<div class="col-lg-1 col-md-2 col-sm-2">
					<a href="javascript:;"  class="avatar-image-css">'.username_photo_by_id($comment_reply_val['user_id']).'
					</a>
					</div>
					<div class="col-lg-11 col-md-10 col-sm-10">
					<div class="comment-main-box">
					<div class="name-user">'.$comment_reply_user['first_name'].' '.$comment_reply_user['last_name'].'<span class="color-grey">  '.$comment_reply_user['professional_skills'].' </span></div> 
					<p>'.$comment_reply_val['comments'].'</p>
					<div class="share-list">
					<a '.$htmlsecondreply.' href="javascript:;" ><i class="fa  fa-caret-up"></i>Upvote <span id="comments_3_'.$comment_reply_val['id'].'">'.vote_count_by_id('3',$comment_reply_val['id']).'</span> </a>
					<a href="javascript:;" class="days-after">'.get_days_count_from_dates($comment_reply_val['created_date'],date('Y-m-d')).'</a>
					</div>
					</div> 
					</div>
					</div>  ';
					}

		}

			$html.=' </div>  ';

		}   





			$html.='   </div>';

		return $html;
}

if (!function_exists('comments_data_col')){  

    function comments_data_col($story_id,$limit='0',$pop='pop')
    {
		$ci = &get_instance();

		if($limit>0){
			
			$limit_data='LIMIT '.$limit;

		}else{
			$limit_data='';

		}
		$comment_data_dev=($pop!='pop')?'comment_data_dev_'.$story_id:'comment_data_pop_'.$story_id;
		
		$html='<div class="comment-list-css common-new comment_data_main '.$comment_data_dev.'">';

		$comment=$ci->db->query("select * from comments where section_type_id='".$story_id."' and section_type='0' and parent_comment_id='0' order by id desc $limit_data")->result_array();

		if(is_array($comment) && !empty($comment) )
		{
		$html.=' <h3>Discussion</h3>
		<div class="comment-main-box-css common-new ">';


		foreach($comment as $comment_val)
		{
		$comment_user=user_allinfo_id($comment_val['user_id']);

		$user_link=base_url().'usersinfo/'.$comment_val['user_id'];

		$onclick_comment=array('user_id'=>$ci->session->userdata('user_logged'),
                                                            'section_title'=>$comment_val['comments'],
                                                            'section_type'=>'3',
                                                            'section_type_action'=>'upvote',
                                                            'section_action_id'=>$comment_val['id'],

                                                    );


		if($ci->session->userdata('user_logged')!=''){
		$htmlreply='class="replyshowhide'.$pop.'"';
		}else{
		$htmlreply='data-popup-open="popup-1"';
		}

		$vote=vote_count_by_id('3',$comment_val['id']);

		$vote_msg=($vote>0)?'<span id="comment_3_'.$comment_val['id'].'">'.$vote.'</span>':'<span id="comment_3_'.$comment_val['id'].'">Upvote</span>';	
 			
		$html.='  <div class="comment-box-css common-new" >

		<div class="col-lg-1 col-md-1 col-sm-2 pro-left">
		<a href="'.$user_link.'" class="avatar-image-css" target="_blank">'.username_photo_by_id($comment_val['user_id']).'</a>
		</div>

		<div class="col-lg-11 col-md-11 col-sm-10 pro-right">


		<div class="comment-main-box comment-main-new">

		<div class="name-user"><a href="'.base_url().'usersinfo/'.$comment_user['id'].'" target="_blank" >'.$comment_user['first_name'].' '.$comment_user['last_name'].'</a></div> 
		<div>'.$comment_val['comments'].'</div>
		<div class="share-list">
		<a href="javascript:;" '.onclick_upvote($onclick_comment).'><i class="fa  fa-caret-up"></i>'.$vote_msg.'</a>
		
		<a '.$htmlreply.' id="'.$comment_val['id'].'" href="javascript:;"> Reply</a>
		<a href="javascript:;" class="days-after">'.get_days_count_from_dates($comment_val['created_date'],date('Y-m-d')).'</a>
		</div>';
		


		$html.='</div><span id="reply_msg'.$pop.'_'.$comment_val['id'].'"></span>
		</div>

		
		';



	$html.='<div class="common-new comment-textarea" style="display:none;" id="showhide'.$pop.'_'.$comment_val['id'].'">

				 <textarea class="form-control from-reply mention'.$pop.'" placeholder="Add a reply....." onclick="onfocus_onblur();"   id="'.$pop.'formreply_'.$story_id.'_'.$comment_val['id'].'"></textarea>

                         <a href="javascript:;" class="enter-text mformreply" rel="'.$comment_val['id'].'" id="'.$pop.'mformreply_'.$story_id.'_'.$comment_val['id'].'"><i class="fa fa-level-down"></i></a>
                 
                     </div>';

	$html.= comments_data_id($story_id,$comment_val['id'],$limit);

				
		$html.=' 	</div> ';
					

		}

			$html.=' 	</div> ';

		}   





			$html.='   </div> ';



		return $html;
}
}




if (!function_exists('comments_data_id_col')){  

    function comments_data_id_col($story_id,$comment_id,$limit='0')
    {
		$ci = &get_instance();

		$pop='';
		
		if($limit>0){
			
			$limit_data='LIMIT '.$limit;

		}else{
			$limit_data='';

		}

		
		$html2='  <div id="comment_show_'.$comment_id.'">';

				
		$comment_reply=$ci->db->query("select * from comments where section_type_id='".$story_id."' and section_type='0' and parent_comment_id='".$comment_id."' order by id desc $limit_data")->result_array(); 

					foreach($comment_reply as $comment_reply_val)
					{

					$user_link1=base_url().'usersinfo/'.$comment_reply_val['user_id'];	

					$comment_reply_user=user_allinfo_id($comment_reply_val['user_id']);

					$onclick_comment2=array('user_id'=>$ci->session->userdata('user_logged'),
                                                    'section_title'=>$comment_reply_val['comments'],
                                                    'section_type'=>'3',
                                                    'section_type_action'=>'upvote',
                                                    'section_action_id'=>$comment_reply_val['id'],

                                            );

						$vote2=vote_count_by_id('3',$comment_reply_val['id']);

						$vote_msg2=($vote2>0)?'<span id="comment_3_'.$comment_reply_val['id'].'">'.$vote2.'</span>':'<span id="comment_3_'.$comment_reply_val['id'].'">Upvote</span>';	
				
					$html2.='<div class="comment-box-css-reply">
					<div class="col-lg-1 col-md-2 col-sm-2">
					<a href="'.$user_link1.'"  class="avatar-image-css" target="_blank">'.username_photo_by_id($comment_reply_val['user_id']).'
					</a>
					</div>
					<div class="col-lg-11 col-md-10 col-sm-10">
					<div class="comment-main-box">
					<div class="name-user"><a href="'.base_url().'usersinfo/'.$comment_reply_user['id'].'" target="_blank" >'.$comment_reply_user['first_name'].' '.$comment_reply_user['last_name'].'</a><span class="color-grey">  '.$comment_reply_user['professional_skills'].' </span></div> 
					<p>'.$comment_reply_val['comments'].'</p>
					<div class="share-list">
					<a '.onclick_upvote($onclick_comment2).' href="javascript:;" ><i class="fa  fa-caret-up"></i>'.$vote_msg2.'</a>

					<a href="javascript:;" class="days-after">'.get_days_count_from_dates($comment_reply_val['created_date'],date('Y-m-d')).'</a>
					</div>
					</div> 
					</div>
					</div>  ';


					}

		
			$html2.=' </div> ';

	  
		return $html2;
}
}
}