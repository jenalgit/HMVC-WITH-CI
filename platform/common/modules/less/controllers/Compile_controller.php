<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * LESS Assets Compiler
 *
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Compile_controller extends Core_Controller {

    protected $items;

    public function __construct() {

        parent::__construct();

        if (!IS_CLI) {
            show_404();
        }

        $this->config->load('less_compile', false, true);

        $this->items
            = !empty($this->config->config['less_compile']) && is_array($this->config->config['less_compile'])
            ? $this->config->config['less_compile']
            : array();

        $this->load->parser('less');
        $this->load->helper('file');
    }

    public function index() {

        $args = array_slice($this->uri->rsegment_array(), 2);

        foreach ($this->items as $item) {

            $name = isset($item['name']) ? (string) $item['name'] : null;

            if (!empty($args)) {

                if (!in_array($name, $args)) {
                    continue;
                }
            }

            $source = isset($item['source']) ? (string) $item['source'] : '';
            $destination = isset($item['destination']) ? (string) $item['destination'] : '';
            $compress = !empty($item['compress']);

            if ($source == '' || $destination == '') {
                continue;
            }

            $dir = pathinfo($destination, PATHINFO_DIRNAME);
            file_exists($dir) OR mkdir($dir, 0755, TRUE);

            try {
                write_file($destination, $this->less->parse($source, null, true, array('full_path' => true, 'compress' => $compress)));
            } catch(Exception $e) {
                echo $e->getMessage().PHP_EOL;
            }
        }
    }

}
