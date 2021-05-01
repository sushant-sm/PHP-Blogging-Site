<?php

    include "includes/db.php";
    if(isset($_POST['create_comment']))
    {
        //$the_post_id = $_GET['p_id'];
        $author = $_POST['comment_author'];
        $email = $_POST['comment_email'];
        $comment = $_POST['comment_content'];
       // echo $author;
        $query = "INSERT INTO comments (comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ('$author','$email','$comment','Unapproved',now())";
        $result = mysqli_query($connection,$query);
        if(!$result)
        {
            echo "Failed to comment".mysqli_error($result);
        }
        header("location:index.php");
    }
    //header ("location : index.php");
   // 

?>