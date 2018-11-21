<aside class="col-lg-4">
<form class="panel-group form-horizontal" action="search.php" role="form">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-header">
                <h4>Search</h4></div>
            <div class="input-group col-sm-12">
                <input type="search" name="search" class="form-control" placeholder="Search Something">
                <div class="input-group-btn">
                    <button class="btn btn-default" name="search_submit" type="submit"><i class="glyphicon glyphicon-search"> </i></button></div>
            </div>
        </div>
    </div>

</form>
<form class="panel-group form-horizontal" role="form" action="accounts/login.php" method="post">

    <div class="panel panel-default">
        <div class="panel-heading">Login Area</div>
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-sm-4" for="user_name">User Name</label>
                <div class="col-sm-8"><input name="user_name" class="form-control" type="text" id="user_name" placeholder="Insert Email"></div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4" for="password">Password</label>
                <div class="col-sm-8"><input name="password" class="form-control" type="password" id="password" placeholder="Insert Your Password"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-12"><input class="btn btn-success btn-block" type="submit" name="submit_login" value="Login"</input></div>
            </div>
        </div>
    </div>
</form>
<div class="list-group">
    <?php
    $sel_side = "SELECT * FROM posts WHERE status = 'Publish' ORDER BY id DESC LIMIT 2 ";
    $run_side = mysqli_query($conn,$sel_side);
    while($row = mysqli_fetch_assoc($run_side)){
        if(isset($_GET['post_id'])){
            if ($_GET['post_id'] == $row['id'] ) {
                $class = 'active';

            }else{
                $class = '';
            }

        }else { $class = '';}
        echo '
                            <a href="post.php?post_id='.$row['id'].'" class="list-group-item '.$class.'">
                            <div class="col-sm-4">
                            <img src="'.$row['image'].'"width="100%"></div>
                            <div class="col-sm-7">
                            <h4 class="list-group-item-heading">'.$row['title'].'</h4>
                            <p class="list-group-item-text">'.substr($row['description'],0,50).'</p></div>
                             <div style="clear: both"></div>   
                                </a>
                            ';
    }
    ?>
</div>
</aside>