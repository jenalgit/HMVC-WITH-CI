<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

?>

        <section>

            <div class="container">

<?php

template_partial('subnavbar');

?>

                <div class="page-header">
                    <h1>Accessing the REST Server Using the Curl Library</h1>
                </div>

                <div class="row">

                    <div class="col-md-12">

                        <p>
                            See the article
                            <a href="http://net.tutsplus.com/tutorials/php/working-with-restful-services-in-codeigniter-2/" target="_blank">
                                http://net.tutsplus.com/tutorials/php/working-with-restful-services-in-codeigniter-2/
                            </a>
                        </p>

                        <h3>Code:</h3>

                        <pre><code><?php echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8'); ?></code></pre>

                        <h3>Result (for $user_id = 1):</h3>

                        <pre><?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?></pre>

                    </div>

                </div>

            </div>

        </section>
