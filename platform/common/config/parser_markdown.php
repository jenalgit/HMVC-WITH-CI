<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

// A choice of the Markdown implementation to be used:
// 'php-markdown' - http://michelf.ca/projects/php-markdown
// 'parsedown' - https://github.com/erusev/parsedown
$config['markdown_implementation'] = 'parsedown';

// php-markdown specific options -----------------------------------------------

// A workaround for ```php kind of blocks detection.
$config['detect_code_blocks'] = TRUE;

// Apply autolink after parsing.
$config['apply_autolink'] = TRUE;
