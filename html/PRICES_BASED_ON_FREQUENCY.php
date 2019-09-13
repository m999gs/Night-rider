<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement
$queryOne = 'select t.range as "PRICESES", count(*) as "FREQUENCY"
from (
  select case  
  when DAILY_PRICE between 0 and 100 then 1 
  when DAILY_PRICE between 100 and 200 then 2 
  when DAILY_PRICE between 200 and 300 then 3 
  when DAILY_PRICE between 300 and 400 then 4 
  when DAILY_PRICE between 400 and 500 then 5 
  when DAILY_PRICE between 500 and 600 then 6 
  when DAILY_PRICE between 600 and 700 then 7 
  when DAILY_PRICE between 700 and 800 then 8 
  when DAILY_PRICE between 800 and 900 then 9 
  when DAILY_PRICE between 900 and 1000 then 10
  when DAILY_PRICE between 1000 and 10000 then 11  
      else 10000 end as range
  FROM (SELECT DAILY_PRICE FROM PROPERTY ORDER BY DAILY_PRICE ASC)) t
group by t.range order by 1
';

$stid = oci_parse($conn,$queryOne);
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
$price=array();
$prop=array();
$price_counter=0;
$prop_counter=0;
$counter=0;

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    print "<tr>\n";
    foreach ($row as $item) {
        if($counter%2==0){
            $prop[$price_counter]=$item;
            $price_counter++;
        }
            else{
                $price[$prop_counter]=$item;
                $prop_counter++;
            }
            $counter++;
      //  print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    print "</tr>\n";
}
print "</table>\n";

oci_free_statement($stid);
oci_close($conn);

?>