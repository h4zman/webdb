<?php

include "assets/php/config.php";

//need to find student detail

$username =  $_POST['Username'];

if (isset($username))
{

    echo $username;
    $sql_student_id = "SELECT * FROM `students` WHERE `username`='$username';";

    $student=$conn->query($sql_student_id) or die($conn->error);

    $student_info=[];
        while($row=$schedule->fetch_assoc() ){
    
      $student_info[] = $row;

        }

      echo '<pre>'; print_r($student_info); echo '</pre>'; // print out the data

}
else
{
    echo "no data receieve";
}




?>