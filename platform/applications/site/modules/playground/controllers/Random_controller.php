<?php if (!defined('BASEPATH')) { exit('No direct script access allowed.'); }

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Random_controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->template
            ->title('Random Values Test')
        ;

        $this->registry->set('nav', 'playground');
    }

    public function index() {

        $this->template
            ->set_partial('scripts', 'random_scripts')
            ->build('random');
    }

}
