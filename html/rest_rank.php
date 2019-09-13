<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}


// Prepare the statement
$queryStatement = "select prop_count as property_id, (row_count * .50) + (row_num_sum_hours * .50) as rank_rest from
(select prop_count, property_count_rank_id, rownum as row_count
from
(select pid as prop_count, id as property_count_rank_id, count(id)
from ithomas.restaraunt r,
(select *
from mgarg.property_location
  where property_longi > ".$longitude." - 0.0200
and property_longi < ".$longitude." + 0.0200
and property_lati < ".$latitude." + 0.0200
and property_lati > ".$latitude." - 0.0200)
where r.longitude > ".$longitude." - 0.02
and r.longitude < ".$longitude." + 0.02
and r.latitude < ".$latitude." + 0.02
and r.latitude > ".$latitude." - 0.02
group by pid, id
order by count(id) desc)) inner join
(select pid, rownum as row_num_sum_hours, property_count from (
select pid, sum(restaraunt_for_property) as sum_hours_per_property, count(pid) as property_count
from
(select pid, restaraunt_for_property,
(monday_close - monday_open) +
(tuesday_close - tuesday_open) +
(wednesday_close - wednesday_open) +
(thursday_close - thursday_open) +
(friday_close - friday_open) +
(saturday_close - saturday_open) +
(sunday_close - sunday_open)
from
(select pid, id as restaraunt_for_property
from ithomas.restaraunt r,
(select *
from mgarg.property_location
  where property_longi > ".$longitude." - 0.0200
    and property_longi < ".$longitude." + 0.0200
    and property_lati < ".$latitude." + 0.0200
    and property_lati > ".$latitude." - 0.0200)
  where r.longitude > property_longi - 0.02
    and r.longitude < property_longi + 0.02
    and r.latitude < property_lati + 0.02
    and r.latitude > property_lati - 0.02)
inner join ithomas.hours on restaraunt_for_property = restaraunt_id)
group by pid)
order by sum_hours_per_property desc) on prop_count = pid
order by rank_rest asc
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
$pid=array();
$count=0;
$loopcount=0;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    foreach ($row as $item) {
      if($loopcount%2==0){
      $pid[$count]=$item;
      $count++;}
      $loopcount++;
      //  print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    
}


oci_free_statement($stid);
oci_close($conn);

?>