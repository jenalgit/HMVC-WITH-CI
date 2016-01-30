<?php defined('BASEPATH') OR exit('No direct script access allowed.');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

class Multiplayer extends \Multiplayer\Multiplayer {

    public function __construct($config = array()) {

        if (!is_array($config)) {
            $config = array();
        }

        parent::__construct($config);
    }

}
