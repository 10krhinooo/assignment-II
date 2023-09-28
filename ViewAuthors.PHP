<?php
require_once 'configs/dbConn.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>151177</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
<body>
    <div class="container">
        <button class="text light"class="btn btn-primary"><a href="index.php">Add Author </a></button>
    </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col">FullName </th>
      <th scope="col">Address </th>
      <th scope="col">Biography </th>
      <th scope="col">DateOfBirth </th>
      <th scope="col">suspended </th>
      
    </tr>
  </thead>
  <tbody>

    <?php
    
    $sql="select * from 'authorstb'";
    $result=mysqli_query($DBconn,$sql);

    if($result ==true){
       $row=mysqli_fetch_assoc($result); 
       echo $row['AuthorID'];
        
    }
    
    ?>


    
  </tbody>
</table>
</body>
