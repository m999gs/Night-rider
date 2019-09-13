<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement
$queryStatement = "select count_pid, (row_rank_count_of_crime * .50) + (row_rank_year_crime * .50) as rank from
(
select row_rank_count, rownum as row_rank_year_crime from(
select pid as row_rank_count, count(id) as count
  from ithomas.crime c,
       (select *
          from mgarg.property_location
         where property_longi > ".$longitude." - 0.0200
           and property_longi < ".$longitude." + 0.0200
           and property_lati < ".$latitude." + 0.0200
           and property_lati > ".$latitude." - 0.0200)
 where c.longitude > ".$longitude." - 0.02
   and c.longitude < ".$longitude." + 0.02
   and c.latitude < ".$latitude." + 0.02
   and c.latitude > ".$latitude." - 0.02
   and c.date_of_event < to_date('31-DEC-18', 'DD-MM-YY') and c.date_of_event > to_date('31-DEC-17', 'DD-MM-YY')
       group by pid)) inner join
(select count_pid, rownum as row_rank_count_of_crime from(
select pid as count_pid, count(id)
  from ithomas.crime c,
       (select *
          from mgarg.property_location
         where property_longi > ".$longitude." - 0.0200
           and property_longi < ".$longitude." + 0.0200
           and property_lati < ".$latitude." + 0.0200
           and property_lati > ".$latitude." - 0.0200)
 where c.longitude > property_longi - 0.02
   and c.longitude < property_longi + 0.02
   and c.latitude < property_lati + 0.02
   and c.latitude > property_lati - 0.02
       group by pid)) on count_pid = row_rank_count
       order by rank asc
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
       // print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    
}


oci_free_statement($stid);
oci_close($conn);

?>