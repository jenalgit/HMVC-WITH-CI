<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		
        $this->load->model('Story');
        $this->load->helper(array('usersinfo/usersinfo','common','collectioninfo'));


	}

    


	public function index()
	{
        
        

        $date=date("Y-m-d H:i:s");
        $where = "s.updated_at <= '".$date."'";
		$param_left = array('status'=>'1','id'=>'','orderby'=>'updated_at desc','where'=>$where );
		$res_array_left  = $this->Story->get_story($param_left);	
		$data['res_left'] = $res_array_left;     
        if(is_array($res_array_left) && !empty($res_array_left))
        {     
          $data['top_date'] = $res_array_left[0]['updated_at'];
        }else{
          $data['top_date']=$date=date("Y-m-d H:i:s");;  
        }
	    $param = array('status'=>'1','id'=>'','orderby'=>'updated_at desc','where'=>$where);
		$res_array               = $this->Story->get_story($param);
	    $data['res'] = $res_array;
        
       //   echo $sql = $this->db->last_query();
        
        $data['title']='Story View';
		$this->load->view('stories/story_view', $data);
	}

       


public function show()
    {
       $story_url = $this->uri->segment(3);

        $param = array('status'=>'1','url_slug'=>$story_url,'orderby'=>'updated_at desc','where'=>'');
        $res_array     = $this->Story->get_story($param);
        $data['res'] = $res_array[0];

        //trace($data['res']);

        if(count($res_array[0])==0){
            redirect('stories');
        }

        $data['title']='Story Details View';
        $this->load->view('stories/story_details_view', $data);

        
    }

  public function story_details()
    {
        $story_id = $this->input->post('story_id');
        $param = array('status'=>'1','id'=>$story_id,'orderby'=>'updated_at desc','where'=>'');
        $res_array               = $this->Story->get_story($param);
        $data['res'] = $res_array[0];

        $data['title']='Story View';
        $html=$this->load->view('stories/story_popup_view', $data);

        return $html;
    }  



public function story_share()
    {
        $story_id = $this->input->post('story_id');
        $param = array('status'=>'1','id'=>$story_id,'orderby'=>'updated_at desc','where'=>'');
        $res_array               = $this->Story->get_story($param);
        $data['res'] = $res_array[0];

        $data['title']='Story View';
        $html=$this->load->view('stories/story_share_view', $data);

        return $html;
    } 


public function comments_count_view()
    {
         $id = $this->input->post('id');
         echo $msg=comment_count_html($id);

      }  


public function comments_main_view()
    {
         $story_id= $this->input->post('id');
         echo  $msg=comments_data($story_id,'1','');

      }  




public function comments_submit_main()
    {
        $user_id = $this->input->post('user_id');
        $story_id = $this->input->post('story_id');
        $textarea =  filterCommentBeforeSave($this->input->post('textarea'));
        $date=date("Y-m-d H:i:s");
        $data_insert=array(
                'comments'=>$textarea,
                'user_id'=>$user_id,
                'section_type'=>'2',
                'section_type_id'=>$story_id,
                'is_approved'=>'1',
                'is_enable'=>'1',
                'created_date'=>$date                
            );

        $this->db->insert('comments',$data_insert);

        $msg=comments_data($story_id,'1','');
       // $msg="Thanks for successfully submitting your comment";

        echo $msg;
    }

public function comments_submit()
    {
        $user_id = $this->input->post('user_id');
        $story_id = $this->input->post('story_id');
        $textarea =  filterCommentBeforeSave($this->input->post('textarea'));
        $date=date('Y-m-d  h:i');
        $data_insert=array(
                'comments'=>$textarea,
                'user_id'=>$user_id,
                'section_type'=>'2',
                'section_type_id'=>$story_id,
                'is_approved'=>'1',
                'is_enable'=>'1',
                'created_date'=>$date                
            );

        $this->db->insert('comments',$data_insert);

        $msg=comments_data($story_id,'0','pop');
       // $msg="Thanks for successfully submitting your comment";

        echo $msg;
    }
	

