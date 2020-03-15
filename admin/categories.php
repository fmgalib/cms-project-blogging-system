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


                        <div class="col-xs-6">
                            
                            <form action="" method="">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit">
                                </div>
                            </form>

                        </div>

                        <div class="col-xs-6">

                            <table class="table table-bordered table-hover">
                              <thead class="thead-light">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Category Title</th>
                                </tr>
                              </thead>
                              <tbody>



                                <?php 

                                    $query = "SELECT * FROM categories";
                                    $categories_table = mysqli_query($connection, $query);


                                    while ($row = mysqli_fetch_assoc($categories_table)) {

                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td >{$cat_id}</td>";
                                    echo "<td >{$cat_title}</td>";
                                    echo "</tr>";
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


    
