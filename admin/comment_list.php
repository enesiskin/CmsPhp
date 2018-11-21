<?php session_start();
include  '../db.php';

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
                    <th>Status</th>
                    <th>Delete</th>
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
                    <td><a href="#" class="btn btn-success btn-xs navbar-btn"> Approve </a></td>
                    <td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete </a></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2017-27-7</td>
                    <td>Micheal</td>
                    <td>micheal@hotmail.com </td>
                    <td>2</td>
                    <td>Nice job.</td>
                    <td><a href="#" class="btn btn-success btn-xs navbar-btn"> Approve </a></td>
                    <td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete </a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer></footer>

</body>

</html>