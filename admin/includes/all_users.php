<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Make Admin</th>
            <th>Make Subscriber</th>
            <th>Delete User</th>
            
        </tr>
    </thead>

    <tbody>
        <?php

                $query = "SELECT * FROM users";
                $select_users = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_users))
                {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['email'];
                   // $user_email = $row['user_image'];
                    $user_role = $row['user_role'];
                   // $comment_date = $row['comment_date'];

                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td> $username</td>";
                    echo "<td>$user_firstname</td>";

                    echo "<td>$user_lastname</td>";
                    echo "<td> $user_email</td>";
                    echo "<td>$user_role</td>";
                   // echo "<td>$comment_date</td>";

                    echo "<td><a href='users.php?make_admin={$user_id}'>Make Admin</a></td>";
                    echo "<td><a href='users.php?make_sub={$user_id}'>Make Subscriber</a></td>";
                    echo "<td><a href='users.php?delete={$user_id}'>delete</a></td>"; 
                    echo "<tr>";

                }

        ?>
        <?php   //DELETE QUERY

        if(isset($_GET['delete']))
        {
            $user_id = $_GET['delete'];
            $query = "DELETE FROM users WHERE user_id= {$user_id}";
            $delete_user = mysqli_query($connection,$query);
            if(!$delete_user)
            {
                die("Failed to delete".mysqli_error($delete_user));
            }
            header("location:users.php");
        }

        // UNAPPROVE

        if(isset($_GET['make_admin']))
        {
            $user_id = $_GET['make_admin'];
            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id}";
            $make_admin = mysqli_query($connection,$query);
            if(!$make_admin)
            {
                die("Failed to change Role".mysqli_error($make_admin));
            }
            header("location:users.php");
        }

        //APPROVE

        if(isset($_GET['make_sub']))
        {
            $user_id = $_GET['make_sub'];
            $query = "UPDATE users SET user_role = 'Subsriber' WHERE user_id = {$user_id}";
            $make_sub = mysqli_query($connection,$query);
            if(!$make_sub)
            {
                die("Failed to change Role".mysqli_error($make_sub));
            }
            header("location:users.php");
        }

        ?>
                            
    </tbody>
</table>