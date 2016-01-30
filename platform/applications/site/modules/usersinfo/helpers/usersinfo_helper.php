<?php

if(!function_exists('username_show'))
{
	function username_show($username)
	{
	$ci = &get_instance();
		
	$user_show_id= explode('@',$username);	

	$show1= '@'.$user_show_id[0];

	return $show1;
	
	}
	
	
	
}


if(!function_exists('username_photo_by_id'))
{
	function username_photo_by_id($id)
	{
	$ci = &get_instance();
	
	$sql_data=$ci->db->query("select photo,screen_name from users where id='".$id."' LIMIT 1")->row_array();

	if(trim($sql_data['photo'])!=''){
    	
    	   	$photo_img='<img src="'.$ci->config->item('link_base_url').'upload/users_data/'.$sql_data['photo'].'" alt="'.$sql_data['photo'].'" class="avatar-css"/>';
   	
   	 }else{
    

    	$photo_img=profile_image_alphabet($sql_data['screen_name']);

        // $photo_img='<img src="'.$ci->config->item('link_base_url').'assets/curatigo/images/user.jpg" class="avatar-css"/>';
   
    }

	return $photo_img;
	}
	
	
	
}



if(!function_exists('user_allinfo_id'))
{
	function user_allinfo_id($id)
	{
	$ci = &get_instance();
	
	$sql_data=$ci->db->query("select * from users where id='".$id."' LIMIT 1")->row_array();


	return $sql_data;
	}
	
	
	
}









if(!function_exists('user_info_id'))
{
	function user_info_id($id)
	{
	$ci = &get_instance();
	
	$sql_data=$ci->db->query("select * from users where id='".$id."' LIMIT 1")->row_array();

	$link_url=base_url().'usersinfo/'.$id;

	if(trim($sql_data['photo'])!=''){
    	
    	   	$photo_img='<img src="'.$ci->config->item('link_base_url').'upload/users_data/'.$sql_data['photo'].'" class="avatar-css"/>';
   	
   	 }else{
    
         $photo_img=profile_image_alphabet($sql_data['screen_name']);

         //$photo_img='<img src="'.$ci->config->item('link_base_url').'assets/curatigo/images/user.jpg" class="avatar-css"/>';
   
    }

	$user_info='<span class="bg-new-css" rel="'.base_url().'usersinfo/'.$id.'">
	<div class="new-info-css"> <a id="" href="javascript:;" rel="'.base_url().'usersinfo/'.$id.'">
	<span class="profileimg">'.$photo_img.'</span> 
	<span class="fullname">'.$sql_data['first_name'].' '.$sql_data['last_name'].' </span> 
	<span class="username">'.username_show($sql_data['username']).'</span></a>
	 </div> ';

	$user_info.=unfollow_follow_btn($id);

	$user_info.='</span>';

	return $user_info;
	}
	
	
	
}

if(!function_exists('follower_count'))
{
	function follower_count($id)
	{
	$ci = &get_instance();
	$follower_count=0;
	$sql_data=$ci->db->query("select id from users_followers where status='1' and follower_id='".$id."'")->result_array();

	$follower_count=count($sql_data);

	return $follower_count;
	}
	
	
	
}


if(!function_exists('unfollow_follow_btn'))
{
	function unfollow_follow_btn($id)
	{
	$ci = &get_instance();
	
	$html='';
	$Follow='';

	$login_id=($ci->session->userdata("_current_user_id")!='')?$ci->session->userdata("_current_user_id"):0;

	if($login_id!=$id){

                 if($login_id>0){
		
					$sql_data=$ci->db->query("select * from users_followers where user_id='".$login_id."' and follower_id='".$id."' LIMIT 1")->row_array();

					$sql_data_res=($sql_data['status']=='1')?'Unfollow':'Follow';

					$Follow ='onclick="follow_unfollow('.$login_id.','.$id.');" id="followtop_'.$id.'"';
					
                    $Follow_show=$sql_data_res;

                     $html.='<a href="javascript:;" class="button btn-color follow-btn" '.$Follow.'><span class="followspan_'.$id.'" id="followspan_'.$id.'">'.$Follow_show.'</span></a>';

                  }else{

                         $Follow.='onclick="login_popup(';
				          $Follow.="'Follow and Unfollow',''";
				          $Follow.=')"';

                     

                       $Follow_show='Follow';

                        $html.='<a href="javascript:;" class="button btn-color follow-btn" '.$Follow.'><span id="followspan_'.$id.'">'.$Follow_show.'</span></a>';
                   }

                
                 
              	}



	return $html;
	}
	
	
	
}




