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
                            <h2>View All Comments</h2>
                        </div>
                        <div class="card-body">

                            <table class="table table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">In Response To</th>
                                    <th scope="col">Date</th>
                                    <th scope="col" colspan="4">Action</th>
                                </tr>
                                </thead>
                                <tbody>




                                <?php
                                if (isset($_GET['p_id'])){
                                $the_post_id = $_GET['p_id'];


                                $query = "SELECT * FROM comments WHERE comment_post_id ='$the_post_id' ";
                                $select_comments = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($select_comments)) {
                                    $comment_id             = $row['comment_id'];
                                    $comment_post_id        = $row['comment_post_id'];
                                    $comment_author         = $row['comment_author'];
                                    $comment_content        = $row['comment_content'];
                                    $comment_email          = $row['comment_email'];
                                    $comment_status         = $row['comment_status'];
                                    $comment_date           = $row['comment_date'];


                                    echo "<tr>";
                                    echo "<td>$comment_id</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_content</td>";

                                    // $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id' ";
                                    // $select_categories_id = mysqli_query($connection, $query);
                                    // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                    // $cat_id = $row['cat_id'];
                                    // $cat_title = $row['cat_title'];
                                    // echo "<td>$cat_title</td>";
                                    // }
                                    echo "<td>$comment_email</td>";
                                    echo "<td>$comment_status</td>";

                                    $query = "SELECT * FROM posts WHERE post_id = '$comment_post_id'";
                                    $select_post_id_query = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                                        $post_id    = $row['post_id'];
                                        $post_title = $row['post_title'];

                                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                    }

                                    echo "<td>$comment_date</td>";
                                    echo "<td><a class='btn btn-primary btn-sm' href='comments.php?approve=$comment_id' >Approve</a></td>";
                                    echo "<td><a class='btn btn-warning btn-sm' href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                                    echo "<td><a class='btn btn-danger btn-sm' href='comments.php?delete=$comment_id'>Delete</a></td>";
                                    echo "</tr>";
                                }

                                }


                                // Approve Comments

                                if (isset($_GET['approve'])) {
                                    $the_comment_id = $_GET['approve'];

                                    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = '$the_comment_id'";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: comments.php");
                                }



                                // Unapprove Comments

                                if (isset($_GET['unapprove'])) {
                                    $the_comment_id = $_GET['unapprove'];

                                    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = '$the_comment_id'";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: comments.php");
                                }



                                // Delete Comments

                                if (isset($_GET['delete'])) {
                                    $delete_comment_id = $_GET['delete'];

                                    $query = "DELETE FROM comments WHERE comment_id = '$delete_comment_id'";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: comments.php");
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



