<?php
include "dbconn.php";





$studsch_id = [];

$sqlstudsch_id ="SELECT * FROM `student_schedule`;";


$id=$conn->query($sqlstudsch_id) or die($conn->error);

$studid=[];
while($row=$id->fetch_assoc() ){
    
    $studid[] = $row;
	//print_r ($lect_id);
}

echo json_encode($studid);
?>