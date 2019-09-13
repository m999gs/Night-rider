<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement
$queryStatement = "select CASE WHEN TYPE_DESCRIPTION='AUTO BURGLARY' THEN 'AUTO BURGLARY 2015' END AS CRIME,COUNT(*) from ITHOMAS.crime WHERE 
(TO_DATE('31-DEC-2015')<DATE_OF_EVENT AND TO_DATE('31-DEC-2016')>DATE_OF_EVENT 
AND TYPE_DESCRIPTION='AUTO BURGLARY') GROUP BY TYPE_DESCRIPTION
UNION
select CASE WHEN TYPE_DESCRIPTION='AUTO BURGLARY' THEN 'AUTO BURGLARY 2016' END AS CRIME,COUNT(*) from ITHOMAS.crime WHERE 
(TO_DATE('31-DEC-2016')<DATE_OF_EVENT AND TO_DATE('31-DEC-2017')>DATE_OF_EVENT 
AND TYPE_DESCRIPTION='AUTO BURGLARY') GROUP BY TYPE_DESCRIPTION
UNION
select CASE WHEN TYPE_DESCRIPTION='AUTO BURGLARY' THEN 'AUTO BURGLARY 2017' END AS CRIME,COUNT(*) from ITHOMAS.crime WHERE 
(TO_DATE('31-DEC-2017')<DATE_OF_EVENT AND TO_DATE('31-DEC-2018')>DATE_OF_EVENT 
AND TYPE_DESCRIPTION='AUTO BURGLARY') GROUP BY TYPE_DESCRIPTION
UNION
select CASE WHEN TYPE_DESCRIPTION='AUTO BURGLARY' THEN 'AUTO BURGLARY 2018' END AS CRIME,COUNT(*) from ITHOMAS.crime WHERE 
(TO_DATE('31-DEC-2018')<DATE_OF_EVENT AND TO_DATE('31-DEC-2019')>DATE_OF_EVENT 
AND TYPE_DESCRIPTION='AUTO BURGLARY') GROUP BY TYPE_DESCRIPTION";

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

$auto_burglary=array();
$count=0;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
   
    foreach ($row as $item) {
        $auto_burglary[$count]=$item;
        $count++;

        //print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
   
}


oci_free_statement($stid);
oci_close($conn);

?>