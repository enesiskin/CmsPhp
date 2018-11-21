<?php session_start();
include '../db.php';
$login_err = '';

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
        $result = '';
        if (isset($_POST['update_category'])){
            $category = strip_tags($_POST['category']);
           // $cat_sql = "INSERT INTO category (category_name) VALUES ('$category')";
            $cat_sql = "UPDATE category SET category_name = '$category' WHERE c_id = '$_POST[cat_id]' ";
            if (mysqli_query($conn, $cat_sql));{

               $result = '<div class="alert-success alert">You&apos;ve updated a new category name &apos;'.$_POST['category'].'&apos;!</div>';
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
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
<?php include 'header.php';?>
<div style="width:50px; height: 50px;"></div>
<?php include 'left-navbar.php';?>
<div class="col-lg-10">

    <?php echo  $result; ?>
    <?php
    if(isset($_GET['cat_id'])){

                $sql = "SELECT * FROM category WHERE c_id = '$_GET[cat_id]'";
                $run = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($run)){



        ?>
        <div class="page-header"><h1>Edit Category</h1></div>
    <div class="container-fluid">
            <form class="form-horizontal col-lg-6" action="edit_category.php" method="post" >
                <input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id']; ?>">
                <div class="form-group">
                    <label for="title">Update Title</label>
                    <input id="category" type="text" name="category" class="form-control" value="<?php echo $row['category_name']; ?>">
                </div>


                <div class="form-group">
                    <input  type="submit" name="update_category" class="btn btn-block btn-info">
                </div>
            </form>
    </div>
   <?php   } }else{
        $result = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> Something is wrong ! </div>';
    } ?>
</div>
<footer></footer>

</body>

</html>




