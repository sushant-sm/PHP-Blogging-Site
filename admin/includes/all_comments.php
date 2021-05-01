<table class="table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
            
        </tr>
    </thead>

    <tbody>
        <?php

                $query = "SELECT * FROM comments";
                $select_comments = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_assoc($select_comments))
                {
                    $comment_id = $row['comment_id'];
                   // $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_email = $row['comment_email'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];

                    echo "<tr>";
                    echo "<td>$comment_id</td>";
                    echo "<td>$comment_author</td>";
                    echo "<td>$comment_content</td>";

                    echo "<td>$comment_email</td>";
                    echo "<td>$comment_status</td>";
                    //echo "<td>Title Here</td>";
                    echo "<td>$comment_date</td>";

                    echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                    echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                    echo "<td><a href='comments.php?delete={$comment_id}'>delete</a></td>"; 
                    echo "<tr>";

                }

        ?>
        <?php   //DELETE QUERY

        if(isset($_GET['delete']))
        {
            $comment_id = $_GET['delete'];
            $query = "DELETE FROM comments WHERE comment_id= {$comment_id}";
            $delete_comment = mysqli_query($connection,$query);
            if(!$delete_comment)
            {
                die("Failed to delete".mysqli_error($delete_comment));
            }
            header("location:comments.php");
        }

        // UNAPPROVE

        if(isset($_GET['unapprove']))
        {
            $comment_id = $_GET['unapprove'];
            $query = "UPDATE comments SET comment_status = 'Unapprove' WHERE comment_id = {$comment_id}";
            $unapprove_comment = mysqli_query($connection,$query);
            if(!$unapprove_comment)
            {
                die("Failed to delete".mysqli_error($unapprove_comment));
            }
            header("location:comments.php");
        }

        //APPROVE

        if(isset($_GET['approve']))
        {
            $comment_id = $_GET['approve'];
            $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$comment_id}";
            $approve_comment = mysqli_query($connection,$query);
            if(!$approve_comment)
            {
                die("Failed to delete".mysqli_error($approve_comment));
            }
            header("location:comments.php");
        }

        ?>
                            
    </tbody>
</table>