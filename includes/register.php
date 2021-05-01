<?php include "db.php"; ?>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link href="../css/register.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<div class="testbox">
  <h1>Registration</h1>

  <form action="register.php" method="post"> <hr>

    <label id="icon" for="name"><i class="icon-user"></i></label>
    <input type="text" name="firstname" id="firstname" placeholder="Firstname" required/>
    
    <label id="icon" for="name"><i class="icon-user"></i></label>
    <input type="text" name="lastname" id="lastname" placeholder="Lastname" required/>

    <label id="icon" for="name"><i class="icon-user"></i></label>
    <input type="text" name="username" id="username" placeholder="username" required/>

    <label id="icon" for="name"><i class="icon-shield"></i></label>
    <input type="password" name="password" id="password" placeholder="Password" required/>

    <label id="icon" for="name"><i class="icon-envelope "></i></label>
    <input type="text" name="email" id="email" placeholder="Email" required/>
    <br><br>
  <center><input type="submit" class="btn btn-primary" value="Register" name="register" ></center> 
    <br> <br>
  </form>
</div>

<?php

if(isset($_POST['register']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "INSERT INTO `users`( `user_firstname`, `user_lastname`, `user_role`, `username`, `user_password`, `email`) VALUES ('{$firstname}','{$lastname}','subscriber','{$username}','{$password}','{$email}')";
   
    $add_user = mysqli_query($connection,$query);
    if(!$add_user)
    {
        die("Query Failed".mysqli_error($connection));
    }
    header("Location: ../index.php");
}

?>