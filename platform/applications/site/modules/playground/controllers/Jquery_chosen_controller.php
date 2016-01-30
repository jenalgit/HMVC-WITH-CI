<?php if (!defined('BASEPATH')) { exit('No direct script access allowed.'); }

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Jquery_chosen_controller extends Base_Controller {

    public $driver_ok = false;

    public function __construct() {

        parent::__construct();

        $this->driver_ok = extension_loaded('pdo_sqlite');

        if ($this->driver_ok) {

            $this->load->database();
            $this->load->model('countries');
        }

        $this->template
            ->title('Jquery Chosen Plugin Test')
        ;

        $this->registry->set('nav', 'playground');
    }

    public function index() {

        $validation_rules = array(
            array(
                'field' => 'country_1',
                'label' => 'Country 1',
                'rules' => 'nohtml|trim|required'
            ),
            array(
                'field' => 'country_2',
                'label' => 'Country 2',
                'rules' => 'nohtml|trim|required'
            ),
        );

        $country_1 = null;
        $country_2 = null;

        $country_names = array();

        if ($this->driver_ok) {
            $country_names = $this->countries->dropdown('id', 'name');
        }

        $this->form_validation->set_rules($validation_rules);

        $success = false;
        $messages = array();

        if ($this->form_validation->run()) {

            // Read data.

            $country_1 = (int) $this->input->post('country_1');
            $country_2 = (int) $this->input->post('country_2');

            // Process data.

            $country_1_name = $this->countries->select('name')->as_value()->get($country_1);
            $country_2_name = $this->countries->select('name')->as_value()->get($country_2);

            $messages[] =
                'You have just chosen:<br />'.
                '<strong>Country 1:</strong> '.$country_1_name.'<br />'.
                '<strong>Country 2:</strong> '.$country_2_name;

            $success = true;

        } elseif (validation_errors()) {

            $messages = validation_errors_array();
            $this->template->set('validation_errors', $messages);
        }

        $this->template
            ->set(compact('success', 'messages', 'country_1', 'country_2', 'country_names'))
            ->set('driver_ok', $this->driver_ok)
            ->set_partial('css', 'jquery_chosen_css')
            ->set_partial('scripts', 'jquery_chosen_scripts')
            ->enable_parser_body('i18n')
            ->build('jquery_chosen');
    }

}
