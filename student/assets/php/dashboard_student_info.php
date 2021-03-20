<?php

include "config.php";





$student_id = $_POST['student_id'];
//$student_id="191991";
//echo $student_id;
if (isset($student_id))
{

  
$sql_student ="SELECT * FROM `students` WHERE `username`='$student_id';";

$student=$conn->query($sql_student) or die($conn->error);

$student_info=[];
while($row=$student->fetch_assoc() ){
    
    $student_info[] = $row;

}

// echo '<pre>'; print_r($student_info); echo '</pre>'; // print out the data
echo json_encode($student_info);





}//set
else //unset
{

  echo "no data send";
}



?>

