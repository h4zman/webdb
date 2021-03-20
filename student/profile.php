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
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="color: var(--danger);height: auto;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>E-KELAS&nbsp;</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link " href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="profile.php" style="width: 226px;height: 36px;"><i class="fas fa-user"></i><span>Profile</span></a><a class="nav-link" href="Class.php" style="width: 226px;height: 36px;"><i class="fa fa-reorder"></i><span>Class</span></a></li>
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
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop-2" type="button"><i class="fas fa-bars"></i></button><a class="btn btn-sm animated-button victoria-one" href="/logout.php" style="height: 33px;width: 139px;margin: 13px;">Logout</a>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <div class="input-group-append"></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                      
                       
                          
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small" id="name"></span></a>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0"> My Profile</h3>
                    </div>
                </div>
                <div class="container-fluid">
    
                    <div class="text-left border rounded-0 shadow-sm profile-box" style="width: 1000px;height: 300px;background-color: #ffffff;margin: 10px;">
                        <div style="height: 80px;"id ="info">
                            
                        </div>
                    </div>
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


        var student_id= <?php echo strval($username);?>;

       // retrieve_data();





       


       $.ajax({
            
            url: 'assets/php/dashboard_student_info.php',
            method :"POST",
            sync: true,
            data :{student_id:student_id},
            cache: false,


    success: function(data) {
                                        
                    studentinfo = JSON.parse(data);

                    var fullname = studentinfo[0].Full_name;
                    document.getElementById("name").innerHTML = fullname;
                    console.log(fullname);

                    var address=studentinfo[0].Address;
                    var birthday =studentinfo[0].Birthday;

                    var data_info ='<h4>Name :'+fullname+'</h4><br>'+
                                     '<h4>No.matric :'+student_id+'</h4><br>'+
                                     '<h4>Birthday :'+birthday+'</h4><br>'+
                                     '<h4>Address :'+address+'</h4><br>';
                    
                document.getElementById("info").innerHTML = data_info;

                                                  
                                                                                    },
      error: function(xhr, status, error) {
                                            console.error(xhr);
                                          }
       });





      

       


        


    });
    
    
    
    
    
    </script>
</body>

</html>