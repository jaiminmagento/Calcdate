<?php

use Calc\Classes\weekClass;
require __DIR__ . '/vendor/autoload.php';

if(isset($_POST['Submit'])) {
    $weeks = $_POST['weeks'];
    if(empty($weeks)) { ?>
        <p style="color:red">weeks field is empty.</p><br/><a href='javascript:self.history.back();'>Go Back</a>
        <?php
    } elseif(!is_numeric($weeks)) { ?>
        <p style="color:red">Weeks value must be numeric.</p><br/><a href='javascript:self.history.back();'>Go Back</a>
        <?php
    } else {
        $weekdiff = new weekClass($weeks);
        $result = $weekdiff->weekstodifferent($weeks);
        echo $result;
    }
}
?>