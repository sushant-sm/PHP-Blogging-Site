<?php include "includes/header.php"; ?>

    <div id="wrapper">

    <!-- Navigation -->
      <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                        <?php

                        if(isset($_POST['submit']))
                        {
                            $cat_title = $_POST['cat_title'];

                            if ($cat_title == "" || empty($cat_title))
                            {
                                echo "<h4>Field Is Empty</h4>";
                            }

                            else
                           {
                               $query = "INSERT INTO categories (cat_title) values ('{$cat_title}')";

                               $ins_cat = mysqli_query($connection,$query);
                               if(!$ins_cat)
                               {
                                   die("Failed To Insert".mysqli_error($connection));
                               }
                           }
                        }

                        ?>


                            <form action="" method = "post">
                                <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                            </form>

                            <form action="" method = "post">
                                <div class="form-group">
                                <label for="cat-title">Edit Category</label>

                                <?php

                                if(isset($_GET['update']))
                                {
                                    $cat_id = $_GET['update'];
                                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                    $update_category = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($update_category))
                                    {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                   

                                  ?>  
                                
                                <input value="<?php if(isset($cat_title)) { echo $cat_title; } ?>" type="text" class="form-control" name="cat_title">
                                <?php }} ?>

                                <?php   //UPDATE QUERY CATEGORY

                                if(isset($_POST['update']))
                                {
                                    $get_title = $_POST['cat_title'];
                                    $query = "UPDATE categories SET cat_title = '$get_title' WHERE cat_id = $cat_id";
                                    $update_query = mysqli_query($connection,$query);
                                    if(!$update_query)
                                    {
                                        die("Querry failed".mysqli_error($connection));
                                    }
                                }

                                ?>

                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="update" value="Update">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>

                    <?php   //Find all categories

                        $query = "SELECT * FROM categories";
                        $select_category = mysqli_query($connection, $query);
                         while($row = mysqli_fetch_assoc($select_category))
                        {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<tr>";
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href = 'categories.php?delete={$cat_id}'>Delete</a></td>";
                            echo "<td><a href = 'categories.php?update={$cat_id}'>Update</a></td>";
                            echo " </tr>";
                        }

                    ?>

                    <?php   //Delete Query

                    if(isset($_GET['delete']))
                    {
                        $delete = $_GET['delete'];
                    $query = "DELETE FROM categories WHERE cat_id = {$delete}";

                        $delete_cat = mysqli_query($connection,$query);
                        if(!$delete_cat)
                        {
                            die("Failed to delete");
                        }
                        header("Location: categories.php");
                    }

                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php"; ?>