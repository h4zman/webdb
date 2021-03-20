<?php

require_once('config.php');
$username = $fullname = $role = $email = $numphone = $birthday = $address = $password = $confirm_password = ""; 

//insert into login table
$username =  $_POST['Username'];
$fullname = $_POST['Fullname'];
$role =  $_POST['Role'];
$password = ($_POST['Password']);
$confirm_password = md5($password);

//insert into lecturer table
//$username1 =  $_POST['username'];
//$fullname1 = $_POST['Full_name'];
//$email = $_POST['Email'];
//$numphone = $_POST['No_telephone'];

//insert into students table
//$username2 =  $_POST['username'];
//$fullname2 = $_POST['Full_name'];
$birthday = $_POST['Birthday'];
$address = $_POST['Address'];

//$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql1 = "INSERT INTO `login` (`Username`, `Fullname`, `Role`, `Password`) VALUES ('$username', '$fullname', '$role', '$password');";
$sql2 = "INSERT INTO `students`(Fullname, `Username`, `Birthday`, `Address` ) VALUES ('$fullname', '$username', '$birthday', '$address')";
//$sql3 = "INSERT INTO lecturer (Username, Fullname, Email, No_telephone) VALUES ('$username', '$fullname', $email, $numphone)";



$result = mysqli_query($conn, $sql1);
$result = mysqli_query($conn, $sql2);
//$result = mysqli_query($conn, $sql3);

if($result)
{
    header("Location: index.php");
}else{
    echo "Error :" .$sql1;
}


?>

<?php
session_start();
include "assets/php/config.php";

