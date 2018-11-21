<?php session_start();
include '../db.php';
$login_err = '';
$result = '';
if(isset($_GET['login_error'])){
    if ($_GET['login_error'] == 'empty'){
        $login_err = '<div class="alert-danger alert">User name of Password was empty!</div>';
    }elseif ($_GET['login_error'] == 'wrong'){
        $login_err = '<div class="alert-danger alert">User name of Password was wrong!</div>';
    }
    elseif ($_GET['login_error'] == 'query_error'){
        $login_err = '<div class="alert-danger alert">There is somekind of Database ıssue!</div>';
    }
}
        if (isset($_POST['submit_category'])){
            $category = strip_tags($_POST['category']);
            $cat_sql = "INSERT INTO category (category_name) VALUES ('$category')";
            if (mysqli_query($conn, $cat_sql));{

               $result = '<div class="alert-success alert">You&apos;ve created a new category name &apos;'.$_POST['category'].'&apos;!</div>';
            }
        }


?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <script src="../../js/jquery.js"></script>
    <script src="../../bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
</head>
<body>
<?php include 'header.php';?>
<div style="width:50px; height: 50px;"></div>
<?php include 'left-navbar.php';?>
<div class="col-lg-10">
        <div class="page-header"><h1>New Category</h1></div>
    <div class="container-fluid">
            <form class="form-horizontal col-lg-6" action="new_category.php" method="post" >

                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="category" type="text" name="category" class="form-control">
                </div>


                <div class="form-group">
                    <input  type="submit" name="submit_category" class="btn btn-block btn-info">
                </div>
            </form>
    </div>
    <?php echo  $result; ?>
</div>
<footer></footer>

</body>

</html>