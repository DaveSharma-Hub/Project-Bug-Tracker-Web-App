<?php
    session_start();
    $email =$_SESSION['formdata'];    

    $password = $_POST['psw'];
    $passworR = $_POST['psw-repeat'];

    if($passworR!=$password){
        echo "<h1>Passwords Dont Match</h1>";

        //sleep for 3 seconds
       
        session_start();
        $_SESSION['formdata'] = $email; //or whatever
        header('Location: editInfo.php');
    }else{

    $conn= new mysqli("localhost","dave(2)","ensf409","tracker");
    // $conn = new PDO("mysql:host=localhost;dbname=tracker", "dave(2)", "ensf409");
    // // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($conn->connect_error){
        die("Failed to connect: ".$con->connect_error);
    }else{
        // $holder = date("Y-m-d");
        // echo $holder;
        $passwordSHA = hash('sha256',$password);
        $stmt = $conn->prepare("update login set pass = ? where email=?;"); //prevent sql injection
        $stmt->bind_param("ss",$passwordSHA,$email);
        $stmt->execute();
        
        session_start();
        $_SESSION['formdata'] = $email; //or whatever
        header('Location: main.php');

    }
}
?>