if(!function_exists('following_count'))
{
	function following_count($id)
	{
	$ci = &get_instance();
	$following_count=0;
	$sql_data=$ci->db->query("select id from users_followers where status='1' and follower_id='".$id."'")->result_array();
	
	$following_count=count($sql_data);

	return $following_count;
	}
	
	
	
}

if(!function_exists('story_count'))
{
	function story_count($id)
	{
	$ci = &get_instance();
	$story_num_count=0;
	$sql_data=$ci->db->query("select id from story where user_id='".$id."'")->result_array();
	
	$story_num_count=count($sql_data);

	return $story_num_count;
	}
	
	
	
}


if(!function_exists('collection_count'))
{
	function collection_count($id)
	{
	$ci = &get_instance();
	$collection_num_count=0;
	$sql_data=$ci->db->query("select id from collections where user_id='".$id."'")->result_array();
	
	$collection_num_count=count($sql_data);

	return $collection_num_count;
	}
	
	
	
}

if(!function_exists('comment_count'))
{
	function comment_count($id)
	{
	$ci = &get_instance();
	$num_count=0;
	$sql_data=$ci->db->query("select id from comments where section_type='2' and section_type_id='".$id."'")->result_array();
	
	$num_count=count($sql_data);

	return $num_count;
	}
	
	
	
}


if(!function_exists('comment_count_html'))
{
	function comment_count_html($id)
	{
	$ci = &get_instance();
	$num_count=0;
	$sql_data=$ci->db->query("select id from comments where section_type='2' and section_type_id='".$id."'")->result_array();
	
	$num_count=count($sql_data);

	if($num_count>0){
		$msg= ($num_count>1)?' Comments':' Comment';
		$result=$num_count.$msg;
	}else{
		$msg= '';
		$result='';
	}
	
	return $result;
	}
	
	
	
}



if(!function_exists('collection_comment_count'))
{
	function collection_comment_count($id)
	{
	$ci = &get_instance();
	$num_count=0;
	$sql_data=$ci->db->query("select id from comments where section_type='0' and section_type_id='".$id."'")->result_array();
	
	$num_count=count($sql_data);

	return $num_count;
	}
	
	
	
}


if(!function_exists('vote_count_by_id'))
{
	function vote_count_by_id($section_id,$id)
	{
	$ci = &get_instance();

	$increase_value1=0;

	$sql_data_count=$ci->db->query("select sum(voted_type) as number from votes where section_type='".$section_id."' and section_type_id='".$id."'")->row();

	$increase_value=$sql_data_count->number;

	$increase_value1=($increase_value!='')?$increase_value:'0';

	return $increase_value1;
	}
	
	
	
}


if(!function_exists('upvote_count'))
{
	function upvote_count($id)
	{
	$ci = &get_instance();
	$upvote_num_count=0;
	$sql_data=$ci->db->query("select vote_id from votes where user_id='".$id."' and section_type in (0,2) and voted_type='1'")->result_array();

	
	$upvote_num_count=count($sql_data);

	return $upvote_num_count;
	}
	
	
	
}


if(!function_exists('products_by_collections'))
{
	function products_by_collections($cid,$user_id)
	{
	$ci = &get_instance();
	

	  $ci->db->select('pm.file_name');
      $ci->db->from('products_in_collection as pc');
      $ci->db->where('pc.col_id', $cid);
      $ci->db->where('p.user_id', $user_id);
      $ci->db->where('p.is_enable', '1');
      $ci->db->join("products as p","p.id = pc.product_id","inner");
      $ci->db->join("product_media as pm","p.id = pm.product_id","inner");
      $query = $ci->db->get();
     //echo $sql = $ci->db->last_query();exit;
      $result = $query->result_array();

      $count_product=count($result);

	$html_data=' <div class="list-bottom" style="text-align:left;">
      <ul>
       <a href="javascript:;">';


	if(is_array($result) && !empty($result) )
	{
		$i=0;
		foreach($result as $result_val)
		{

		if($i==6){
			$html_data.='<li class="last">
           <span class="more-css"><img src="'.base_url().'upload/products/'.$result_val['file_name'].'" />
           <span class="num-count">+'.$count_product.'</span></span></li>';
           break;
		}else{
		$html_data.='<li class="images-box">
		<img src="'.base_url().'upload/products/'.$result_val['file_name'].'" /></li>';
		}
		$i++;

		}
	}

       
      $html_data.='  </a>
           
      
      </ul>
   
   </div>';

	return $html_data;
	}
	
	
	
}



