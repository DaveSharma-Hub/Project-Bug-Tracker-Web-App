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
    margin-top:40px;
    border: 3px solid #f1f1f1;
    max-width: 50%;
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
.container2 {
  margin-top:0px;
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

h2{
    font-size:100;
}
h3{
    font-size:80;
}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

.containerS {
  justify-content: space-around;
  align-items: flex-start;
  border: 2px dashed rgba(114, 186, 94, 0.35);
  height: 40%;
  width: 30%;
  background: rgba(114, 186, 94, 0.05);
  display:inline-block;
}
#notification .badge {
  position: absolute;
  top: 96px;
  right: 60px;
  padding: 1px 6px;
  border-radius: 50%;
  background: red;
  color: white;
}

#edit:hover{
  font-size:20px;
  transition:0.5s ease-in-out;
}
#notification:hover{
  font-size:20px;
  transition:0.5s ease-in-out;

}
#dm:hover{
  font-size:20px;
  transition:0.5s ease-in-out;

}
#bugs:hover{
  font-size:20px;
  transition:0.5s ease-in-out;
}
#project:hover{
  font-size:20px;
  transition:0.5s ease-in-out;
}
#logout:hover{
  font-size:20px;
  transition:0.5s ease-in-out;
}
</style>
<body>
    <!-- <h1>HELLO TESTING</h1>
    <button type="button" class="logout" onclick="window.location.href='index.html';">Logout</button> -->
      
<!-- <div id="comments">
    
</div> -->
<?php
        session_start();
        $holder=$_SESSION['formdata'];
        $_SESSION['formdata'] = $holder; //or whatever
?>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
    onclick="w3_close()">Close &times;</button>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/editInfo.php" class="w3-bar-item w3-button" id="edit">Edit Information</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/notifications.php" class="w3-bar-item w3-button" id="notification">Notifications
    <?php
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
          $size=$stmt_result->num_rows;
          echo "<span class='badge'>".$size."</span>";
     }
    ?>
    </a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/messages.php" class="w3-bar-item w3-button" id="dm">Direct Message</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/projects.php" class="w3-bar-item w3-button"id="project">Projects</a>
    <a href="http://localhost:3000/Users/Daves/Documents/Practice/tracker/bug.php" class="w3-bar-item w3-button" id="bugs">Bugs</a>
    <a href="index.html" class="w3-bar-item w3-button" id="logout">Logout</a>

  </div>
  
  <div id="main">
  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <div class="w3-container">
      <!-- <h1>Check out other tools above</h1> -->
      <img src="up.png" alt="Up">
      <?php
            //   session_start();
      $email =$_SESSION['formdata'];
        echo "<h1><b>Username: ";
        echo $email;
        echo "<b></h1>";
     ?>
    </div>
  </div>
   
  <div class="w3-container">
  <?php
        // session_start();
        $email =$_SESSION['formdata'];
        session_abort();
        //////////////////
        
            $stmt = $connection->prepare("select * from login where email = ?"); //prevent sql injection
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();
            if($stmt_result->num_rows > 0){
                $data = $stmt_result->fetch_assoc();
                $login = $data['loginID'];
    
                $stmt = $connection->prepare("select * from projects where loginID = ?"); //prevent sql injection
                $stmt->bind_param("i",$login);
                $stmt->execute();
                $stmt_result = $stmt->get_result();
    
                $stmt2 = $connection->prepare("select * from bugs where loginID = ?"); //prevent sql injection
                $stmt2->bind_param("i",$login);
                $stmt2->execute();
                $stmt_result2 = $stmt2->get_result();
    
                $stmt3 = $connection->prepare("select * from messages where toID = ?"); //prevent sql injection
                $stmt3->bind_param("i",$login);
                $stmt3->execute();
                $stmt_result3 = $stmt3->get_result();
               
                $bugSize= $stmt_result2->num_rows;
                $projectSize= $stmt_result->num_rows;
                $messageSize=$stmt_result3->num_rows;
                echo "<h1>Number of projects: ".$projectSize;
                echo "<h1>Number of bugs: ".$bugSize;
                echo "<h1>Total Messages: ".$messageSize;
                echo "</h1>";
                }


        ////////////
        $statement = $connection->prepare("select * from login where email = ?"); //prevent sql injection
        $statement->bind_param("s",$email);
        $statement->execute();
        $statement_result = $statement->get_result();
        if($statement_result->num_rows > 0){
            $login = $statement_result->fetch_assoc();
            $statement = $connection->prepare("select * from information where loginID=?"); //prevent sql injection
            $statement->bind_param("i",$login['loginID']);
            $statement->execute();
            $statement_result = $statement->get_result();
        
        echo "<div class='containerS'>";
            if($statement_result->num_rows > 0){
                    $data = $statement_result->fetch_assoc();
                    echo "<h2>";
                    echo "Notes:";
                    echo "<br>";
                    echo "</h2>";
                    echo "<h3>";
                    echo $data['notes'];
                    echo "</h3>";
            }
            echo "</div>";
        } 
    ?>
  <!-- <p>In this example, the sidebar is hidden (style="display:none")</p>
  <p>It is shown when you click on the menu icon in the top left corner.</p>
  <p>When it is opened, it shifts the page content to the right.</p>
  <p>We use JavaScript to add a 25% left margin to the div element with id="main" when this happens. The value "25%" matches the width of the sidebar.</p> -->
  </div>
  <?php
    $holder =$_SESSION['formdata'];
    $_SESSION['formdata'] = $holder;
  ?>
  <form action="http://localhost:3000/Users/Daves/Documents/Practice/tracker/addNotes.php"  method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Add Notes</h1>
          <hr>
      
          <label for="note"><b>New Note</b></label>
          <input type="text" placeholder="Enter Note" name="notes" required>
          

          <div class="clearfix">
            <button type="submit" class="signupbtn">Add Note</button>
          </div>
          <br><br>
        </div>
      </form>

      <form action="http://localhost:3000/Users/Daves/Documents/Practice/tracker/deleteNotes.php"  method="post" style="border:1px solid #ccc">
        <div class="container2">
          <h1>Delete All 
            Notes</h1>
          <hr>
          
          <!-- <label for="note"><b>New Note</b></label>
          <input type="text" placeholder="Enter Note" name="notes" required> -->
          <div class="clearfix">
            <button type="submit" class="signupbtn">Delete Note</button>
          </div>
          <br><br><br><br><br>
        </div>
      </form>
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