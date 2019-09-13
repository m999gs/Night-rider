<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

//$latitude=36.250452;
//$longitude=-115.288144;
// Prepare the statement
$queryStatement = "SELECT * FROM (SELECT DISTINCT PID FROM PROPERTY_LOCATION  WHERE (
property_lati >".$latitude."-0.02000/*BOTTOM*/ AND property_lati <".$latitude."+0.02000/*TOP*/ AND 
property_longi >".$longitude."-0.02000 /*LEFT*/AND property_longi <".$longitude."+0.02000/*RIGHT*/))
WHERE ROWNUM<11";

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
$pid=array();
$count=0;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    foreach ($row as $item) {
        
      $pid[$count]=$item;
      $count++;
        // print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    
}


oci_free_statement($stid);
oci_close($conn);

?>