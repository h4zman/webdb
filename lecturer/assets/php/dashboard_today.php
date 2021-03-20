<?php

include "config.php";

// need to get student id first to know what schedule time 

//$_POST= $student_id ="Student_id";

//$student_id = "191995"; // amir - ade student id 2, schdule id 412,413
$student_id = $_POST['student_id'];
//$student_id ="112932";

if (isset($student_id))
{
$sql_student_id = "SELECT * FROM `lecturer` WHERE `username`='$student_id';";
$student=$conn->query($sql_student_id)->fetch_assoc();
$student_id = $student["lecturer_id"]; // 1 je data dpt



$today = date("l");
//echo $today;

       // echo $schedule_id_new;
        $sql = "SELECT * FROM `schedule_class` WHERE `Lecturer_id`='$student_id' AND `Day`= '$today';";
        $classday=$conn->query($sql) or die($conn->error);
        
        
        while($row=$classday->fetch_assoc() ){
            if(isset($row))
            {
                $array_temp = $row;


                $course_id =$array_temp["Course_code"];
               // echo $course_id;
                $sql = "SELECT * FROM `coursecode` WHERE `Course_code`='$course_id' ;";
                $course_info=$conn->query($sql)->fetch_assoc() or die($conn->error);
        
               // echo '<pre>'; print_r($course_info); echo '</pre>'; // print out the data
        
                $new_array = array_merge($array_temp,$course_info);
      
             
        
             //  echo '<pre>'; print_r($new_array); echo '</pre>'; // print out the data
             // echo $i;

             $array[]= $new_array;
             unset($array_temp);
             unset($new_array);

            }
        
           }
        
  
          
    
    //echo '<pre>'; print_r($array); echo '</pre>'; // print out the data

  
echo json_encode($array);
//echo json_encode($array_temp);




}//set
else //unset
{

  echo "no data send";
}



?>

