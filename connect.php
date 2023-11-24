<?php
$servername = "localhost"; //Server name (usually "localhost" when using XAMPP)
$username = "root";     // MySQL username (default is "root" in XAMPP)
$password = "";         // MySQL password (default is empty in XAMPP)
$dbname = "todo_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
   die($conn->connect_error);
}

 
 
 // Close the connection when done
 //$conn->close();


?>