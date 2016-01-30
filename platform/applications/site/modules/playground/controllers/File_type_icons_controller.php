<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class File_type_icons_controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->load
            ->helper('file')
        ;

        $this->template
            ->title('Testing File Type Icons')
        ;

        $this->registry->set('nav', 'playground');
    }

    public function index() {

        $file_extensions = array_keys(file_type_icon());
        $file_extensions = array_merge(array('unknown'), $file_extensions);

        $this->template
            ->set('file_extensions', $file_extensions)
            ->build('file_type_icons');
    }

}
