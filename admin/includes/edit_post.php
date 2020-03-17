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
        <label for="post_category_id">Post Category</label>
        <input value="<?php echo $post_category_id ?>" type="text" class="form-control" name="post_category_id">
      </div>
      
      <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
      </div>
      <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="post_image">
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