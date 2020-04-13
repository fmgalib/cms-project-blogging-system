<?php include "delete_modal.php" ?>



<?php
if (isset($_POST['checkBoxArray'])) {
  foreach ($_POST['checkBoxArray'] as $checkBoxValue_id) {
    
  $bulk_options = $_POST['bulk_options'];

  switch ($bulk_options) {

    case 'published':
      $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = '$checkBoxValue_id' ";
      $update_publish_status = mysqli_query($connection,$query);
      break;

      case 'draft':
      $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = '$checkBoxValue_id' ";
      $update_publish_status = mysqli_query($connection,$query);
      break;
      
      case 'delete':
      $query = "DELETE FROM posts WHERE post_id = '$checkBoxValue_id'";
      $delete_query = mysqli_query($connection,$query);
      break;

      case 'reset':
      $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = '$checkBoxValue_id'";
      $reset_query = mysqli_query($connection,$query);
      break;

    default:
      # code...
      break;
  }

  }
}
?>


<div class="card">
  <div class="card-header">
    <h2>View All Posts</h2>
  </div>
  <div class="card-body">

    <form action="" method="post">
    <table class="table table-hover">

      <div id="bulkOptionContainer" class="col-md-4" style="padding: 0px">
        
        <select class="form-control" name="bulk_options" id="">
          
          <option value="">Select an option</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
          <option value="delete">Delete</option>
          <option value="reset">Reset views</option>

        </select>

      </div>

      <div class="col-md-4">
        
        <input type="submit" class="btn btn-success" name="submit" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
      </div>


      <thead class="thead-dark">
        <tr>
          <th scope="col"><input type="checkbox" id="selectAllBoxes" name=""></th>
          <th scope="col">ID</th>
          <th scope="col">Author</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Status</th>
          <th scope="col">Image</th>
          <th scope="col">Tags</th>
          <th scope="col">Comments</th>
          <th scope="col">Views</th>
          <th scope="col">Date</th>
          <th scope="col" colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>


        

        <?php

        $query = "SELECT * FROM posts";
        $all_posts_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($all_posts_query)) {
            $post_id            = $row['post_id'];
            $post_category_id   = $row['post_category_id'];
            $post_title         = $row['post_title'];
            $post_author        = $row['post_author'];
            $post_date          = $row['post_date'];
            $post_image         = $row['post_image'];
            $post_tags          = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status        = $row['post_status'];
            $post_views_count   = $row['post_views_count'];

            echo "<tr>";
            ?>
            <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value='<?php echo $post_id; ?>' ></td>
            <?php
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";

            $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id' ";
            $select_categories_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<td>$cat_title</td>";
            }
            echo "<td>$post_status</td>";
            echo "<td><img width='50' src='../images/$post_image' alt='image'></td>";
            echo "<td>$post_tags</td>";


            $query = "SELECT * FROM comments WHERE comment_post_id = '$post_id'";
            $result = mysqli_query($connection, $query);
            $count_comments = mysqli_num_rows($result);


            echo "<td>$count_comments <a href='post_comments.php?p_id=$post_id' class='btn btn-primary btn-sm'>See all</a></td>";



            echo "<td>$post_views_count <a href='posts.php?reset=$post_id'>Reset</a></td>";
            echo "<td>$post_date</td>";          
            echo "<td><a class='btn btn-success btn-sm' href='posts.php?source=edit_post&p_id=$post_id' >Edit</a></td>";


            echo "<td><a rel='$post_id' href='javascript: void(0)' class='delete_link btn btn-danger btn-sm'>Delete</a></td>";


            echo "</tr>";
        }

        ?>

<!--   Delete modal Javascript     -->
        <script>

            $(document).ready(function(){
                $(".delete_link").on('click', function() {

                    var id = $(this).attr("rel");

                    var delete_url = "posts.php?delete=" + id;

                    $(".modal_delete_link").attr("href", delete_url);

                    $("#deleteModal").modal('show');


                });
            });
        </script>








        <?php  
        // Delete posts

        if (isset($_GET['delete'])) {
          $delete_post_id = $_GET['delete'];

          $query = "DELETE FROM posts WHERE post_id = '$delete_post_id'";
          $delete_query = mysqli_query($connection, $query);
          header("Location: posts.php");
        }


        // Reset views

        if (isset($_GET['reset'])) {
          $the_post_id = $_GET['reset'];

          $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =". mysqli_real_escape_string($connection, $_GET['reset'] ) . " ";
          $delete_query = mysqli_query($connection, $query);
          header("Location: posts.php");
        }


        ?>

        
      </tbody>
    </table>
    </form>
</div>