<?php
    session_start();
    $email =$_SESSION['formdata'];
    $id = $_POST['id'];

  
    $username="";
    $password="";
    $conn= new mysqli("localhost",$username,$password,"tracker");
    

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
