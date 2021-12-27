<?php
    include 'maindb.php';
    include 'projectIncluded.php'
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
    margin-top:40px;
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
table, th, td {
    border: 10px solid rgb(15, 118, 150);
    border-radius: 13px;
    border-width: 1px;
    height:50px;
    
}
table{
    max-width:80%;
    margin-left: 10%;
    box-shadow: 0px 0px 23px 10px rgba(153, 153, 153, 0.856);
}
</style>
<body>
    

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
    onclick="w3_close()">Close &times;</button>
    <a href="editInfo.php" class="w3-bar-item w3-button">Edit Information
        </a>
        <a href="#" class="w3-bar-item w3-button">Notifications</a>
        <a href="messages.php" class="w3-bar-item w3-button">Direct Message</a>
        <a href="projects.php" class="w3-bar-item w3-button">Projects</a>
        <a href="bug.php" class="w3-bar-item w3-button">Bugs</a>
    <a href="main.php" class="w3-bar-item w3-button">Main Page</a>
    <a href="index.html" class="w3-bar-item w3-button">Logout</a>

</div>
  
  <div id="main">
  <!-- <?php
    //session_start();    
  ?> -->
  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <div class="w3-container">
      <h1><b>New Notifications<b></h1>
      <table id='myTable' class='display' style='width:100%'>
      <tr>
        <th>Sender</th>
        <th>Message Subject</th>
        <th>Message</th>
      <tr>
      <?php
        // session_start();
        $email =$_SESSION['formdata'];

        $stmt = $connection->prepare("select * from login where email = ?"); //prevent sql injection
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            $login = $data['loginID'];

            $stmt = $connection->prepare("select * from messages where toID = ?"); //prevent sql injection
            $stmt->bind_param("i",$login);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
                

                while($information = ($stmt_result->fetch_array())){
                   

                    $stmt2 = $connection->prepare("select * from login where loginID = ?"); //prevent sql injection
                    $stmt2->bind_param("i",$information['fromID']);
                    $stmt2->execute();
                    $stmt_result2 = $stmt2->get_result();
                    if($stmt_result2->num_rows > 0){
                        $senderEmail = $stmt_result2->fetch_assoc();
                    
                        echo "<tr>";
                        echo "<td>".$senderEmail['email']."</td>";
                        echo "<td>".$information['messageSubject']."</td>";
                        echo "<td>".$information['message']."</td>";
                        echo "</tr>";
                }
              }
            } 
            echo "</table>";

    ?>
    </div>
  </div>
   
  <div class="w3-container">
  
    </div>

<div id="bottom">
    <?php
    //  session_start();
    $holder=$_SESSION['formdata']; //or whatever
    $_SESSION['formdata'] = $holder; 
    ?>
</div>

  
  
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
