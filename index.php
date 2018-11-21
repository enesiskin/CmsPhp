<?php session_start();
include 'db.php';
    $login_err = '';
    if(isset($_GET['login_error'])){
        if ($_GET['login_error'] == 'empty'){
            $login_err = '<div class="alert-danger alert">User name or Password was empty!</div>';
        }else if ($_GET['login_error'] == 'wrong'){
                $login_err = '<div class="alert-danger alert">User name or Password was wrong!</div>';
        }
        else if ($_GET['login_error'] == 'query_error'){
            $login_err = '<div class="alert-danger alert">There is somekind of Database ıssue!</div>';
        }
    }
    $per_page = 3;
    if (isset($_GET['page'])){
    $page = $_GET['page'];
    }else{
         $page = 1;
    }
    $start_from = ($page-1) * $per_page;
?>
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
            <?php echo $login_err; ?>
            <article class="row">
                <section class="col-lg-8">
                    <?php
                            $server = "SELECT * FROM posts ORDER BY id DESC LIMIT $start_from,$per_page";
                            $run_sql = mysqli_query($conn,$server);
                            while ($row = mysqli_fetch_assoc($run_sql)){
                                echo '
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3><a href="post.php?post_id='.$row['id'].'"> '.$row['title'].'</a></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-4">
                                        <img src="'.$row['image'].'" width="100%">
                                    </div>
                                    <div class="col-lg-8">
                                        <p>'.substr($row['description'],0,350).'...</p></div>
                                    <a href="post.php?post_id='.$row['id'].'" class="btn btn-primary pull-right btn-sm">Read More</a>
                                </div> 
                          </div>'; } ?>
                </section>

                <?php include 'sidebar.php'; ?>
            </article>
            <div class="text-center">
            <ul class="pagination">
            <?php
                $pagination_sql = "SELECT * FROM posts";
                $run_pag = mysqli_query($conn,$pagination_sql);

                $count = mysqli_num_rows($run_pag);
                $total_pages = ceil($count/$per_page);

                for ($i=1;$i<= $total_pages; $i++){

                    echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                }
            ?>
                </ul>
            </div>

        </div>
         <div style="height: 50px;width: 50px;"></div>
        <?php include 'footer.php'; ?>
</body>
</html>