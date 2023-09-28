<?php
    require_once "../configs/DBConn.php";

if(isset($_POST['submit'])){

    $fullname = ucwords(strtolower($_POST["Fname"]));
    $email = strtolower($_POST["email"]);
    $address = ($_POST["Address"]);
    $biography = $_POST["biography"];
    $DOB = $_POST["DOB"];
    $status = $_POST["status"];

    

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die("Error: Invalid email");
    } 



    $insert = "INSERT INTO authorstb (Authorfullname, Authoremail, AuthorAddress,AuthorBiography, AuthorDateofBirth,AuthorSuspended) VALUES ('$fullname', '$email', '$address', '$biography', '$DOB',$status)";
    $result=mysqli_query($DBconn,$insert);
    
    if ($result) {
        header("Location: ../ViewAuthors.PHP");
        exit();
        } else{
            die("Connection failed: " . $DBconn->error);}
        
        

    
}
?>