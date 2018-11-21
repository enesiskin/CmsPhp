<?php session_start();
    include  '../db.php';

    if (isset($_SESSION['user_name']) && isset($_SESSION['password']) == true) {
        $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user_name]' AND user_password = '$_SESSION[password]' ";
        if ($run_sql = mysqli_query($conn, $sel_sql)) {
            while ($row = mysqli_fetch_assoc($run_sql)) {
                $name = $row['user_fname'].' '.$row['user_lname'];
                $job = $row['user_designation'];
                $gender = $row['user_gender'];
                $contact_no = $row['user_phone'];
				$role = $row['role'];
                if (mysqli_num_rows($run_sql) == 1) {
                    if ($row['role'] == 'admin') {
                    } else {
                        header('Location: ../index.php');
                    }
                }else {
                    header('Location: ../index.php');
                }
            }
        }
    }else {
            header('Location: ../index.php');
        }
/// Counting Post
            $p_sql= "SELECT * FROM posts WHERE  status = 'publish'";
            $run = mysqli_query($conn,$p_sql);
            $total_posts = mysqli_num_rows($run);
//// Counting Categories
            $c_sql= "SELECT * FROM category ";
            $run = mysqli_query($conn,$c_sql);
            $total_categories = mysqli_num_rows($run);

/// Counting Users
            $u_sql= "SELECT * FROM users ";
            $run = mysqli_query($conn,$u_sql);
            $total_users = mysqli_num_rows($run);

/// Counting Comments
            $co_sql= "SELECT * FROM comments ";
            $run = mysqli_query($conn,$co_sql);
            $total_comment =  mysqli_num_rows($run);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.js"></script>
</head>
<body>
<?php include 'header.php';?>
<div style="width:50px; height: 50px;"></div>
<?php include 'left-navbar.php';?>
<div class="col-lg-10">
    <div class="col-md-3">
        <div style="width: 50px; height: 50px;"></div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size: 4.5em"></i></div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 2.5em"><?php echo $total_posts; ?></div>
                        <div>Post</div>
                    </div>
                </div>
            </div>
            <a href="post_list.php">
            <div class="panel-footer">
                <div class="pull-left">View Post</div>
                <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div style="width: 50px; height: 50px;"></div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"><i class="glyphicon glyphicon-tasks" style="font-size: 4.5em"></i></div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 2.5em"><?php echo $total_categories; ?></div>
                        <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="category_list.php">
            <div class="panel-footer">
                <div class="pull-left">View Categories</div>
                <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div style="width: 50px; height: 50px;"></div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size: 4.5em"></i></div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 2.5em"><?php echo $total_users; ?></div>
                        <div>Users</div>
                    </div>
                </div>
            </div>
            <a href="#">
            <div class="panel-footer">
                <div class="pull-left">View Users</div>
                <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div style="width: 50px; height: 50px;"></div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3"><i class="glyphicon glyphicon-comment" style="font-size: 4.5em"></i></div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 2.5em"><?php echo $total_comment; ?></div>
                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment_list.php">
            <div class="panel-footer">
                <div class="pull-left">View Comments</div>
                <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>

    <!--- Üst Blok Bitiş --->
    <!--- Kulanıcı Bölümü --->
    <div class="col-lg-8">
    <div class="panel panel-warning">
        <div class="panel-heading">
           <h4>User List</h4>
        </div>
        <div class="panel-body">
            <table class="table table-strip">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Roles</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $sql= "SELECT * FROM users LIMIT 5";
                        $run = mysqli_query($conn,$sql);
                        $number= 1;
                        while ($row = mysqli_fetch_assoc($run)){
                            echo '
                                <tr>
                                    <td>'.$number.'</td>
                                    <td>'.$row['user_fname'].' '.$row['user_lname'].' </td>
                                    <td>'.ucfirst($row['role']).'</td>
                                </tr>

                            ';
                            $number++;
                            
                        }
                
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <!--- Profil Alanı --->
    <div class="col-lg-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="col-md-7">
                    <div class="page-header"><h4><?php echo $name;?> </h4> </div>
                </div>

                    <img src="../images/adminimages/image1.jpg" width="23.5%" class="img-circle">

                <div class="panel-body">
                    <table class="table table-condensed">
                        <tbody>
                        <tr>

                            <td>Role:</td>
                            <td><?php echo $role;?></td>
                        </tr>
                        <tr>

                            <td>Email:</td>
                            <td><?php echo $_SESSION['user_name'];?></td>
                        </tr>
                        <tr>
                            <td>Contact No:</td>
                            <td><?php echo $contact_no;?></td>
                        </tr>
                        <tr>

                            <td>Job:</td>
                            <td><?php echo $job;?></td>
                        </tr>
                        <tr>

                            <td>Gender:</td>
                            <td><?php echo $gender;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>




    <!--- Mesaj Listesi Başla --->

    <div class="panel panel-danger">
        <div class="panel-heading"><h3>Post List</h3></div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>İmage</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Author</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $post_sql = "SELECT * FROM posts p JOIN category c ON c.c_id = p.category WHERE p.author = '$_SESSION[user_name]' AND p.status ='publish'";
                    //$post_sql = "SELECT * FROM posts WHERE author = '$_SESSION[user_name]' AND status ='publish'";
                    $run_post = mysqli_query($conn,$post_sql);
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($run_post)){
                        echo '
                            <tr>
                                <td>'.$number.'</td>
                                <td>'.$row['date'].'</td>
                                <td> <img src="../'.$row['image'].'" width="50px"></td>
                                <td>'.$row['title'].'</td>
                                <td>'.substr($row['description'],0,50).'</td>
                                <td>'.$row['category_name'].'</td>
                                <td>'.$name.'</td>
                            </tr>
                        ';
                    $number++;
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!----- Yorum Bölümü ---->

    <div class="panel panel-info">
        <div class="panel-heading"><h3>Comment List</h3></div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Post</th>
                    <th>Comment</th>
                </tr>
                </thead>
                <tbody>
                <tr>                         
                    <td>1</td>
                    <td>2017-27-7</td>
                    <td>Micheal</td>
                    <td>micheal@hotmail.com</td>
                    <td>2</td>
                    <td>Nice job.</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2017-27-7</td>
                    <td>Micheal</td>
                    <td>micheal@hotmail.com </td>
                    <td>2</td>
                    <td>Nice job.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer></footer>
</body>
</html>