<?php
    session_start();
    $email =$_SESSION['formdata'];
    $id = $_POST['id'];
    $desc = $_POST['desc'];


    // echo $email;
    // echo $id;

    $conn= new mysqli("localhost","dave(2)","ensf409","tracker");
    

    if($conn->connect_error){
        die("Failed to connect: ".$con->connect_error);
    }else{
        try{
        $stmt = $conn->prepare("update bugs set message = ? where bugID=?;"); //prevent sql injection
        $stmt->bind_param("si", $desc,$id);
        $stmt->execute();
                    
        session_start();
        $_SESSION['formdata'] = $email; //or whatever
        header('Location: bug.php');
        exit;
        }
        catch(Exception $e){
            echo "<h1>Sorry no such project exists<h1>";
            echo "<button type='button' class='cancelbtn' onclick='window.location.href='projects.php';'>Return</button>";
            
        }
    }
    
?>
