<?php
    session_start();
    $email =$_SESSION['formdata'];
    $recieve = $_POST['recieve'];
    $subject =$_POST['name'];
    $msg = $_POST['desc'];

    // echo $email;
    // echo $recieve;
    // echo $subject;
    // echo $msg;
    // echo $email;
//     if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {  
//         echo 'We don\'t have mysqli!!!';  
//  } else {  
//      echo 'mysqli is installed';
//  }
    $conn= new mysqli("localhost","dave(2)","ensf409","tracker");
    

    if($conn->connect_error){
        die("Failed to connect: ".$con->connect_error);
    }else{
        $stmt = $conn->prepare("select * from login where email = ?"); //prevent sql injection
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            $fromID = $data['loginID'];

            $stmt = $conn->prepare("select * from login where email = ?"); //prevent sql injection
            $stmt->bind_param("s",$recieve);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows > 0){
                $data = $stmt_result->fetch_assoc();
                $toID = $data['loginID'];

                if($stmt_result->num_rows > 0){
                    $seen=0;
                    $stmt = $conn->prepare("insert into messages (fromID,toID,messageSubject,message,messageSeen) values (?,?,?,?,?)"); //prevent sql injection
                    $stmt->bind_param("iissi",$fromID,$toID,$subject,$msg,$seen);
                    $stmt->execute();
                    
                    session_start();
                    $_SESSION['formdata'] = $email; //or whatever
                    header('Location: main.php');
                    exit;
                }
            }
        }
    }
    
?>
