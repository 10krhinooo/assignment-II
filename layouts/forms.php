<!DOCTYPE html>
<html lang="en">
<head>
    <title>151177</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <?php 
    class forms{

    
    public function form(){

    ?>
<div class="login-box">
    <h2>Author details</h2>
    <form method="POST" action="processes/AuthRegistration.php">
        <div class="user-box">
            <input type="text" name="Fname" required />
            <label>Fullname</label>
        </div>
        <div class="user-box">
            <input type="text" name="email" required />
            <label>Email</label>
        </div>
        <div class="user-box">
            <input type="text" name="Address" required />
            <label>Address</label>
        </div>
        
        <div class="user-box">
            <input type="date" name="DOB" required />
            <label>Date of birth</label>
        </div>
        
        <button type="submit" class="submit" name="submit">Submit</button>
    </form>
</div>
<?php 
    }
}
?>
</body>
</html>
