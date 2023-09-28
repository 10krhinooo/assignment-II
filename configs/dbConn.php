
<?php
    require_once "constants.php";

    
    // $DBconn = new mysqli($servername, $username, $password, $dbname);
    
    
    // if ($DBconn->connect_error) {
    //     die("Connection failed: " . $DBconn->connect_error);
    // }
    // //echo "Connected successfully to database.";
  set_exception_handler(function($e) {
  error_log($e->getMessage());
  exit('Error connecting to the database'); 
});
$conn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
$attributes = [
  PDO::ATTR_EMULATE_PREPARES   => false, 
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
];
$pdo = new PDO($conn, $username, $password, $attributes);

?> 