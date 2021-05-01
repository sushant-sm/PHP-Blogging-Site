<?php
include "db.php";
if(isset($_POST['add_user']))
{
    //$user_id = $_POST['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $email = $_POST['user_email'];
    
    $query = "INSERT INTO `users`( `user_firstname`, `user_lastname`, `user_role`, `username`, `user_password`, `email`) VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_password}','{$email}')";
    //$query = "INSERT INTO users (user_firstname, user_lastname, user_role, username, user_password, email) VALUES ('{$user_firstname}',{$user_lastname},'{$user_role}','{$username}','{$user_password}','{$email}') ";
    $add_user = mysqli_query($connection,$query);
    if(!$add_user)
    {
        die("Query Failed".mysqli_error($connection));
    }
}

?>




 <form action=""  method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" -->
    
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        
        <select name="user_role" id="" class="btn btn-primary">
        
          <option value="user" class="dropdown-item">Select Role</option>
          <option value="admin" class="dropdown-item">Admin</option>
          <option value="user" class="dropdown-item">Subscriber</option>
        
        </select>

    </div>

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <!-- <div class="form-group">
        <label for="title">User Image</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Add User">
    </div>

</form>