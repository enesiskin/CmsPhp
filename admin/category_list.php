<?php
include  '../db.php';
session_start();
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
if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del_sql = "DELETE FROM category WHERE c_id = '$_GET[del_id]'";
        if (mysqli_query($conn,$del_sql)){
            $result = '<div class="alert alert-success"><i class="glyphicon glyphicon-ok"></i> Delete A Category No: '.$del_id.' From Database Succesfly ! </div>';
        }else{
            $result = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> Can&apos;t Delete A Category From Database </div>';
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
<div class="col-lg-10">
    <div style="width:50px; height: 50px;"></div>
    <?php echo $result; ?>
    <div class="col-lg-8">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4>Categories</h4>
            </div>
            <div class="panel-body">
                <table class="table table-strip">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                        $sql_cat = " SELECT * FROM category ";
                        $run_cate = mysqli_query($conn,$sql_cat);
                        $number = 1;
                        $category_n = '';
                        while ($row = mysqli_fetch_assoc($run_cate)){
                            if ($row['category_name'] == 'Home'){
                                continue;
                            }
                            else{
                                $category_n = ucfirst($row['category_name']);
                            }

                            echo '
                            <tr>
                                    <td> '.$number.'</td>
                                    <td>'.$category_n.'</td>
                                    <td><a href="edit_category.php?cat_id='.$row['c_id'].'" class="btn btn-warning btn-xs navbar-btn"> Edit </a></td>
                                    <td><a href="category_list.php?del_id='.$row['c_id'].'" class="btn btn-danger btn-xs navbar-btn">Delete </a></td>
                            </tr>';
                            $number++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer></footer>

</body>

</html>