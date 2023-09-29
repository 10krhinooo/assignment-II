<?php


   $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "assignment2";

    
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

try {
    if (isset($_POST['submit'])) {
        // Sanitize and validate user inputs
        $fullname = ucwords(strtolower(trim($_POST["Fname"])));
        $email = strtolower(trim($_POST["email"]));
        $address = trim($_POST["Address"]);
        $DOB = $_POST["DOB"];

        if (empty($fullname) || empty($email) || empty($address) || empty($DOB)) {
            throw new Exception("Error: All fields are required");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Error: Invalid email");
        }

        $pdo->beginTransaction();
        $insert = $pdo->prepare("INSERT INTO users (U_name, U_email, Address, DOB) VALUES (?, ?, ?, ?)");
        $result = $insert->execute([$fullname, $email, $address, $DOB]);

        if ($result) {
            $pdo->commit();
            header("Location: ../ViewAuthors.php"); // Corrected the filename case
            exit(); // Make sure to exit after redirecting
        } else {
            $pdo->rollBack();
            throw new Exception("Error: Insert failed");
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
