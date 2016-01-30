<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Smileys_controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->template
            ->title('Smiley Test')
        ;

        $this->registry->set('nav', 'playground');
    }

    public function index() {

        $this->load->helper('smiley');  // This is needed only for calling _get_smiley_array().
        $smileys = _get_smiley_array();

        $this->template
            ->set('smileys', $smileys)
            ->enable_parser_body(array('i18n', 'smileys'))
            ->build('smileys');
    }

}