//need to find student detail

    $username =  $_SESSION['LoginUser'];

    if (isset($username))
{

    //echo strval($username);
    $sql_student_id = "SELECT * FROM `students` WHERE `username`='$username';";

    $student=$conn->query($sql_student_id) or die($conn->error);

    $student_info=[];
     while($row=$student->fetch_assoc() ){

     $student_info[] = $row;

}

//echo '<pre>'; print_r($student_info); echo '</pre>'; // print out the data

}
else
    {
     echo "no data receieve";
    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Timeline.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="assets/css/Box-panels-1.css">
    <link rel="stylesheet" href="assets/css/Box-panels.css">
    <link rel="stylesheet" href="assets/css/Dropdown-Login-with-Social-Logins.css">
    <link rel="stylesheet" href="assets/css/dropdown-search-bs4.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Text-Input-1.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="assets/css/Hover-Button-1.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/LinkedIn-like-Profile-Box.css">
    <link rel="stylesheet" href="assets/css/List-item.css">
    <link rel="stylesheet" href="assets/css/Navbar-Dropdown-List-Item.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="color: var(--danger);height: 1814px;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>E-KELAS&nbsp;</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="index.html"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html" style="width: 226px;height: 36px;"><i class="fas fa-user"></i><span>Profile</span></a><a class="nav-link" href="profile.html" style="width: 226px;height: 36px;"><i class="fa fa-reorder"></i><span>Class</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div></div>
                <div></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop-2" type="button"><i class="fas fa-bars"></i></button><a class="btn btn-sm animated-button victoria-one" href="#" style="height: 33px;width: 139px;margin: 13px;">Logout</a>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <div class="input-group-append"></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                      
                       
                          
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Muhammad Hazman</span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Welcome to E-Kelas!</h3>
                    </div>
                </div>
              <div class="container" id ="today_class">
                </div>
                 <div class="container" id ="next_class">
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Skemer 2021</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/Bootstrap-DataTables.js"></script>
    <script src="assets/js/dropdown-search-bs4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>

    

    <script>


    
    $(document).ready(function(){




        retrieve_data();

        function retrieve_data()
        {

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             classes = JSON.parse(this.responseText);
             var length = classes.length;
     

             
             console.log(length);
             console.log(classes);

            var classcode;
            var classname;
            var description;
            var startime;
            var duration;
            var link;
            var lecturer;
            var i;
            var full_data=[];
            full_data[0]= '<h1 class="my-4" id ="today">Today</h1>';
              for (i = 0; i <classes.length; i++){
                 
                 classcode = classes[i].Course_code;
                 classname = classes[i].Course_name;
                 description = classes[i].Course_description;
                 startime = classes[i].Start_time;
                 duration = classes[i].Duration;
                 link = classes[i].Course_link;
                 lecturer =classes[i].Full_name;
                
            
            full_data [i+1]= '<div class="row">'+
                        '<div class="col-md-7 mb-4">'+
                           '<div class="card h-100"><a href="#"></a>'+
                                '<div class="card-body">' +
                                    '<h4 class="card-title">'+classname+'</h4>'+
                                   '<h6 class="text-muted card-subtitle mb-2">'+classcode+'</h6>'+
                                   '<h6 class="text-muted card-subtitle mb-2">Start time: '+startime+'</h6>'+
                                   '<h6 class="text-muted card-subtitle mb-2">Duration: '+duration+'Hours</h6>'+
                                    '<p class="card-text">'+description+'</p>'+
                                '</div>'+
                           '</div>'+
                        '</div>'+
                            '<div class="col-md-5 offset-xl-0 mb-4">'+
                                '<div class="card h-100">'+
                                '<h1 style="font-size: 23px;position: absolute;top: 13px;left: 13px;">Class Link:</h1><div class="group">'+      
                                '<a href="'+link+'" target="_blank">'+link+'</a>'+
                             '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<hr>';
                
				
		    	                }  
             
             document.getElementById("today_class").innerHTML = full_data;
             console.log(full_data);
             
          
         }
                };
            xmlhttp.open("POST", "assets/php/dashboard_today.php", true);
            var student_id= <?php echo strval($username); ?>;
            console.log(student_id);
            xmlhttp.send(student_id);
            



            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             classes = JSON.parse(this.responseText);
             var length = classes.length;     
             console.log(length);
             console.log(classes);
             

            var classcode;
            var classname;
            var description;
            var startime;
            var duration;
            var link;
            var lecturer;
            var i;
            var full_data=[];
            full_data[0]= '<h1 class="my-4"id ="today">Next class</h1>'
              for (i = 0; i <classes.length; i++){
                 
                 classcode = classes[i].Course_code;
                 classname = classes[i].Course_name;
                 description = classes[i].Course_description;
                 startime = classes[i].Start_time;
                 duration = classes[i].Duration;
                 link = classes[i].Course_link;
                 lecturer =classes[i].Full_name;
                
				                
				
                            full_data [i+1]= '<div class="row">'+
                        '<div class="col-md-7 mb-4">'+
                           '<div class="card h-100"><a href="#"></a>'+
                                '<div class="card-body">' +
                                    '<h4 class="card-title">'+classname+'</h4>'+
                                   '<h6 class="text-muted card-subtitle mb-2">'+classcode+'</h6>'+
                                   '<h6 class="text-muted card-subtitle mb-2">Start time:'+startime+'</h6>'+
                                   '<h6 class="text-muted card-subtitle mb-2">Duration:'+duration+'Hours</h6>'+
                                    '<p class="card-text">'+description+'</p>'+
                                '</div>'+
                           '</div>'+
                        '</div>'+
                            '<div class="col-md-5 offset-xl-0 mb-4">'+
                                '<div class="card h-100">'+
                                '<h1 style="font-size: 23px;position: absolute;top: 13px;left: 13px;">Class Link:</h1><div class="group">'+      
                                '<a href="'+link+'" target="_blank">'+link+'</a>'+
                             '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<hr>';
                 
				
		    	                }  
                console.log(full_data.length);
             
             document.getElementById("next_class").innerHTML = full_data;
             console.log(full_data);
            
             
           
         }
                };
            xmlhttp.open("POST", "assets/php/dashboard_next.php", true);
            //xmlhttp.send();
            var student_id= <?php echo strval($username); ?>;
            xmlhttp.send("191995");
            


            
        }

       


        


    });
    
    
    
    
    
    </script>
</body>

</html>


<div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="text-center border rounded-0 shadow-sm profile-box" style="width: 1651px;height: 300px;background-color: #ffffff;margin: 5px;">
                        <div style="height: 84px;background-image: url(&quot;assets/img/bg-pattern.png&quot;);background-color: rgba(54,162,177,0);"></div>
                        <div><img class="rounded-circle" src="assets/img/bg-cta.jpg" width="60px" height="60px" style="background-color: rgb(255,255,255);padding: 2px;height: 100px;width: 113px;"></div>
                        <div style="height: 80px;">
                            <h4>Profile Name</h4>
                            <p style="font-size: 12px;">Course</p>
                        </div>
                    </div>
                </div>