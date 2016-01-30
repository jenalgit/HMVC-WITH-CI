<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Playground_controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->template
            ->title('The Playground')
        ;

        $this->registry->set('nav', 'playground');
    }

    public function index() {

        $this->template
            ->build('playground');
    }

}
