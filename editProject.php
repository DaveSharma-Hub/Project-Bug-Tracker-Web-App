<?php
    session_start();
    $email =$_SESSION['formdata'];
    $id = $_POST['id'];
    $desc = $_POST['desc'];
    $tools = $_POST['tools'];

    $username="";
    $password="";
    $conn= new mysqli("localhost",$username,$password,"tracker");
    

    if($conn->connect_error){
        die("Failed to connect: ".$con->connect_error);
    }else{
        try{
        $stmt = $conn->prepare("update projects set projectDesc = ?, tools = ? where projectID=?;"); //prevent sql injection
        $stmt->bind_param("ssi", $desc,$tools,$id);
        $stmt->execute();
                    
        session_start();
        $_SESSION['formdata'] = $email; //or whatever
        header('Location: projects.php');
        exit;
        }
        catch(Exception $e){
            echo "<h1>Sorry no such project exists<h1>";
            echo "<button type='button' class='cancelbtn' onclick='window.location.href='projects.php';'>Return</button>";

        }
    }
    
?>
