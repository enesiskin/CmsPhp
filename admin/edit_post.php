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

//Security Area Ended //
   
    $image_err ='';
    if (isset($_POST['edit_post'])){ 
		$edit_id = $_POST['edit_id'];
        $title = strip_tags($_POST['title']);
        $date = date('Y-m-d h:i:s');
        if($_FILES['image']['name'] != '' ){
                $image_name = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $image_size = $_FILES ['image']['size'];
                $image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
                $image_path = '../images/'.$image_name.'';
                $image_db_path = 'images/'.$image_name.'';

                if ($image_size < 1000000){
                    if ($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif') {
                        if (move_uploaded_file($image_tmp,$image_path)){
                            $ins_image ="UPDATE posts SET title='".$title."', description='".$_POST['description']."', image='".$image_db_path."', category='".$_POST['category']."', status='".$_POST['status']."', date='".$date."', author='".$_SESSION['user_name']."' WHERE id='".edit_id."'";
                            if (mysqli_query($conn,$ins_image)){
                                $image_err = '<div class="alert alert-success"><i class="glyphicon glyphicon-ok"></i> Insert Complete!</div>';
                            }else{

                                $image_err= '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> The query was not working! </div>';
                            }
                        }else {
                            $image_err = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> Sory,Unfourtunately Image has not been uploaded. </div>';
                        }

                    }else { $image_err = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> Image Format was not Correct !</div>';}

                }else { $image_err = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> Image File Size is too much bigger !</div>';}
        }else{
                $ins_an_image ="UPDATE posts SET title='".$title."', description='".$_POST['description']."', image='".$image_db_path."', category='".$_POST['category']."', status='".$_POST['status']."', date='".$date."', author='".$_SESSION['user_name']."' WHERE id='".edit_id."'";
                if (mysqli_query($conn,$ins_an_image)){
                    $image_err = '<div class="alert alert-success"><i class="glyphicon glyphicon-ok"></i> Insert Complete !!!</div>';

                    }else{
                    $image_err = '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> The query was not working !!!</div>';
                }
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
<div class="col-lg-8">

            <?php
                if (isset($_GET['edit_id'])){
                    $edit_sql = "SELECT * FROM posts WHERE id = $_GET[edit_id]";
                    $run_sql = mysqli_query($conn,$edit_sql);
                    while ($row=mysqli_fetch_assoc($run_sql)){ ?>
    <div class="page-header"><h1>New Post</h1></div>
	<input type="hidden" name="edit_id" value="<?php echo $_GET['edit_id'];?>">
    <div class="container-fluid">
        <form class="form-horizontal" action="edit_post.php" method="post" enctype="multipart/form-data">
            <?php echo $image_err; ?>
            <img src="../<?php echo $row['image']; ?>" width="100px">
            <div class="form-group">
                <label for="image">Upload an Image</label>
                <input id="image" type="file" name="image" class="btn btn-primary">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category" required>
                    <option value="">Select Any Category</option>
                    <?php
                    $sel_sql= "SELECT * FROM category";
                    $run_sql = mysqli_query($conn,$sel_sql);
                    while ($c_row = mysqli_fetch_assoc($run_sql)){
                        if ($c_row['category_name'] == 'Home'){
                            continue;

                        }
                        echo '<option value="'.$c_row['category_name'].'">'.ucfirst($c_row['category_name']).'</option>';

                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="Draft">Draft</option>
                    <option value="Publish">Publish</option>

                </select>
            </div>
            <div class="form-group">
                <input  type="submit" name="edit_post" class="btn btn-block btn-info">
            </div>
        </form>
    </div>
    <?php

                    }

                }else {
                    echo '<div style="width:30px; height: 30px;"></div>  ';
                    echo '<div class="alert-danger alert">Please Select a Post Edit ! </div>';
                }


            ?>

</div>
<footer></footer>

</body>

</html>