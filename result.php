<?php
use Calc\Classes\daysResult;
require __DIR__ . '/vendor/autoload.php';

if(isset($_POST['Submit'])) {
    $days = $_POST['Days'];
    if(empty($days)) { ?>
        <p style="color:red">Days field is empty.</p><br/><a href='javascript:self.history.back();'>Go Back</a>
        <?php
    } elseif(!is_numeric($days)) { ?>
        <p style="color:red">Days value must be numeric.</p><br/><a href='javascript:self.history.back();'>Go Back</a>
        <?php
    } else {
        $daysresult = new daysResult($days);
        $result = $daysresult->daystodifferent($days);
        echo $result;
    }
}
?>