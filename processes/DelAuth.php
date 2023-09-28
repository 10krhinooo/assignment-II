<?php
    require_once "../configs/DBConn.php";

    // Check if the author ID is provided via GET request
    if (isset($_GET['author_id'])) {
        $authorID = $_GET['author_id'];

        // Delete the author from the database
        $deleteQuery = "DELETE FROM authorstb WHERE AuthorID = ?";
        $stmt = $DBconn->prepare($deleteQuery);
        $stmt->bind_param("i", $authorID);

        if ($stmt->execute()) {
            echo "Author deleted successfully.";
        } else {
            echo "Error deleting author: " . $DBconn->error;
        }

        $stmt->close();
    }

    // Fetch all authors from the database
    $query = "SELECT * FROM authorstb";
    $result = $DBconn->query($query);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Fullname</th><th>Email</th><th>Address</th><th>Biography</th><th>Date of Birth</th><th>Status</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["AuthorID"] . "</td>";
            echo "<td>" . $row["Authorfullname"] . "</td>";
            echo "<td>" . $row["Authoremail"] . "</td>";
            echo "<td>" . $row["AuthorAddress"] . "</td>";
            echo "<td>" . $row["AuthorBiography"] . "</td>";
            echo "<td>" . $row["AuthorDateofBirth"] . "</td>";
            echo "<td>" . $row["AuthorSuspend"] . "</td>";
            echo "<td><a href=\"DelAuth.php?author_id=" . $row["AuthorID"] . "\" onclick=\"return confirm('Are you sure you want to delete this author?');\">Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No authors found in the database.";
    }

    $DBconn->close();
?>
