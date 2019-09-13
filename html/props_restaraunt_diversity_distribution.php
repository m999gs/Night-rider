<?php

$conn = oci_connect("mgarg","Mohit7717","oracle.cise.ufl.edu:1521/orcl");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Prepare the statement

$queryStatement = "with cat_rank as (
select category_id, rownum rank_of_cat from
(
select category_id, count(restaraunt_id)
  from ithomas.serves
         group by category_id
         order by count(restaraunt_id) asc)),

 rest_in_range as (
    select *
      from ithomas.restaraunt r
    where r.longitude > ". $longitude ." - 0.02
    and r.longitude < ". $longitude ." + 0.02
    and r.latitude < ". $latitude ." + 0.02
    and r.latitude > ". $latitude ." - 0.02),

cat_size as (select count(*) as size1 from cat_rank)

select * from 
(select count(distinct  category_id) as one_fourth from rest_in_range inner join ithomas.serves on id = restaraunt_id
where category_id in 
    (select category_id from cat_rank where rank_of_cat < (select size1 from cat_size)/4)),
(select count(distinct  category_id) as two_fourth from rest_in_range inner join ithomas.serves on id = restaraunt_id
where category_id in 
    (select category_id from cat_rank where rank_of_cat < (select size1 from cat_size)/2 and rank_of_cat > (select size1 from cat_size)/4)),
(select count(distinct  category_id) as three_forth from rest_in_range inner join ithomas.serves on id = restaraunt_id
where category_id in 
    (select category_id from cat_rank where rank_of_cat < ((select size1 from cat_size)/2 + (select size1 from cat_size)/4) and rank_of_cat > (select size1 from cat_size)/2)),
(select count(distinct  category_id) as four_forth from rest_in_range inner join ithomas.serves on id = restaraunt_id
where category_id in 
    (select category_id from cat_rank where rank_of_cat < (select size1 from cat_size) and rank_of_cat > ((select size1 from cat_size)/2 + (select size1 from cat_size)/4)))
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
$cat=array();
$count=0;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    foreach ($row as $item) {
        $cat[$count]=$item;
        $count++;
        //print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    
}


oci_free_statement($stid);
oci_close($conn);

?>