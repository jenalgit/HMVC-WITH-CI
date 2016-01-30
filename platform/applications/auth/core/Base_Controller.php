<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends Core_Controller {

    public function __construct() {

        parent::__construct();
        
        $this->load->model('current_user');

        $this->load->library('template');

       
        $this->template->set_layout('auth',config_item('current_theme_path'));

        $default_title = config_item('default_title');
        
        if ($default_title != '') {
             $this->template->title($default_title);
        }

        $this->template->set_metadata('robots', 'noindex,nofollow,noarchive');

        $this->template->prepend_title('Auth Manager');
    }

    
    protected function _login($username, $password) {
           $this->_logout();
        return $this->current_user->login($username, $password);
    }

    
    
    protected function _register($username, $password,$firstName,$lastName,$gender,$dateOfBirth){
        return $this->current_user->register($username, $password,$firstName,$lastName,$gender,$dateOfBirth);
    }

    
    protected function _logout() {
        if (!$this->current_user->is_logged_in()) {
            return;
        }
        $this->current_user->logout();
    }
    
    protected function _last_login_error() {
       return $this->current_user->last_login_error();
    }

    protected function _check_access() {
        if (!$this->current_user->is_logged_in()) {

            if ($this->input->is_ajax_request()) {

                $this->session->set_flashdata('error_message', $this->lang->line('ui_session_expired'));

                set_status_header(403);

                exit;
            }

            if ($this->uri->total_segments() != 0) {
                $this->session->set_flashdata('error_message', $this->lang->line('ui_session_expired'));
            }

              if ($this->input->method() != 'get')
			 {
                     redirect('login');
              }         
            redirect(http_build_url(site_url('login'), array('query' => http_build_query(array('continue' => CURRENT_URL)))));
        }

        return true;
    }

}
