<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Register_controller extends Base_Controller {

    public function __construct() {

        parent::__construct();

        $this->load
            ->library('kcaptcha', null, 'captcha')
            ->language('captcha')
        ;

        $this->template->set_layout('admin_example_login');
    }

    public function index() {

        $this->load->library('form_validation');

        $register_rules = array(
            array(
                'field' => 'username',
                'label' => $this->lang->line('ui_username').' / '.'E-mail',
                'rules' => 'nohtml|trim|required|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'lang:ui_password',
                'rules' => 'nohtml|trim|required|matches[confirm_password]'
            ),
            array(
                'field' => 'confirm_password',
                'label' => 'lang:ui_confirm_password',
                'rules' => 'nohtml|trim|required'
            ),
            array(
                'field' => 'first_name',
                'label' => 'lang:ui_first_name',
                'rules' => 'nohtml|trim|required'
            ),
             array(
                'field' => 'last_name',
                'label' => 'lang:ui_last_name',
                'rules' => 'nohtml|trim'
            ),
             array(
                'field' => 'gender',
                'label' => 'lang:ui_gender',
                'rules' => 'nohtml|trim'
            ),
             array(
                'field' => 'date_of_birth',
                'label' => 'lang:ui_date_of_birth',
                'rules' => 'nohtml|trim'
            ),
            array(
                'field' => 'captcha',
                'label' => 'Captcha',
                'rules' => 'nohtml|trim|callback__captcha'
            ),
        );

            
            
        $this->form_validation->set_rules($register_rules);

        if ($this->form_validation->run()) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $firstName = $this->input->post('first_name');
            $lastName = $this->input->post('last_name');
            $gender = $this->input->post('gender');
            $dateOfBirth = $this->input->post('date_of_birth');

            if ($this->_register($username, $password,$firstName,$lastName,$gender,$dateOfBirth)) {

                if ($this->input->get('continue')) {
                    redirect($this->input->get('continue'));
                }

                $this->session->set_flashdata('confirmation_message', '<nobr>Hello, <strong>'.$username.'</strong>.</nobr>');
                redirect(site_url());

            } else {

                $error_message = 'Wrong username or password.';
                // Code for the real authentication system.
                //switch ($this->_last_login_error()) {
                //
                //    case LOGIN_USER_UNVERIFIED:
                //        $error_message = 'The user account has not been verified by e-mail.';
                //        break;
                //
                //    case LOGIN_USER_SUSPENDED:
                //        $error_message = 'The user has been suspended';
                //        break;
                //
                //    default:
                //        $error_message = $error_message = 'Wrong username or password.';
                //        break;
                //}

                $this->template->set('error_message', $error_message);
            }

        } elseif (validation_errors()) {

            $this->template->set('error_message', '<ul>'.validation_errors('<li>', '</li>').'</ul>');
            $this->template->set('validation_errors', validation_errors_array());
        }

        $this->captcha->clear();

        $this->template
            ->prepend_title('Login')
            ->set_partial('scripts', 'register_scripts')
            ->enable_parser_body('i18n')
            ->build('register');
    }

    public function _captcha($string) {

        $captcha_valid = $this->captcha->valid($string);
        $this->captcha->clear();

        if (!$captcha_valid) {
            $this->form_validation->set_message('_captcha', $this->lang->line('captcha.validation_error'));
        }

        return $captcha_valid;
    }

}
