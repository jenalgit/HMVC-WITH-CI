<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

?>

        <section>

            <div class="container">

                <div class="page-header">
                    <h1>Multiplayer Library Test</h1>
                </div>

                <div class="row">

<?php

if (!$system_requirements_ok) {

?>
                    <div class="col-md-12">

                        <div class="status alert alert-warning">
                           PHP 5.3.2 is required for this example.
                        </div>

                    </div>

<?php

} else {

    foreach ($videos as $video) {
?>
 
                    <div class="col-md-4">

                        <p><?php echo $this->multiplayer->html($video); ?></p>

                        <p style="margin-bottom: 25px;"><a href="<?php echo $video; ?>" target="_blank"><?php echo $video; ?></a></p>

                    </div>

<?php

    }
}

?>
                </div>

            </div>

        </section>
