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
                            Welcome to Admin Panel
                            <small><?php echo $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] ; ?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php" ?>


    
