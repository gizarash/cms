<?php  include('includes/header.php'); ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/navigation.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Categories
                        </h1>
                        <div class="col-xs-6">
                          <?php
                          insert_category();
                          update_category();
                          ?>
                          <form action="/admin/categories.php" method="post">
                            <div class="form-group">
                              <label for="cat_title">Add category</label>
                              <input class="form-control" type="text" name="title" id="cat_title">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>
                          </form>
                          <?php
                          if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $query = "SELECT * FROM categories WHERE id={$id}";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            $id = $row['id'];
                            $title = $row['title'];

                          ?>
                          <form action="/admin/categories.php" method="post">
                            <div class="form-group">
                              <label for="cat_title_edit">Edit category</label>
                              <input class="form-control" type="text" name="title" id="cat_title_edit" value="<?php echo $title; ?>">
                              <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="update" value="Update category">
                            </div>
                          </form>
                          <?php
                          }
                          ?>

                        </div>
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Delete</th>
                                <th>Edit</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = "SELECT * FROM categories";
                              $result = mysqli_query($connection, $query);
                              while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $title = $row['title'];
                              ?>
                              <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><a href="/admin/categories.php?delete=<?php echo $id; ?>">Delete</a> </td>
                                <td><a href="/admin/categories.php?edit=<?php echo $id; ?>">Edit</a> </td>
                              </tr>
                              <?php
                              }
                              ?>
                              <?php
                              if (isset($_GET['delete'])) {
                                $id = $_GET['delete'];
                                $query = "DELETE FROM categories WHERE id={$id}";
                                if(!$result = mysqli_query($connection, $query)){
                                  die('QUERY FAILED' . mysqli_error($connection));
                                }
                                header("Location: /admin/categories.php");
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

    </div>
    <!-- /#wrapper -->

<?php include('includes/footer.php'); ?>
