<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Multiplayer_controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->template
            ->title('Multiplayer Library Test')
        ;

        $this->registry->set('nav', 'playground');
    }

    public function index() {

        $videos = array(
            'https://www.youtube.com/watch?v=NRhVcTTMlrM',
            'http://vimeo.com/60743823',
            'http://www.dailymotion.com/video/x9kdze',
            'http://vbox7.com/play:25c4115f2d',
        );

        $system_requirements_ok = is_php('5.3.2');

        if ($system_requirements_ok) {
            $this->load->library('multiplayer');
        }

        $this->template
            ->set('videos', $videos)
            ->set('system_requirements_ok', $system_requirements_ok)
            ->build('multiplayer');
    }

}
