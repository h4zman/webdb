<?php

define('DB_USER', "id15906599_root"); // db user
define('DB_PASSWORD', "G^NG8B3s?+8^4k<0"); // db password (mention your db password here)
define('DB_DATABASE', "id15906599_ekelas"); // database name
define('DB_SERVER', "localhost"); // db server

$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
    
    if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    
  
}

date_default_timezone_set("Asia/Kuala_Lumpur");
?>