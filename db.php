<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "notes-1";

//Database Connection
$con = mysqli_connect($server, $username, $password, $database);

//Testing Connection
if(!$con){
    die('Could not Connect MySql Server:' .mysql_error());
}
/*else
{
    echo "Done";
}*/

?>