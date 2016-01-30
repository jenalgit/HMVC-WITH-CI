<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Deepak Patil <deepak.patil@relesol.com>, 2015
 * @license The MIT License, http://opensource.org/licenses/MIT
 */

?>

    <script type="text/javascript">
    //<![CDATA[

        !function ($) {
            $(function() {
                window.prettyPrint && prettyPrint();
            })
        } (window.jQuery);

    //]]>
    </script>

<?php

echo js('lib/mustache/mustache.min.js');

?>

    <script type="text/javascript">
    //<![CDATA[

    var data = <?php echo json_encode($data); ?>;

    var template = <?php echo json_encode($mustache_template); ?>;

    $(function () {

        var html = Mustache.to_html(template, data);
        $('#the_result').html(html);
    });

    //]]>
    </script>
