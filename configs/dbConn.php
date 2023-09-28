
<?php
    require_once "constants.php";

    
    
$conn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
$attributes = [
  PDO::ATTR_EMULATE_PREPARES   => false, 
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
];
try{
$pdo = new PDO($conn, $username, $password, $attributes);
} catch (PDOException $e){
   error_log($e->getMessage());
  exit('Error connecting to the database'); 
}


?> 