<?php

use Calc\Classes\Calculation;
require __DIR__ . '/vendor/autoload.php';

if(isset($_POST['Submit'])) {
    $fdate = $_POST['fdate'];
    $tdate = $_POST['tdate'];
    //echo $fdate.'</br>'.$tdate;exit;
    $fdatezone = $_POST['fdatezone'];
    $tdatezone = $_POST['tdatezone'];
    // checking empty fields
    if(empty($fdate) || empty($tdate) || empty($fdatezone) || empty($tdatezone) ) {
        if(empty($fdate)) { ?>
            <p style="color:red">From Date field is empty.</p><br/>
            <?php
        }

        if(empty($tdate)) { ?>
            <p style="color:red">To Date field is empty.</p><br/>
            <?php
        }

        if(empty($fdatezone)) { ?>
            <p style="color:red">From Date Timezone field is empty.</p><br/>
            <?php
        }

        if(empty($tdatezone)) { ?>
            <p style="color:red">To Date Timezone field is empty.</p><br/>
            <?php
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        $calculation = new Calculation($fdate, $tdate, $fdatezone, $tdatezone);
        $toTz='Asia/Kolkata';
        $firstdate = $calculation->converToTz($fdate,$toTz,$fdatezone);
        $todate = $calculation->converToTz($tdate,$toTz,$tdatezone);
        $datavalid = $calculation->validDate($firstdate, $todate);
        if($datavalid == 1) {
            $daysdiff = $calculation->getDaysDiff($firstdate, $todate);
            echo "Difference in days : ".$daysdiff.'</br>';
            $weekdaysdiff = $calculation->getWorkingDaysDiff($firstdate, $todate);
            echo "Difference in weekdays : ".$weekdaysdiff.'</br>';
            $noofweeks = $calculation->weeks_between($firstdate, $todate);
            echo "Difference in Week : ".$noofweeks.'</br>';

            ?>
            <form action="result.php" method="post" name="form1">
                <table width="25%" border="0">
                    <tr>
                        <td>Days:</td>
                        <td><input type="Text" name="Days"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="Submit" value="Calculate"></td>
                    </tr>
                </table>
            </form>
            <form action="weeks.php" method="post" name="form2">
                <table width="25%" border="0">
                    <tr>
                        <td>weeks:</td>
                        <td><input type="Text" name="weeks"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="Submit" value="Calculate"></td>
                    </tr>
                </table>
            </form>
            <?php
        } else { ?>
            <p style="color:red">Form Date must be older than To date</p><br/><a href='javascript:self.history.back();'>Go Back</a>
            <?php
        }

    }
}
?>