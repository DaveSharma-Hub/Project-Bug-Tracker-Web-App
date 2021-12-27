<?php
    session_start();
    $email =    $_SESSION['formdata'];
    $note = $_POST['notes'];
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
        $stmt = $conn->prepare("select * from login where email = ?"); //prevent sql injection
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            $login = $data['loginID'];
            $stmt = $conn->prepare("select * from information where loginID = ?"); //prevent sql injection
            $stmt->bind_param("i",$login);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
                if($stmt_result->num_rows > 0){
                    $tmpdata = $stmt_result->fetch_assoc();
                    $insertingData =$tmpdata['notes'] ."\n". $note;

                    $stmt = $conn->prepare("update information set notes = ? where loginID=?;"); //prevent sql injection
                    $stmt->bind_param("si",$insertingData,$login);
                    $stmt->execute();
                    
                    session_start();
                    $_SESSION['formdata'] = $email; //or whatever
                    header('Location: main.php');
                    exit;
                }
            }
        }
    
?>
