<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajaxurls extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model(array('usersinfo_model','Story'));
		$this->load->helper(array('common'));	

	
	}

	public function index()
	{
		
		
			redirect('');
		
	}

	
public function mentions(){

 	$data = get_user_mention($this->uri->segment(3));
  	echo $data;
}


}

/* End of file usersinfo.php */
/* Location: ./application/controllers/usersinfo.php */
