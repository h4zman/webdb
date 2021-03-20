<?php

include "dbconn.php";

// need to get student id first to know what schedule time 

//$_POST= $student_id ="Student_id";

$student_id = "191995"; // amir - ade student id 2, schdule id 412,413


$sql_student_id = "SELECT `student_id` FROM `students` WHERE `username`='$student_id';";
$student=$conn->query($sql_student_id)->fetch_assoc();
$student_id = $student["student_id"];



$sql_scheduleid ="SELECT `schedule_id` FROM `student_schedule`;";

$schedule=$conn->query($sql_scheduleid) or die($conn->error);

$schedule_id=[];
while($row=$schedule->fetch_assoc() ){
    
    $schedule_id[] = $row;

}


//need to find every class and student and link based on day
$length =count($schedule_id);
//echo $length;
$today = date("l");
//echo $today;

if ($length <2)
 {
        $schedule_id =$schedule_id[0]["schedule_id"];
		//print_r($schedule_id);
        $sql = "SELECT * FROM `schedule_class` WHERE `Schedule_id`='$schedule_id';";
        $classday=$conn->query($sql) or die($conn->error);
        $array=[];


        while($row=$classday->fetch_assoc() ){

        $array[] = $row;

           }

       //    echo '<pre>'; print_r($array); echo '</pre>'; // print out the data
        $course_id =$array[0]["Course_code"];
       // echo $course_id;
        $sql = "SELECT * FROM `coursecode` WHERE `Course_code`='$course_id' ;";
        $course_info=$conn->query($sql)->fetch_assoc() or die($conn->error);

      //  echo '<pre>'; print_r($course_info); echo '</pre>'; // print out the data

        $new_array=[];

        $new_array[0] = $today;
        $new_array[1] = array_merge($array[0],$course_info);

       // echo '<pre>'; print_r($new_array); echo '</pre>'; // print out the data
        
        $lecturer_id= $array[0]["Lecturer_id"];
        $sql = "SELECT * FROM `lecturer` WHERE `lecturer_id`='$lecturer_id';";
        $lecturer_info=$conn->query($sql)->fetch_assoc() or die($conn->error);

      //  echo '<pre>'; print_r($lecturer_info); echo '</pre>'; // print out the data

        $new_array[1] =array_merge($new_array[1],$lecturer_info);

       // echo '<pre>'; print_r($new_array); echo '</pre>'; // print out the data

        echo json_encode($new_array);
       
       //    echo json_encode($array);
}
else if($length >1)
{
    $array=[];
    $array_temp=[];
    $new_array=[];
    for($i=0;$i<$length;$i++)
    {

        $schedule_id_new =$schedule_id[$i]["schedule_id"];
       // echo $schedule_id_new;
        $sql = "SELECT * FROM `schedule_class` WHERE `Schedule_id`='$schedule_id_new';";
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
        
               // echo '<pre>'; print_r($new_array); echo '</pre>'; // print out the data
                
                $lecturer_id= $new_array["Lecturer_id"];
                $sql = "SELECT * FROM `lecturer` WHERE `lecturer_id`='$lecturer_id';";
                $lecturer_info=$conn->query($sql)->fetch_assoc() or die($conn->error);
        
              //  echo '<pre>'; print_r($lecturer_info); echo '</pre>'; // print out the data
        
                $new_array=array_merge($new_array,$lecturer_info);
        
              //  echo '<pre>'; print_r($new_array); echo '</pre>'; // print out the data




            }
        
           }
        
           if(isset($new_array))
           {
            $array[]= $new_array;
           }
        
              unset($array_temp);
              unset($new_array);
              unset($lecturer_info);

    }
    //echo '<pre>'; print_r($array); echo '</pre>'; // print out the data

  
echo json_encode($array);

}





?>

