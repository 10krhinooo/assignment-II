<?php
// require_once "../configs/dbConn.php";

class ViewAuthor{
    public function author(){
        try {
            // Initialize the database connection
            $pdo = new PDO("mysql:host=localhost;dbname=assignment2", "root", "");

            $query = $pdo->prepare( "SELECT U_name, U_email, Address, DOB FROM users");
            $stmt = $pdo->query($query);

            echo "<h1>User Data</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Name</th><th>Email</th><th>Address</th><th>DOB</th></tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['U_name'] . "</td>";
                echo "<td>" . $row['U_email'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['DOB'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";

            // Close the database connection
            $pdo = null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
