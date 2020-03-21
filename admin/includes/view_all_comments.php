
<div class="card">
  <div class="card-header">
    <h3>View All Comments</h3>
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


        <!-- <?php  
        // Delete posts

        if (isset($_GET['delete'])) {
          $delete_post_id = $_GET['delete'];

          $query = "DELETE FROM posts WHERE post_id = '$delete_post_id'";
          $delete_query = mysqli_query($connection, $query);
        }


        ?> -->

        <?php

        $query = "SELECT * FROM comments";
        $select_comments = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id            = $row['comment_id'];
            $comment_post_id   = $row['comment_post_id'];
            $comment_author         = $row['comment_author'];
            $comment_content          = $row['comment_content'];
            $comment_email        = $row['comment_email'];
            $comment_status         = $row['comment_status'];
            $comment_date          = $row['comment_date'];
            

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
            echo "<td>Some Title</td>";
            echo "<td>$comment_date</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id=' >Approve</a></td>";
            echo "<td><a href='posts.php?delete='>Unapprove</a></td>";
            echo "<td><a href='posts.php?delete='>Delete</a></td>";
            echo "</tr>";
        }

        ?>

        
      </tbody>
    </table>
</div>