<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends Base_Authenticated_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Current_user');
	
	}

	public function index()
	{
		
		$data['title']='Members profile';
		$data['username']=$this->Current_user->username();
		
		$this->load->view('members/member_view', $data);
	}

	



}

/* End of file Members.php */
/* Location: ./application/controllers/Members.php */
