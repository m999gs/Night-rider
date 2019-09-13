<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement
$stid = oci_parse($conn, 'SELECT ROW_NUMBER() OVER (ORDER BY FREQUENCY) AS INTERVAL, FREQUENCY FROM(SELECT COUNT(*) AS FREQUENCY FROM(SELECT STOP_ID,
ARRIVAL_TIME*86400 AS VAL FROM(SELECT DISTINCT B.STOP_ID, B.ARRIVAL_TIME FROM (SELECT DISTINCT stop_id FROM BUS_STOPS 
cross join PROPERTY_LOCATION p WHERE (P.PID=12918687 AND LATITUDE>p.property_lati-0.00950/*BOTTOM*/ AND 
LATITUDE <p.property_lati+0.00950/*TOP*/ AND LONGITUDE>p.property_longi-0.00120 /*LEFT*/AND 
LONGITUDE<p.property_longi+0.00120/*RIGHT*/)) BS inner join BUSES B on BS.STOP_ID=B.STOP_ID ORDER BY B.ARRIVAL_TIME ) 
ORDER BY VAL)WHERE VAL<12000)
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
print "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    print "<tr>\n";
    foreach ($row as $item) {
        print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    print "</tr>\n";
}
print "</table>\n";

oci_free_statement($stid);
oci_close($conn);

?>