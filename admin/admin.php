 <?php
    session_start();



    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 </head>

 <body>

     <?php include("../include/header.php"); ?>

     <div class="container-fluid">
         <div class="row">
             <div class="col-md-2" style="margin-left: -30px;">
                 <?php
                    include("sidenav.php");
                    include("../include/connection.php");
                    ?>
             </div>

             <div class="col-md-10">
                 <div class="row">
                     <!-- Admin List -->
                     <div class="col-md-6">
                         <h5 class="text-center">All Admin</h5>

                         <?php
                            $ad = isset($_SESSION['admin']) ? $_SESSION['admin'] : null;
                            $query = "SELECT * FROM admin WHERE username != '$ad'";
                            $res = mysqli_query($connect, $query);

                            $output = "<table class='table table-bordered'>
                      <tr>
                          <th>ID</th>
                          <th>Username</th>
                          <th style='width: 10%;'>Action</th>
                      </tr>";

                            if (mysqli_num_rows($res) < 1) {
                                $output .= "<tr><td colspan='3' class='text-center'>No New Admin</td></tr>";
                            } else {
                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['id'];
                                    $username = $row['username'];

                                    $output .= "
                  <tr>
                      <td>$id</td>
                      <td>$username</td>
                      <td>
                        <a href='admin.php?id=$id' onclick=\"return confirm('Are you sure you want to delete this admin?');\">
                          <button class='btn btn-danger'>Remove</button>
                        </a>
                      </td>
                  </tr>";
                                }
                            }

                            $output .= "</table>";
                            echo $output;

                            // Delete Admin 
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $query = "DELETE FROM admin WHERE id='$id'";
                                mysqli_query($connect, $query);
                                header("Location: admin.php");
                                exit();
                            }
                            ?>
                     </div>

                     <!-- Add Admin -->
                     <div class="col-md-6">
                         <?php
                            $show = "";

                            if (isset($_POST['add'])) {
                                $uname = $_POST['uname'];
                                $pass = $_POST['pass'];
                                $image = $_FILES['img']['name'];
                                $tmp_name = $_FILES['img']['tmp_name'];

                                $error = [];

                                if (empty($uname)) {
                                    $error['u'] = "Enter Admin Username";
                                } else if (empty($pass)) {
                                    $error['u'] = "Enter Admin Password";
                                } else if (empty($image)) {
                                    $error['u'] = "Add Admin Picture";
                                }

                                if (count($error) == 0) {
                                    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

                                    // Ensure  existence of image folder  
                                    $imgPath = __DIR__ . "/img/";
                                    if (!is_dir($imgPath)) {
                                        mkdir($imgPath, 0777, true);
                                    }

                                    $q = "INSERT INTO admin(username, password, profile) VALUES ('$uname', '$hashed_pass', '$image')";
                                    $result = mysqli_query($connect, $q);

                                    if ($result) {
                                        move_uploaded_file($tmp_name, $imgPath . $image);
                                        $show = "<h5 class='text-center alert alert-success'>Admin Added Successfully</h5>";
                                    } else {
                                        $show = "<h5 class='text-center alert alert-danger'>Failed to Add Admin</h5>";
                                    }
                                } else {
                                    $show = "<h5 class='text-center alert alert-danger'>{$error['u']}</h5>";
                                }
                            }
                            ?>

                         <h5 class="text-center">Add Admin</h5>

                         <form method="post" enctype="multipart/form-data">
                             <div><?php echo $show; ?></div>

                             <div class="form-group">
                                 <label>Username</label>
                                 <input type="text" name="uname" class="form-control" autocomplete="off">
                             </div>

                             <div class="form-group">
                                 <label>Password</label>
                                 <input type="password" name="pass" class="form-control">
                             </div>

                             <div class="form-group">
                                 <label>Add Admin Picture</label>
                                 <input type="file" name="img" class="form-control">
                             </div><br>

                             <input type="submit" name="add" value="Add New Admin" class="btn btn-success">
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </body>

 </html>