<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

$config['vbox7'] = array(
    'id' => '#vbox7\.com/play\:(?<id>[a-z0-9_-]+)#i',
    'url' => 'http://vbox7.com/emb/external.php?vid=%s',
    'map' => array(),
);
