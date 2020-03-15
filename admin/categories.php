<?php include "includes/header.php" ?>

<body>

<div id="wrapper">

<!-- Navigation -->

<?php include "includes/nav.php" ?>




<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">
                    Categories
                    
                </h1>

                <!-- Add Ccategory -->
                <div class="col-xs-6">

                    <?php

                        if (isset($_POST['submit'])) {
                                
                            $cat_title = $_POST['cat_title'];

                            if ($cat_title == "" || empty($cat_title)) {
                                
                                echo "This field should not be empty";
                            }else{

                                $query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
                                $create_category_query = mysqli_query($connection, $query);

                                if (!$create_category_query) {
                                    die("Query failed" . mysqli_error($connection));
                                }

                            }

                        }

                    ?>
                    
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit">
                        </div>
                    </form>

                </div>


                <!-- Category Table -->
                <div class="col-xs-6">

                    <table class="table table-bordered table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Category Title</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                        // Find all categories query

                            $query = "SELECT * FROM categories";
                            $categories_table = mysqli_query($connection, $query);


                            while ($row = mysqli_fetch_assoc($categories_table)) {

                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];

                            echo "<tr>";
                            echo "<td >{$cat_id}</td>";
                            echo "<td >{$cat_title}</td>";
                            echo "<td ><a href= 'categories.php?delete={$cat_id}'>Delete</td>";
                            echo "</tr>";
                            }

                        ?>


                        <?php
                        // Delete query

                            if (isset($_GET['delete'])) {
                                $delete_cat_id = $_GET['delete'];

                                $query = "DELETE FROM categories WHERE cat_id = '{$delete_cat_id}' ";
                                $delete_query = mysqli_query($connection, $query);
                                
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

<?php include "includes/footer.php" ?>



