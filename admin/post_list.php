<?php session_start();
include  '../db.php';
        $result= '';
        if (isset($_SESSION['user_name']) && isset($_SESSION['password']) == true){
            $sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user_name]' AND user_password = '$_SESSION[password]' ";
            if($run_sql= mysqli_query($conn,$sel_sql)){
                if (mysqli_num_rows($run_sql) == 1){
                }else{
                    header('Location: ../index.php');
                }
            }
        }else{
            header('Location: ../index.php');
        }

        if(isset($_GET['new_status'])){
            $new_status = $_GET['new_status'];
            $sql = "UPDATE posts SET status ='$new_status' WHERE id = '$_GET[id]' ";
            if($run_sql = mysqli_query($conn,$sql)){
                $result = '<div class="alert alert-success"><i class="glyphicon glyphicon-ok"></i> Update Succes !</div>';

            }else{
                $result = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> Something is wrong ! </div>';
            }
        }
            if(isset($_GET['del_id'])){
                $del_id = $_GET['del_id'];
                $del_sql = "DELETE FROM posts WHERE id = '$del_id' ";
                if($run_sql = mysqli_query($conn,$del_sql)){
                    $result = '<div class="alert alert-success"><i class="glyphicon glyphicon-ok"></i> Delete A Row No: '.$del_id.' From Database Succesfly ! </div>';

                }else{
                    $result = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> Can&apos;t Delete A Row From Database </div>';
                }
            }

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
<div style="width:50px; height: 50px;"></div>
<div class="col-lg-10">
    <?php echo $result; ?>
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
                    <th>Status</th>
                    <th>Action</th>
                    <th>Edit Post</th>
                    <th>View Post</th>
                    <th>Delete Post</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //$sql = "SELECT * FROM posts ORDER BY ID DESC ";

                    $sql = "SELECT * FROM posts p JOIN users u ON p.author = u.user_email ORDER BY ID DESC ";
                    $run = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($run)){
                      echo '  <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['date'].'</td>
                                <td> '.($row['image'] == '' ? 'No Image'  : '<img src="../'.$row['image'].'" width="50px">' ).'</td>
                                <td>'.$row['title'].'</td>
                                <td>'.$row['category'].'</td>
                                <td> '.substr($row['description'],0,50).'...</td>
                                <td>'.$row['user_fname'].'</td>
                                <td>'.$row['status'].'</td>
                                <td>'.($row['status'] == 'Publish' ? '<a href="post_list.php?new_status=Draft&id='.$row['id'].'" class="btn btn-info btn-xs navbar-btn"> Draft</a>' : '<a href="post_list.php?new_status=Publish&id='.$row['id'].'" class="btn btn-primary btn-xs navbar-btn"> Publish</a>').' </td>
                                <td><a href="edit_post.php?edit_id='.$row['id'].'" class="btn btn-warning btn-xs navbar-btn"> Edit Post</a></td>
                                <td><a href="../post.php?post_id='.$row['id'].'" class="btn btn-success btn-xs navbar-btn">View Post</a></td>
                                <td><a href="post_list.php?del_id='.$row['id'].'" class="btn btn-danger btn-xs navbar-btn">Delete Post</a></td>
                </tr> ';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        <ul class="pagination">
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
        </ul>
    </div>

</div>
<footer></footer>

</body>
</html>