<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement
$stid = oci_parse($conn, '
select t.range as TIMINGS, count(*) as "FREQUENCY"
from (
  select case  
  when VAL between 0 and 3600 then 1 
  when VAL between 3600 and 7200 then 2
  when VAL between 7200 and 10800 then 3 
  when VAL between 10800 and 14400 then 4
  when VAL between 14400 and 18000 then 5 
  when VAL between 18000 and 21600 then 6 
  when VAL between 21600 and 25200 then 7 
  when VAL between 25200 and 28800 then 8 
  when VAL between 28800 and 32400 then 9 
  when VAL between 32400 and 36000 then 10 
  when VAL between 36000 and 39600 then 11 
  when VAL between 39600 and 43200 then 12 
  when VAL between 43200 and 46800 then 13 
  when VAL between 46800 and 50400 then 14 
  when VAL between 50400 and 54000 then 15 
  when VAL between 54000 and 57600 then 16 
  when VAL between 57600 and 61200 then 17 
  when VAL between 61200 and 64800 then 18 
  when VAL between 64800 and 68400 then 19 
  when VAL between 68400 and 72000 then 20 
  when VAL between 72000 and 75600 then 21 
  when VAL between 75600 and 79200 then 22 
  when VAL between 79200 and 82800 then 23 
  when VAL between 82800 and 86400 then 24 
      else 24 end as range
  FROM (SELECT ARRIVAL_TIME*86400 AS VAL FROM BUSES ORDER BY VAL)) t
group by t.range order by TIMINGS



');
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Perform the logic of the query
$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Fetch the results of the query
$bus_timing=array();
$counter=0;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    foreach ($row as $item) {
            $bus_timing[$counter]=$item;
            $counter++; 
      //  print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    
}


oci_free_statement($stid);
oci_close($conn);

?>