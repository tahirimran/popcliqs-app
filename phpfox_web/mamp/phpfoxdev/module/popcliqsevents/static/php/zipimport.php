<?php 


set_time_limit(0);
$mysqlhost = 'localhost';
$mysqluser = 'root';
$mysqlpass = 'root';
$mysqldb = 'popcliqs';
$mysqltable = 'zipgeo';
mysql_connect($mysqlhost, $mysqluser, $mysqlpass) or die(mysql_error());
mysql_select_db($mysqldb) or die(mysql_error());

$fields = array('zip5', 'city', 'state', 'lat', 'lon', 'county');
$contents = file('zip5.csv');

$buffer = 100;
$basestatement = "insert into {$mysqltable} (`" . implode("`, `", $fields) . "`) VALUES ";

$counter = 0;
$inserts = array();
foreach ($contents as $line) {
    $linefields = explode(',', $line);
    $linefields = array_map('trim', $linefields);
    $linefields = array_map('mysql_real_escape_string', $linefields);
    $inserts[] = "('" . implode("', '", $linefields) . "')";
    $counter++;

    if ($counter == $buffer) {
        $query = $basestatement . implode(',', $inserts);
        mysql_query($query) or die(mysql_error());
        $counter = 0;
        $inserts = array();
    }
}

if (count($inserts)) {
    $query = $basestatement . implode(',', $inserts);
    mysql_query($query);
}

print 'done';
?>