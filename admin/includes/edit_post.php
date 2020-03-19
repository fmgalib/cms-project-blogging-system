<?php  

    if (isset($_GET['p_id'])) {
      $edit_post_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = '$edit_post_id' ";
    $all_posts_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($all_posts_query)) {
        $post_id            = $row['post_id'];
        $post_category_id   = $row['post_category_id'];
        $post_title         = $row['post_title'];
        $post_author        = $row['post_author'];
        $post_date          = $row['post_date'];
        $post_image         = $row['post_image'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status        = $row['post_status'];
        

      }

    if (isset($_POST['update_post'])) {
        $update_post_title    = $_POST['post_title'];
        $update_post_author   = $_POST['post_author'];
        $update_post_category = $_POST['post_category'];
        $update_post_status   = $_POST['post_status'];
        $post_image           = $_FILES['post_image']['name'];
        $post_image_temp      = $_FILES['post_image']['tmp_name'];
        $update_post_tags     = $_POST['post_tags'];
        $update_post_content  = $_POST['post_content'];
        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "UPDATE posts SET "; 
        $query .= "post_title       = '$update_post_title', ";
        $query .= "post_author      = '$update_post_author', ";
        $query .= "post_category_id = '$update_post_category', ";
        $query .= "post_status      = '$update_post_status', ";
        $query .= "post_image       = '$post_image', ";
        $query .= "post_tags        = '$update_post_tags', ";
        $query .= "post_content     = '$update_post_content' ";
        $query .= "WHERE post_id    = '$edit_post_id' ";

        $update_post_query = mysqli_query($connection, $query);
        confirm_query($update_post_query);

        header("Location: posts.php");
        

      }  

?>



<div class="card">
  <div class="card-header">
    <h3>Edit Post</h3>
  </div>
  <div class="card-body">
    
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
      </div>
      <div class="form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="post_author">
      </div>
      <div class="form-group">
        <label for="post_category">Post Category</label><br>
        <select name="post_category" id="">
          

          <?php

            $query = "SELECT * FROM categories";
            $select_categories_id = mysqli_query($connection, $query);
            confirm_query($select_categories_id);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<option value='$cat_id'>$cat_title</option>";
            
           } 

           ?>


        </select>
      </div>
      
      <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
      </div>
      <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
      </div>
      <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
      </div>
      <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" rows="5"><?php echo $post_content ?></textarea>
      </div>
      <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update">
      </div>
    </form>

  </div>
</div>