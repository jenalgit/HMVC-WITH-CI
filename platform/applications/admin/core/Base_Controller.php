<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Controller extends Core_Controller {

    public function __construct() {

        parent::__construct();

        
        $this->load->model('current_user');

        $this->load->library('template');

        $this->template->set_layout('admin', config_item('current_theme_path'));

        $default_title = config_item('default_title');
        $default_title = 'Application Starter 4 Public Edition';
        //

        if ($default_title != '') {
             $this->template->title($default_title);
        }

        $this->template->set_metadata('robots', 'noindex,nofollow,noarchive');

        $this->template
            ->prepend_title('Site Administrator')
        ;
    }

   
    protected function _check_access() {

       
        if (!$this->current_user->is_logged_in()) {

            if ($this->input->is_ajax_request()) {

                $this->session->set_flashdata('error_message', $this->lang->line('ui_session_expired'));

                set_status_header(403);

                exit;
            }

            if ($this->uri->total_segments() != 0) {

                // Session expiration message is not to be shown
                // when we are comming from the protected home page.
                $this->session->set_flashdata('error_message', $this->lang->line('ui_session_expired'));
            }

            if ($this->input->method() != 'get') {
                redirect('login');
            }

            //redirect(http_build_url(site_url('login'), array('query' => http_build_query(array('continue' => CURRENT_URL))))); //for diffrent auths 
            redirect(http_build_url($this->config->item("auth_url").'/login', array('query' => http_build_query(array('continue' => CURRENT_URL))))); //for common auth
        }

        return true;
    }

}
