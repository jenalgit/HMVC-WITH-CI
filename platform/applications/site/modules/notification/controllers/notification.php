<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model(array('notifications'));       
		
	}

	public function index()
	{
		$res_array_left  = $this->notifications->getAll();	
		$data['res_left'] = $res_array_left;
                
	    
        $data['title']='Notifications';
		$this->load->view('notification/notification_list', $data);
	}


public function story_details()
    {
        $story_id = $this->input->post('story_id');
        $param = array('status'=>'1','id'=>$story_id,'orderby'=>'created_date desc','where'=>'');
        $res_array               = $this->story_model->get_story($param);
        $data['res'] = $res_array[0];

        $data['title']='Story View';
        $html=$this->load->view('story/story_popup_view', $data);

        return $html;
    }

public function story_share()
    {
        $story_id = $this->input->post('story_id');
        $param = array('status'=>'1','id'=>$story_id,'orderby'=>'created_date desc','where'=>'');
        $res_array               = $this->story_model->get_story($param);
        $data['res'] = $res_array[0];

        $data['title']='Story View';
        $html=$this->load->view('story/story_share_view', $data);

        return $html;
    } 


public function comments_submit()
    {
        $user_id = $this->input->post('user_id');
        $story_id = $this->input->post('story_id');
        $textarea = $this->input->post('textarea');
        $date=date('Y-m-d  h:i');
        $data_insert=array(
                'comments'=>$textarea,
                'user_id'=>$user_id,
                'section_type'=>'1',
                'section_type_id'=>$story_id,
                'is_approved'=>'1',
                'is_enable'=>'1',
                'created_date'=>$date                
            );

        $this->db->insert('comments',$data_insert);

        $msg="Thanks for successfully submit your comments";

        echo $msg;
    }


public function increase(){
     $increase = $this->input->post('increase');
     $type = $this->input->post('type');
     $id = $this->input->post('id');
     $user_id = $this->input->post('user_id');


     $sql_data=$this->db->query("select * from votes where user_id='".$user_id."' and section_type='".$type."' and section_type_id='".$id."' limit 1");

     if($sql_data->num_rows()>0){
 		$row = $sql_data->row(); 
		$vote_id=$row->vote_id;
		$voted_type=($row->voted_type=='1')?'0':'1';
     	$data_update=array(
     			'section_type'=>$type,
     			'section_type_id'=>$id,
     			'voted_type'=>$voted_type,
     		);
		$this->db->where('vote_id', $vote_id);
     	$this->db->update('votes',$data_update);

     }else{
     	$date=date("Y-m-d h:s:i");
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

	$msg_value=($sql_data_count->status==1)?'Follow':'UnFollow';

    echo $msg_value;
}
	
	
}

/* End of file story.php */
/* Location: ./application/controllers/story.php */
