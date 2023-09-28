<?php
require_once "../configs/DBConn.php";

try {
    if (isset($_POST['submit'])) {
        $fullname = ucwords(strtolower($_POST["Fname"]));
        $email = strtolower($_POST["email"]);
        $address = ($_POST["Address"]);
        $DOB = $_POST["DOB"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Error: Invalid email");
        }

        $pdo->beginTransaction();
        $insert = $pdo->prepare("INSERT INTO users (U_name, U_email, Address, DOB) VALUES (?,?,?,?)");
        $result = $insert->execute([$fullname, $email, $address, $DOB]);
        
        if ($result) {
            $pdo->commit();
             header("Location: ../ViewAuthors.PHP");
        } else {
            $pdo->rollBack();
            throw new Exception("Error: Insert failed");
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
