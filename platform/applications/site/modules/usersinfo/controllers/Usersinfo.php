<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usersinfo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('usersinfo_model','Story'));
		$this->load->helper(array('usersinfo','common'));	

	
	}

	public function index()
	{
		
		$id=$this->uri->segment(2);

		//$id='2';

		$data['title']='users profile';		
		
		$usersinfo_data=$this->usersinfo_model->get_usersinfo_by_id($id);

		if($usersinfo_data->id<=0){
			redirect('');
		}
		$data['usersinfo']=$usersinfo_data;

		$data['users_upvote_collection']=$this->usersinfo_model->get_vote_collection($id);

		$data['upvoted_story']=$this->Story->get_vote_story($id);

		$param = array('status'=>'1','user_id'=>$id,'orderby'=>'updated_at desc','where'=>'');

		$data['users_story']=$this->Story->get_story($param);

		$data['users_collection']=$this->usersinfo_model->get_users_collection($id);

		$data['users_follower']=$this->usersinfo_model->get_users_follower($id);

		//echo $sql = $this->db->last_query();
		
		$data['users_following']=$this->usersinfo_model->get_users_following($id);
		
		$this->load->view('usersinfo/users_view', $data);
	}

	
public function mentions(){

  echo $data = get_user_mention('a');
  echo $data;
}


}

/* End of file usersinfo.php */
/* Location: ./application/controllers/usersinfo.php */
