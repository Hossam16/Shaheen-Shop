<?php
class config
{
 function datacon(){
 $db_username = 'root';
 $db_password = 'z.8<%o?SVROIopQ.';
 $db_name = 'shaheen_shaheen';
 $db_host = 'localhost';

 	return $conn= new mysqli($db_host, $db_username, $db_password, $db_name);
 }

public function CheckConn(){
	if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

}

}


?>
