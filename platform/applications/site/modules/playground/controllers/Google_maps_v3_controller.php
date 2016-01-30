<?php if (!defined('BASEPATH')) { exit('No direct script access allowed.'); }

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Google_maps_v3_controller extends Base_Controller {

    public $driver_ok = false;

    public function __construct() {

        parent::__construct();

        $this->driver_ok = extension_loaded('pdo_sqlite');

        if ($this->driver_ok) {
            $this->load->database();
        }

        $this->template
            ->title('Google Maps JavaScript API v3 Demo')
        ;

        $this->registry->set('nav', 'playground');
    }

    public function index() {

        $this->template
            ->set('driver_ok', $this->driver_ok)
            ->set_partial('css', 'google_maps_v3_css')
            ->set_partial('scripts', 'google_maps_v3_scripts')
            ->enable_parser_body('i18n')
            ->build('google_maps_v3');
    }

}
