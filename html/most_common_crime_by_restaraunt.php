<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement


$queryStatement = "      select type_description , count(rid)
        from
            ithomas.crime c,
          (
            select id as rid, longitude as r_longitude, latitude as r_latitude
              from ithomas.restaraunt r
             where r.longitude > ". $longitude ." - 0.010
               and r.longitude < ". $longitude ." + 0.010
               and r.latitude < ". $latitude ." + 0.010
               and r.latitude > ". $latitude ." - 0.010)
       where c.longitude > r_longitude - 0.010
         and c.longitude < r_longitude + 0.010
         and c.latitude < r_latitude + 0.01  
         and c.latitude > r_latitude - 0.01
         and type_description != 'OTHER DISTURBANCE'
       group by type_description
       order by count(rid) DESC
       fetch first 10 rows with ties
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
$crime_by_rest=array();
$count=0;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    foreach ($row as $item) {
      $crime_by_rest[$count]=$item;
      $count++;  
     //  print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    
}


oci_free_statement($stid);
oci_close($conn);

?>