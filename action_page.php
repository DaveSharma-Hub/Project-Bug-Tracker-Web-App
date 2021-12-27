<?php
    $email = $_POST['uname'];
    $password = $_POST['psw'];

    $username="";
    $password="";
    $conn= new mysqli("localhost",$username,$password,"tracker");
   

    if($conn->connect_error){
        die("Failed to connect: ".$con->connect_error);
    }else{
        $stmt = $conn->prepare("select * from login where email = ?"); //prevent sql injection
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['pass']===hash('sha256',$password)){
                echo "<h2>Login Successful</h2>";

                session_start();
                $_SESSION['formdata'] = $email; //or whatever

                 header('Location: main.php');

                exit;
            }else{
                // echo "<h2>Invalid Email or Password</h2>";
                echo "<h2>Login Failed</h2>";
                header('Location: index.html');
                exit;
            }
        }
        else{
            echo "<h2>Invalid Email or Password</h2>";

        }

    }
?>