/*collection detail page comment submit jasdeep */

public function comments_collection_submit()
    {
        $user_id = $this->input->post('user_id');
        $story_id = $this->input->post('story_id');
        $textarea =  filterCommentBeforeSave($this->input->post('textarea'));
        $date=date('Y-m-d  h:i');
        $data_insert=array(
                'comments'=>$textarea,
                'user_id'=>$user_id,
                'section_type'=>'0',
                'section_type_id'=>$story_id,
                'is_approved'=>'1',
                'is_enable'=>'1',
                'created_date'=>$date                
            );

        $this->db->insert('comments',$data_insert);

        $msg=comments_data_col($story_id,'0','');

        echo $msg;
       
    }	
	

/* collection detail page comment submit end  */	



    public function cover_image(){
    
   $ds          = DIRECTORY_SEPARATOR;  //1
 
    // $storeFolder = 'upload/story/cover_image/'.date("YM")."/";   //2

    $storeFolder = $this->config->item('base_path').'upload/story/';   //2
 
    if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3    
   // $fileName=  $storeFolder.current_timestamp.$_FILES['file']['name'];

    $fileName=  $_FILES['file']['name'];
      
    $targetPath = $storeFolder; //4
     
    $targetFile =  $targetPath. $fileName;  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
        
        }

    echo $fileName;

     
    

    }

    public function story_submit_section()
    {
        $user_id = $this->input->post('user_id');
        $value = $this->input->post('value');
        $story_title = $this->input->post('story_title');
       
        $date=date("Y-m-d H:i:s");

        $data_insert=array(
                'description'=>$value,
                'user_id'=>$user_id,
                'title'=>$story_title,
                'url_slug'=>url_title($story_title),
                'is_approved'=>'0',
                'is_enable'=>'1',
                'title_type_seo'=>'1',
                'created_date'=>$date,
                'updated_at'=>$date                
            );

        $this->db->insert('story',$data_insert);

        $story_id =$this->db->insert_id();
        $story_title_url=$story_title.'-'.$story_id;
        $url_slug=url_title($story_title_url);
        $data_update = array(
               'url_slug' => $url_slug,
             
            );
        $this->db->where('id', $story_id);
        $this->db->update('story', $data_update); 


       $image = $this->input->post('image');

       $ext = pathinfo($image, PATHINFO_EXTENSION);

       $data_media=array(
                    'file_name'=>$image,
                    'img_title'=>$image,
                    'story_id'=>$story_id,
                    'media_status'=>'1',
                    'type'=>$ext,
                    'created_at'=>$date                
                );

        $this->db->insert('story_media',$data_media);

        $user_name=user_allinfo_id($user_id);

        $meta_description=$story_title.' By '.$user_name['first_name'].' '.$user_name['last_name'];

        $data_meta=array(
                'section_type'=>'2',
                'section_type_id'=>$story_id,
                'meta_title'=>$story_title,
                'meta_description'=>$meta_description,
                'meta_keyword'=>$story_title,
                'created_at'=>$date,
                'updated_at'=>$date                
            );

        $this->db->insert('seo_meta',$data_meta);


        $msg="Thanks for successfully submit your Story";

        echo $msg;
    }

    public function reply_submit()
    {
        $user_id = $this->input->post('user_id');
        $story_id = $this->input->post('story_id');
        $reply_id = $this->input->post('reply_id');
        $textarea =  filterCommentBeforeSave($this->input->post('textarea'));
        $pop = ($this->input->post('pop')<0)?1:0;
        $date=date('Y-m-d  h:i');
        $data_insert=array(
                'comments'=>$textarea,
                'user_id'=>$user_id,
                'parent_comment_id'=>$reply_id,
                'section_type'=>'2',
                'section_type_id'=>$story_id,
                'is_approved'=>'1',
                'is_enable'=>'1',
                'created_date'=>$date                
            );

        $this->db->insert('comments',$data_insert);

         $msg=comments_data_id($story_id,$reply_id,$pop);
        //$msg="Thanks for successfully submit your reply";

        echo $msg;
    }
	
	// created by jasdeep singh for collection detail page comment section //
	
	 public function reply_submit_collection()
   {
	  
       $user_id = $this->input->post('user_id');
       $collection_id = $this->input->post('collection_id');
       $reply_id = $this->input->post('reply_id');
       $textarea =  filterCommentBeforeSave($this->input->post('textarea'));
	   $pop = ($this->input->post('pop')<0)?1:0;
       $date=date('Y-m-d  h:i');
       $data_insert=array(
               'comments'=>$textarea,
               'user_id'=>$user_id,
               'parent_comment_id'=>$reply_id,
               'section_type'=>'0',
               'section_type_id'=>$collection_id,
               'is_approved'=>'1',
               'is_enable'=>'1',
               'created_date'=>$date                
           );

       $this->db->insert('comments',$data_insert);

      $msg = comments_data_id_col($collection_id,$reply_id,' ');
        //$msg="Thanks for successfully submit your reply";

        echo $msg;
   }

    

    public function share_send_mail()
    {
          

            /*---User Mail ---*/
                $user_id= $this->session->userdata("_current_user_id");
                $user_result=user_allinfo_id($user_id);

                $mail_from = $user_result['email_id'];
             
                $mail_to = $this->input->post('data_value');
                $subject = $this->input->post('subject');
                $message = $this->input->post('message');
                $config = Array(
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
                );

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from($mail_from); 
                $this->email->to($mail_to);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send();
     
            /*---End USER Mail ---*/

        $msg="Email Sent to your Friend successfully";

        echo $msg;
    }



