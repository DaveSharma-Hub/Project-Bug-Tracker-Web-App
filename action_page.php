<?php
    $email = $_POST['uname'];
    $password = $_POST['psw'];
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
            if($data['pass']===hash('sha256',$password)){
                echo "<h2>Login Successful</h2>";

                // where are we posting to?
                // $url = 'http://localhost:3000/Users/Daves/Documents/Practice/tracker/main.php';

                // // what post fields?
                // $fields = array(
                // 'field1' => $email,
                // );

                // // build the urlencoded data
                // $postvars = http_build_query($fields);

                // // open connection
                // $ch = curl_init();

                // // set the url, number of POST vars, POST data
                // curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_POST, count($fields));
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);

                // // execute post
                // $result = curl_exec($ch);

                // // close connection
                // curl_close($ch);
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
