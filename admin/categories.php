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

                <div class="card">
                  <div class="card-header">
                    <h3>Categories</h3>
                  </div>
                  <div class="card-body">
                  
                  

                <!-- Add Ccategory -->
                <div class="col-xs-6">



                            <?php   insert_categories(); ?>


                    
                    <!-- Add category form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add">
                        </div>
                    </form>


                    <!-- Edit category form -->
                    <?php include "includes/update_category.php" ?>

                </div>


                <!-- Category Table -->
                <div class="col-xs-6">

                    <table class="table table-bordered table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Category Title</th>
                          <th scope="col" colspan="2" >Action</th>
                        </tr>
                      </thead>
                      <tbody>



                            <?php find_all_categories() ?>



                            <?php delete_categories() ?>


                      </tbody>
                    </table>

                </div>    

                
            </div>
        </div>
        <!-- /.row -->
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/footer.php" ?>



