<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Authenticated_Controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->template->set_partial(config_item('current_theme_path').'handle_unauthenticated_ajax', config_item('current_theme_path').'partials/handle_unauthenticated_ajax');

        $this->_check_access();
    }

}
