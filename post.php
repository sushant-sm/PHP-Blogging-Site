<?php
include "includes/db.php";
include "includes/header.php";
?>

    <!-- Navigation -->
<?php
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

        <?php

            if(isset($_GET['p_id']))
            {
                $the_post_id = $_GET['p_id']; 
            }

            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_all_posts = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($select_all_posts))
            {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
            

        ?>
<!-- 
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author   ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
    <?php   } ?>

                    <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="comment_save.php" method="POST">

                        <div class="form-group">
                            <label for="author">Author name :</label>
                            <input type="text" class="form-control" name="comment_author" placeholder="Author name">
                        </div>

                        <div class="form-group">
                            <label for="email">Author email :</label>
                            <input type="email" class="form-control" name="comment_email" placeholder="email">
                        </div>                   

                        <div class="form-group">
                            <label for="comment">Comment :</label>
                            <textarea class="form-control" rows="3" placeholder="Comment" name="comment_content"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name= "create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Comment PHP -->

                <?php
                    // if(isset($_POST['create_comment']))
                    // {
                    //     $the_post_id = $_GET['p_id'];
                    //     echo $_POST['author'];
                    // }
                    // include "includes/db.php";
                    // if(isset($_POST['create_comment']))
                    // {
                    //     //$the_post_id = $_GET['p_id'];
                    //     $author = $_POST['comment_author'];
                    //     $email = $_POST['comment_email'];
                    //     $comment = $_POST['comment_content'];
                    //    // echo $author;
                    //     $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES (1,'$author','$email','$comment','Approved',now())";
                    //     $result = mysqli_query($connection,$query);
                    //     if(!$result)
                    //     {
                    //         echo "Failed to comment".mysqli_error($result);
                    //     }
                    // }

                ?>

                <!-- Posted Comments -->

                <!-- Comment -->
               

                <!-- Comment -->
                

                
            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<?php

include "includes/footer.php";

?>
