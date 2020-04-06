<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/nav.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <h1 class="page-header">
                            BLOGS
                    
                </h1>



                <?php  

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }else{

                        $page_1 = "";
                    }

                    if ($page == "" || $page == 1) {
                        
                        $page_1 = 0;
                    }else{

                        $page_1 = ($page * 5) - 5;
                    }




                    $post_count_query = "SELECT * FROM posts"; 
                    $result = mysqli_query($connection, $post_count_query);
                    $post_count = mysqli_num_rows($result);

                    $post_count = ceil($post_count / 5);


                    $query = "SELECT * FROM posts LIMIT $page_1, 5";
                    $all_posts_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($all_posts_query)) {
                            $post_id        = $row['post_id'];
                            $post_title     = $row['post_title'];
                            $post_author    = $row['post_author'];
                            $post_date      = $row['post_date'];
                            $post_image     = $row['post_image'];
                            $post_content   = substr($row['post_content'], 0,200) ;
                            $post_status    = $row['post_status'];


                            if ($post_status == 'published') {
                                

                ?>

                        

                    <!-- First Blog Post -->

                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title; ?> </a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>

                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    </a>

                    <hr>
                    <p> <?php echo $post_content; ?> </p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                <?php   } } ?>



            </div>



            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->


       <!--  <ul class="pagination">
            
            <?php 

                for ($i=1; $i<=$post_count; $i++) { 
                    
                    echo "<li href='index.php?page=$i'>$i</li>";
                }

             ?>

        </ul> -->


  <ul class="pager justify-content-center">

    <?php 

                for ($i=1; $i<=$post_count; $i++) { 
                    
                    echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</li>";
                }

             ?>

  </ul>




        <hr>
<!-- Footer -->
<?php include "includes/footer.php"; ?>

</body>

</html>