public function increase(){
     $increase = $this->input->post('increase');
     $type = $this->input->post('type');
     $id = $this->input->post('id');
     $user_id = $this->input->post('user_id');
     $date=date("Y-m-d h:s:i");

     $sql_data=$this->db->query("select * from votes where user_id='".$user_id."' and section_type='".$type."' and section_type_id='".$id."' limit 1");

     if($sql_data->num_rows()>0){
 		$row = $sql_data->row(); 
		$vote_id=$row->vote_id;
		$voted_type=($row->voted_type=='1')?'0':'1';
     	$data_update=array(
     			'section_type'=>$type,
     			'section_type_id'=>$id,
     			'voted_type'=>$voted_type,
                'added_date'=>$date
     		);
		$this->db->where('vote_id', $vote_id);
     	$this->db->update('votes',$data_update);

     }else{
     
     	$data_insert=array(
     			'section_type'=>$type,
     			'section_type_id'=>$id,
     			'user_id'=>$user_id,
     			'voted_type'=>'1',
     			'added_date'=>$date
     		);

     	$this->db->insert('votes',$data_insert);
     }

    $sql_data_count=$this->db->query("select sum(voted_type) as sum from votes where section_type='".$type."' and section_type_id='".$id."'")->row();

	$increase_value=$sql_data_count->sum;

    echo $increase_value;
}



public function follow_unfollow(){
     
     $follow_id = $this->input->post('follow_id');
     $user_id = $this->input->post('user_id');


     $sql_data=$this->db->query("select * from users_followers where user_id='".$user_id."' and follower_id='".$follow_id."' limit 1");

     if($sql_data->num_rows()>0){
 		$row = $sql_data->row(); 
		$id=$row->id;
		$status=($row->status=='1')?'0':'1';
     	$data_update=array(
     			'status'=>$status,
     		);
		$this->db->where('id', $id);
     	$this->db->update('users_followers',$data_update);

     }else{
     	
     	$data_insert=array(
     			'follower_id'=>$follow_id,
     			'user_id'=>$user_id,
     			'status'=>'1',
     			
     		);

     	$this->db->insert('users_followers',$data_insert);
     }

    $sql_data_count=$this->db->query("select status from users_followers where user_id='".$user_id."' and follower_id='".$follow_id."'")->row();

	$msg_value=($sql_data_count->status=='1')?'Unfollow':'Follow';

    echo $msg_value;
}
	
	
}

/* End of file story.php */
/* Location: ./application/controllers/story.php */
