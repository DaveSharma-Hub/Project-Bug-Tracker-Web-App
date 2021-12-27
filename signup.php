<?php
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $passworR = $_POST['psw-repeat'];
    
    if($passworR!=$password){
        header('Location: signup.html');
        echo 'alert("Account Already Exists");';
        exit;
    }else{
    // echo $email;
//     if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {  
//         echo 'We don\'t have mysqli!!!';  
//  } else {  
//      echo 'mysqli is installed';
//  }
    $conn= new mysqli("localhost","dave(2)","ensf409","tracker");
    // $conn = new PDO("mysql:host=localhost;dbname=tracker", "dave(2)", "ensf409");
    // // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($conn->connect_error){
        die("Failed to connect: ".$con->connect_error);
    }else{
        // $holder = date("Y-m-d");
        // echo $holder;
        $passwordSHA =hash('sha256', $password);
        echo $passwordSHA;
    
        $stmt = $conn->prepare("select * from login where email = ?"); //prevent sql injection
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            //$data = $stmt_result->fetch_assoc();
          
                echo "<h2>Account Exists</h2>";
                header('Location: signup.html');
                echo 'alert("Account Already Exists");';
                exit;
            
        }else{
            $stmt = $conn->prepare("insert into login (email,pass) values (?, ?)"); //prevent sql injection
            $stmt->bind_param("ss",$email,$passwordSHA);
            $stmt->execute();

            $stmt = $conn->prepare("select * from login where email=?"); //prevent sql injection
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
        
        
            if($stmt_result->num_rows > 0){
                $data = $stmt_result->fetch_assoc();
                if($data['email']===$email){
                    
                    $loginID = $data['loginID'];
                    $stmt = $conn->prepare("insert into information (loginID) values (?)"); //prevent sql injection
                    $stmt->bind_param("i",$loginID);
                    $stmt->execute();
                }
            }

            $stmt_result = $stmt->get_result();
            $stmt->close();
            $conn->close();

            session_start();
            $_SESSION['formdata'] = $email; //or whatever
            echo "<h2>Login Successful</h2>";
            header('Location: main.php');
            exit;
        }

    }
}
?>
