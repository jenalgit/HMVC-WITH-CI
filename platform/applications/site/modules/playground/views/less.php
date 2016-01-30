<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

?>

        <section>

            <div class="container">

                <div class="page-header">
                    <h1>Less Compiler Test</h1>
                </div>

                <div class="row">

                    <div class="col-md-12">

<?php

file_partial('messages');

?>

                        <?php echo form_open('', 'id="test_form" method="post" role="form"'); ?>

                            <div class="form-group">
                                <label for="input">The input, Less source:</label>
                                <textarea id="input" name="input" class="form-control" rows="10" placeholder="Copy/paste your Less source here."><?php echo $clear_form || $is_example ? form_prep($input, true) : set_value('input', $input, true); ?></textarea>
                            </div>

                            <div class="form-group">
                                <button id="test_form_submit" name="test_form_submit" type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <button id="test_form_submit" name="test_form_clear" type="submit" value="1" class="btn btn-danger">
                                    Clear
                                </button>
                                <button id="test_form_submit" name="test_form_example" type="submit" value="1" class="btn btn-info">
                                    Show Me an Example
                                </button>
                            </div>

                            <div class="form-group">
                                <label for="output">The result, CSS:</label>
                                <textarea id="output" class="form-control" rows="10"><?php echo form_prep($output, true); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="output_min">The result, minified CSS:</label>
                                <textarea id="output_min" class="form-control" rows="10"><?php echo form_prep($output_min, true); ?></textarea>
                            </div>

                        <?php echo form_close(); ?>

                    </div>

                </div>

            </div>

        </section>
