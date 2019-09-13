<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement

$queryStatement = "select count(DISTINCT CATEGORY_ID) from
  (
  select *
  from
  ithomas.restaraunt r,
  (
    select stop_id, longitude as b_longitude, latitude as b_latitude
  from mgarg.bus_stops b
     where b.longitude > ". $longitude ." - 0.020
       and b.longitude < ". $longitude ." + 0.020
       and b.latitude < ". $latitude ." + 0.020
    and b.latitude > ". $latitude ." - 0.020)
  where r.longitude > b_longitude - 0.020
  and r.longitude < b_longitude + 0.020
  and r.latitude < b_latitude + 0.02
    and r.latitude > b_latitude - 0.02)
  inner join ithomas.serves on id = restaraunt_id
 ";

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
$tot_cat='';
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    foreach ($row as $item) {
       $tot_cat=$item;
      // print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
}

oci_free_statement($stid);
oci_close($conn);

?>