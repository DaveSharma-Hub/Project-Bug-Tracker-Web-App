<?php
    include 'maindb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script>

    </script>

</head>

<style>
    body {font-family: Arial, Helvetica, sans-serif;
    text-align: center;

}
* {box-sizing: border-box}
form {
    border: 3px solid #f1f1f1;
    max-width: 40%;
    display: inline-block;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: center;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

#content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
}
/* form{
    width: 50%;
    margin: 20px auto;
}
form div{
    margin-top: 5px;
} */
#img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
}
#img_div:after{
    content: "";
    display: block;
    clear: both;
}
img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
}
</style>
<body>
    <!-- <h1>HELLO TESTING</h1>
    <button type="button" class="logout" onclick="window.location.href='index.html';">Logout</button> -->
      
<!-- <div id="comments">
    
</div> -->

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
    onclick="w3_close()">Close &times;</button>
    <a href="#" class="w3-bar-item w3-button">Edit Information</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/notifications.php" class="w3-bar-item w3-button">Notifications</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/messages.php" class="w3-bar-item w3-button">Direct Message</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/projects.php" class="w3-bar-item w3-button">Projects</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/bug.php" class="w3-bar-item w3-button">Bugs</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/main.php" class="w3-bar-item w3-button">Main Page</a>
    <a href="index.html" class="w3-bar-item w3-button">Logout</a>

</div>
  
  <div id="main">
  
  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <div class="w3-container">
      <h1><b>Edit My Information<b></h1>
      
    </div>
  </div>
   
  <div class="w3-container">
  <?php
  
        session_start();
        $email =$_SESSION['formdata'];
        echo "<h1>Username: ";
        echo $email;
        echo "</h1>";

        // session_start();
        // $email =$_SESSION['formdata'];
        session_abort();

        

        // $statement = $connection->prepare("select * from login where email = ?"); //prevent sql injection
        // $statement->bind_param("s",$email);
        // $statement->execute();
        // $statement_result = $statement->get_result();
        // if($statement_result->num_rows > 0){
        //     $login = $statement_result->fetch_assoc();
        //     $statement = $connection->prepare("select * from information where loginID=?"); //prevent sql injection
        //     $statement->bind_param("i",$login['loginID']);
        //     $statement->execute();
        //     $statement_result = $statement->get_result();
        
        
        //     if($statement_result->num_rows > 0){
        //             $data = $statement_result->fetch_assoc();
        //             echo "<p>";
        //             echo "<br>";
        //             echo "Notes:";
        //             echo "<br>";
        //             echo $data['notes'];
        //             echo "</p>";
        //     }
        // } 
    ?>
  <!-- <p>In this example, the sidebar is hidden (style="display:none")</p>
  <p>It is shown when you click on the menu icon in the top left corner.</p>
  <p>When it is opened, it shifts the page content to the right.</p>
  <p>We use JavaScript to add a 25% left margin to the div element with id="main" when this happens. The value "25%" matches the width of the sidebar.</p> -->
  </div>
    <?php
    // session_start();
    $holder=$_SESSION['formdata']; //or whatever
    $_SESSION['formdata'] = $holder; 
    ?>
  <form action="http://localhost:3000/Users/Daves/Documents/Practice/tracker/newPass.php"  method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Change Password</h1>
          <p>Please type new password for this account</p>
          <hr>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
          
          <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          </label>      
          <div class="clearfix">
            <button type="submit" class="signupbtn">Update</button>
          </div>
        </div>
      </form>
    </div>

    <!-- <div id="content">
        <form method="POST" 
                action="http://localhost:3000/Users/Daves/Documents/Practice/tracker/addPhoto.php" 
                enctype="multipart/form-data">
            <input type="file" 
                    name="uploadfile" 
                    value="" />

            <div>
                <button type="submit"
                        name="upload">
                    UPLOAD
                </button>
            </div>
        </form>
    </div> -->
  
  <script>
  function w3_open() {
    document.getElementById("main").style.marginLeft = "25%";
    document.getElementById("mySidebar").style.width = "25%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
  }
  function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
  }
  </script>
  

</body>
</html>