if(!function_exists('collections_by_products'))
{
	function collections_by_products($cid,$col_url)
	{
	  $ci = &get_instance();
	  $ci->db->select('pm.file_name,p.id');
      $ci->db->from('products_in_collection as pc');
      $ci->db->where('pc.col_id', $cid);
      $ci->db->where('p.is_enable', '1');
      $ci->db->join("products as p","p.id = pc.product_id","inner");
      $ci->db->join("product_media as pm","p.id = pm.product_id","inner");
      $query = $ci->db->get();
     //echo $sql = $ci->db->last_query();exit;
      $result = $query->result_array();

      $count_product=count($result);

	$html_data=' <div class="list-bottom" style="text-align:left;">
      <ul>
       ';


	if(is_array($result) && !empty($result) )
	{
		$i=0;
		foreach($result as $result_val)
		{
			

		if($i==6){
			$html_data.='<li class="last">
           <span class="more-css"><img src="'.base_url().'upload/products/'.$result_val['file_name'].'" />
           <span class="num-count">+'.$count_product.'</span></span></li>';
           break;
		}else{
		$html_data.='<li class="images-box">
		<a href="'.$col_url.'"><img src="'.base_url().'upload/products/'.$result_val['file_name'].'" /></a></li>';
		}
		$i++;

		}
	}

       
      $html_data.='         
      
      </ul>


         <div class="collection-slider-media">
         <div id="collection_carousel" class="owl-carousel">';
                                           
      if(is_array($result) && !empty($result) )
		{
		$i=0;
		foreach($result as $result_val)
		{                                       
       $html_data.='  <div class="item">
            <a href="javascript:;">
                <img src="'.base_url().'upload/products/'.$result_val['file_name'].'" />
             </a>
         </div>';

		}
		}


    $html_data.=' </div>
                   </div>
  				 </div>';

	return $html_data;
	}
	
	
	
}



if(!function_exists('products_by_watchers'))
{
	function products_by_watchers($id)
	{
	$ci = &get_instance();
	
	  $ci->db->select('*');
      $ci->db->from('products as p');
      $ci->db->where('p.is_enable', '1');
      $ci->db->where('p.user_id', $id);
      $ci->db->join("product_media as pm","p.id = pm.product_id","inner");
      $query = $ci->db->get();
      $result = $query->result_array();

      $count_product=count($result);


	$html_data=' <ul class="watchers-list list-bottom" style="text-align:left;">';

	if(is_array($result) && !empty($result) )
	{
		$i=0;
		foreach($result as $result_val)
		{

		if($i==4){
			$html_data.='<li class="last">
	<a href="javascript:;" class="thumbnail"><span class="more-css">
	<img src="'.base_url().'upload/products/'.$result_val['file_name'].'" class="img-responsive"/>
	<span class="num-count">+'.$count_product.'</span></span></a>
	</li>';
           break;
		}else{
		$html_data.='<li><a href="javascript:;" class="thumbnail">
		<img src="'.base_url().'upload/products/'.$result_val['file_name'].'" class="img-responsive"/>
		</a></li>
	
	';
		}
		$i++;

		}
	}


$html_data.='</ul>';

	return $html_data;
	}
	
	
	
}


if (!function_exists('comments_data')){  

    function comments_data($story_id,$limit='0',$pop='pop')
    {
		$ci = &get_instance();

		if($limit>0){
			
			$limit_data='LIMIT '.$limit;

		}else{
			$limit_data='';

		}
		$comment_data_dev=($pop!='pop')?'comment_data_dev_'.$story_id:'comment_data_pop_'.$story_id;
		
		$html='<div class="comment-list-css common-new comment_data_main '.$comment_data_dev.'">';

		$comment=$ci->db->query("select * from comments where section_type_id='".$story_id."' and section_type='2' and parent_comment_id='0' order by id desc $limit_data")->result_array();

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




if (!function_exists('comments_data_id')){  

    function comments_data_id($story_id,$comment_id,$limit='0')
    {
		$ci = &get_instance();

		$pop='';
		
		if($limit>0){
			
			$limit_data='LIMIT '.$limit;

		}else{
			$limit_data='';

		}

		
		$html2='  <div id="comment_show_'.$comment_id.'">';

				
		$comment_reply=$ci->db->query("select * from comments where section_type_id='".$story_id."' and section_type='2' and parent_comment_id='".$comment_id."' order by id desc $limit_data")->result_array(); 

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