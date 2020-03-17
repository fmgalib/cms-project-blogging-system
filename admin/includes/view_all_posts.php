
<div class="card">
  <div class="card-header">
    <h3>View All Posts</h3>
  </div>
  <div class="card-body">

    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Author</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Status</th>
          <th scope="col">Image</th>
          <th scope="col">Tags</th>
          <th scope="col">Comments</th>
          <th scope="col">Date</th>
          <th scope="col" colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>


        <?php  
        // Delete posts

        if (isset($_GET['delete'])) {
          $delete_post_id = $_GET['delete'];

          $query = "DELETE FROM posts WHERE post_id = '$delete_post_id'";
          $delete_query = mysqli_query($connection, $query);
        }


        ?>

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

            echo "<tr>";
            echo "<td>$post_id</td>";
            echo "<td>$post_author</td>";
            echo "<td>$post_title</td>";
            echo "<td>$post_category_id</td>";
            echo "<td>$post_status</td>";
            echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
            echo "<td>$post_tags</td>";
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='' >Edit</a></td>";
            echo "<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
            echo "</tr>";
        }

        ?>

        
      </tbody>
    </table>
</div>