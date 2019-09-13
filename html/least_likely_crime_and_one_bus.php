<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement

$queryStatement = "select count(*) from 
(
 select *
  from
  (select rid, r_latitude, r_longitude, count(c.id) total
     from
     ithomas.crime c,
       (select id as rid, longitude as r_longitude, latitude as r_latitude
          from ithomas.restaraunt r
 where r.longitude > ". $longitude ." - 0.020
   and r.longitude < ". $longitude ." + 0.020
   and r.latitude < ". $latitude ." + 0.020
   and r.latitude > ". $latitude ." - 0.020)
    where c.longitude > r_longitude - 0.020
      and c.longitude < r_longitude + 0.020
      and c.latitude < r_latitude + 0.02
      and c.latitude > r_latitude - 0.02
    group by rid, r_longitude, r_latitude)
  where exists (select *
                 from mgarg.bus_stops s
                where s.longitude > r_longitude - 0.020
                  and s.longitude < r_longitude + 0.020
                  and s.latitude < r_latitude + 0.020
                  and s.latitude > r_latitude - 0.020))
                  where total < 8000 
";

;

$stid = oci_parse($conn, $queryStatement);
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
$least_likely='';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    foreach ($row as $item) {
       $least_likely=$item;
      // print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    
}


oci_free_statement($stid);
oci_close($conn);

?>