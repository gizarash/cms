<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                if (isset($_POST['search'])) {
                  $search = $_POST['search'];
                  $query = "SELECT * FROM posts WHERE tags LIKE '%$search%' OR content LIKE '%$search%'";
                  $result = mysqli_query($connection, $query);
                  if (!result) {
                    die("QUERY FAILED " . mysqli_error($connection));
                  }
                  $count = mysqli_num_rows($result);
                  if ($count == 0) {
                    echo "<h1>No result</h1>";
                  } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                      $title = $row['title'];
                      $content = $row['content'];
                ?>

                <h2>
                    <a href="#"><?php echo $title; ?></a>
                </h2>
                <?php echo $content; ?>
                <hr>
                <?php
                    }
                  }
                }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>
<!-- Footer -->
<?php include "includes/footer.php" ?>
