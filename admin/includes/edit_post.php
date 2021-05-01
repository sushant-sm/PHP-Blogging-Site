<?php

    if(isset($_GET['p_id']))
    {
        global $the_post_id;
        $the_post_id = $_GET['p_id'];
        echo "<h1>$the_post_id</h1>";
    }
    // echo <h1>$the_post_id</h1>;

    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($select_posts))
    {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $post_content = $row['post_content'];
    }


   //UPDATING INFORMATION

    if(isset($_POST['update_post']))
    {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        //$post_image_temp = $_FILES['image']['temp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_category_id = $_POST['post_category_id'];

       
    // if($the_post_id)
    // {
    //     echo $the_post_id;
    // }

    $query = "UPDATE `posts` SET `post_category_id`='{$post_category_id}',`post_title`='{$post_title}',`post_author`='{$post_author}',`post_date`=now(),`post_image`='{$post_image}',`post_content`='{$post_content}',`post_tags`='{$post_tags}',`post_status`='{$post_author}' WHERE 'p_id' ";
        $update_query = mysqli_query($connection,$query);
        if(!$update_query)
        {
           // echo "FAiled To Update";
           die("Failed".mysqli_error($connection));
        }
    }


?>


<form action="posts.php?source=edit_post"  method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        
        <select name="post_category_id" id="" class="btn btn-danger">
        
            <?php

                $cat_id = $_GET['update'];
                $query = "SELECT * FROM categories";
                $select_category = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_category))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option class='dropdown-item' value='{$cat_id}'>{$cat_title}</option>";
                } 

            ?>
        
        </select>

    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="title">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="title">Post Image</label>
        <input value="<?php echo $post_image; ?>" type="file" name="image">
    </div>

    <div class="form-group">
        <label for="title">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea name="post_content" id="" cols="30" rows="10" class="form-control"><?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>

</form>