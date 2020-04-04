
<div class="card">
  <div class="card-header">
    <h2>View All Users</h2>
  </div>
  <div class="card-body">

    <table class="table table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">User Name</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Image</th>
          <th scope="col">Role</th>
          <th scope="col" colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>


        

        <?php

        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id        = $row['user_id'];
            $user_name      = $row['user_name'];
            $user_fname     = $row['user_fname'];
            $user_lname     = $row['user_lname'];
            $user_email     = $row['user_email'];
            $user_password  = $row['user_password'];
            $user_image     = $row['user_image'];
            $user_role      = $row['user_role'];
            

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$user_name</td>";
            echo "<td>$user_fname</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = '$post_category_id' ";
            // $select_categories_id = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_categories_id)) {
            // $cat_id = $row['cat_id'];
            // $cat_title = $row['cat_title'];
            // echo "<td>$cat_title</td>";
            // }
            echo "<td>$user_lname</td>";
            echo "<td>$user_email</td>";
            echo "<td>$user_password</td>";
            echo "<td><img width='100' src='../images/$user_image' alt='image'></td>";
            echo "<td>$user_role</td>";

            // $query = "SELECT * FROM posts WHERE post_id = '$comment_post_id'";
            // $select_post_id_query = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($select_post_id_query)) {
            //   $post_id    = $row['post_id'];
            //   $post_title = $row['post_title'];
            
            // echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }

            echo "<td><a href='users.php?source=edit_user&u_id=$user_id'>Edit</a></td>";
            echo "<td><a onClick=\" javascript: return confirm ('Are you sure you want to delete?'); \" href='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }



        // Delete Comments

        if (isset($_GET['delete'])) {
          $delete_user_id = $_GET['delete'];

          $query = "DELETE FROM users WHERE user_id = '$delete_user_id'";
          $delete_query = mysqli_query($connection, $query);
          header("Location: users.php");
        }


        

        ?>

        
      </tbody>
    </table>
</div>