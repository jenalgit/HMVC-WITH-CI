<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

if (!isset($subnavbar_item_active)) {
    $subnavbar_item_active = '';
}

?>

                <ul class="nav nav-pills">
                    <li<?php if ($subnavbar_item_active == 'restserver') { ?> class="active"<?php } ?>><a href="<?php echo site_url('playground/rest/server'); ?>">REST Server</a></li>
                    <li<?php if ($subnavbar_item_active == 'curl') { ?> class="active"<?php } ?>><a href="<?php echo site_url('playground/rest/curl'); ?>">Accessing the REST Server Using the Curl Library</a></li>
                    <li<?php if ($subnavbar_item_active == 'restclient') { ?> class="active"<?php } ?>><a href="<?php echo site_url('playground/rest/client'); ?>">Accessing the REST Server Using the Rest Client Library</a></li>
                </ul>
