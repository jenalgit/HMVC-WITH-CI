<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

echo js('lib/jquery-random/jquery.random.js');

?>

    <script type="text/javascript">
    //<![CDATA[

    $(function () {

        var my_random_number = $.random.get();
        $('#my_random_number').html(my_random_number);

        var my_random_integer_number = $.random.integer(10);
        $('#my_random_integer_number').html(my_random_integer_number);

        var my_random_integer_number_2 = $.random.integer_between(10, 19);
        $('#my_random_integer_number_2').html(my_random_integer_number_2);

        var my_unique_id = $.random.uuid();
        $('#my_unique_id').html(my_unique_id);

    });

    //]]>
    </script>
