<?php include 'db.php'?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title> CMS System</title>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../js/jquery.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
    <article class="row">
        <section class="col-lg-8">
                <?php
                if (isset($_GET['post_id'])){

                    $server = "SELECT * FROM posts WHERE id = '$_GET[post_id]'";
                    $run_sql = mysqli_query($conn,$server);
                    while ($row = mysqli_fetch_assoc($run_sql)){
                        echo '
                            <div class="panel panel-default">
                                <div class="panel-body">
                                 <div class="panel-heading">
                                    <h2>'.$row['title'].'</h2>
                                </div>
                                    <img src="'.$row['image'].'" width="100%">                             
                                    <p><br>'.$row['description'].'</p>
                                  
                                </div> 
                          </div>'; }
                }else{
                    echo '<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i> No Post You&apos;ve Selected to Show. <a href="index.php">Click Here</a> to Selecet a Post. </div>';
                }

                ?>
        </section>
        <?php include 'sidebar.php'; ?>
    </article>
</div>
        <div style="width: 50px;height: 50px;"></div>
        <?php include 'footer.php'; ?>
</body>
</html>