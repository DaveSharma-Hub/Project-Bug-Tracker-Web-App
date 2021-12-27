<?php
    include 'maindb.php';
    include 'projectIncluded.php';
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
    <!-- <h1>HELLO TESTING</h1>
    <button type="button" class="logout" onclick="window.location.href='index.html';">Logout</button> -->
      
<!-- <div id="comments">
    
</div> -->

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
    onclick="w3_close()">Close &times;</button>
    <a href="editInfo.php" class="w3-bar-item w3-button">Edit Information
        </a>
    <a href="notifications.php" class="w3-bar-item w3-button">Notifications</a>
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
      <h1><b>Projects<b></h1>
      <table id='myTable' class='display' style='width:100%'>
      <tr>
        <th>Project #</th>
        <th>Project ID</th>
        <th>Project Description</th>
        <th>Tools</th>
      <tr>
      <?php
        // session_start();
        // $email =$_SESSION['formdata'];

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

            $num =1;

            // echo "<table id='myTable' class='display' style='width:100%' style='margin-top:10px; margin-left:10px;'><tr>";
            // echo "<th>Project #</th><th>Project Description</th><th>Tools</th></tr><tr>";

            while($data = ($stmt_result->fetch_array())){
                   
                    
                echo "<tr>";
                echo "<td>"."Project $num"."</td>";
                echo "<td>".$data['projectID']."</td>";
                echo "<td>".$data['projectDesc']."</td>";
                echo "<td>".$data['tools']."</td>";
                echo "</tr>";
                $num=$num+1;
                }
            echo "</table>";
           
        }

    ?>
    </div>
  </div>
   
  <div class="w3-container">
  
    </div>

<div id="bottom">
    <?php
    //  session_start();
    // $holder=$_SESSION['formdata']; //or whatever
    $_SESSION['formdata'] = $email; 
    ?>

  <form action="addProject.php"  method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Add Project</h1>
          <p>Enter Project Information Below</p>
          <hr>
      
          <label for="name"><b>Project Name: </b></label>
          <input type="text" placeholder="Project Name" name="name" required>
      
          <label for="desc"><b>Project Description: </b></label>
          <input type="text" placeholder="Project Description" name="desc" required>
          
          <label for="tools"><b>Tools: </b></label>
          <input type="text" placeholder="Tools" name="tools" required>

          <label for="sd"><b>Start Date: </b></label>
          <input type="text" placeholder="Start Date" name="sd" required>

          <label for="ed"><b>End Date: </b></label>
          <input type="text" placeholder="End Date" name="ed" required>
     
          <div class="clearfix">
            <button type="submit" class="signupbtn">Add Project</button>
          </div>
        </div>
      </form>


      <form action="editProject.php"  method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Edit Project</h1>
          <p>Enter New Project Information Below</p>
          <hr>
      
          <label for="name"><b>Project ID: </b></label>
          <input type="text" placeholder="Project Name" name="id" required>
      
          <label for="desc"><b>New Project Description: </b></label>
          <input type="text" placeholder="Project Description" name="desc" required>
          
          <label for="tools"><b>New Tools: </b></label>
          <input type="text" placeholder="Tools" name="tools" required>

          <label for="sd"><b>New Start Date: </b></label>
          <input type="text" placeholder="Start Date" name="sd" required>

          <label for="ed"><b>New End Date: </b></label>
          <input type="text" placeholder="End Date" name="ed" required>
     
          <div class="clearfix">
            <button type="submit" class="signupbtn" style="width:50%">Edit Selected Project</button>
          </div>
        </div>
      </form>

      <form action="deleteProject.php"  method="post" style="border:1px solid #ccc">
        <div class="container">
          <h1>Delete Project</h1>
          <p>Delete project</p>
          <hr>
      
          <label for="name"><b>Project ID: </b></label>
          <input type="text" placeholder="Project Name" name="id" required>
     
          <div class="clearfix">
            <button type="submit" class="signupbtn" style="width:50%">Delete Selected Project</button>
          </div>
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
