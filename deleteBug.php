<?php
    session_start();
    $email =$_SESSION['formdata'];
    $id = $_POST['id'];

    // echo $email;
    // echo $id;

    
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
        $stmt = $conn->prepare("delete from bugs where bugID=?; "); //prevent sql injection
        $stmt->bind_param("i",$id);
        $stmt->execute();
                    
        session_start();
        $_SESSION['formdata'] = $email; //or whatever
        header('Location: bug.php');
        exit;

        }
    
?>
