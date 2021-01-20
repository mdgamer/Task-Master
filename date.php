<!DOCTYPE html>
<html>
<body>

<?php
$d=date("Y/m/d");
$date1=date_create("$d");
$date2=date_create("2019-04-20");
$diff=date_diff($date1,$date2);
echo $diff->format("%a days");
date_default_timezone_set("Asia/Calcutta");
$t=date("H:i:s");
echo $t;
?>

</body>
</html>