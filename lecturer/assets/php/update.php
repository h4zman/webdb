<?php

include "config.php";





$course_code = $_POST['code'];
$link = $_POST['newlink'];
//$course_code="ECC4207";
//$link ="https://www.google.com/";

if (isset($course_code) && isset($link))
{

  

    $sqlupdate = "UPDATE `coursecode` SET `Course_link` = '$link' WHERE `Course_code` = '$course_code'";


$update_link=$conn->query($sqlupdate) or die($conn->error);



// echo '<pre>'; print_r($student_info); echo '</pre>'; // print out the data






}//set
else //unset
{

  echo "no data send";
}



?>

