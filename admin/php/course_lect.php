<?php
include "dbconn.php";





$lect_id = [];

$sql_lectid ="SELECT * FROM `courselecturers`;";


$lect=$conn->query($sql_lectid) or die($conn->error);

$lect_id=[];
while($row=$lect->fetch_assoc() ){
    
    $lect_id[] = $row;
	//print_r ($lect_id);
}

echo json_encode($lect_id);
?>