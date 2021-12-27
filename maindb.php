<?php
    // $email = $_POST['email'];
    // $password = $_POST['psw'];

    $connection= new mysqli("localhost","dave(2)","ensf409","tracker");
     // $conn = new PDO("mysql:host=localhost;dbname=tracker", "dave(2)", "ensf409");
     // // set the PDO error mode to exception
     // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     if($connection->connect_error){
         die("Failed to connect: ".$connection->connect_error);
     }
     //else{
         // $holder = date("Y-m-d");
         // echo $holder;
 
            //  $stmt = $conn->prepare("select * from login where email=?"); //prevent sql injection
            //  $stmt->bind_param("s",$email);
            //  $stmt->execute();
            //  $stmt_result = $stmt->get_result();
         
         
            //  if($stmt_result->num_rows > 0){
            //      $data = $stmt_result->fetch_assoc();
            //      if($data['email']===$email){
                     
            //          $loginID = $data['loginID'];
            //          $stmt = $conn->prepare("select notes from login where loginID=?"); //prevent sql injection
            //          $stmt->bind_param("i",$loginID);
            //          $stmt->execute();
            //          $stmt_result = $stmt->get_result();
            //         echo $stmt_result;
            //      }
            //  }
 
            //  $stmt_result = $stmt->get_result();
            //  $stmt->close();
            //  $conn->close();
            //  echo "<h2>Login Successful</h2>";
            //  header('Location: main.html');
            //  exit;
         //}
 
     

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> -->