<header class="navbar  navbar-inverse navbar-static-top" >
    <div class="container">
        <a href="index.php" class="navbar-brand"> CMS System </a>
        <ul class="nav navbar-nav navbar-right">


            <?php
                if ($_SERVER['PHP_SELF'] == '/cms/contact.php'){
                    $c_class = 'active';
                }else {$c_class = '';}
                if ($_SERVER['PHP_SELF'] == '/cms/registration.php'){
                    $r_class = 'active';
                }else {$r_class = '';}


            $ser_cat= "SELECT * FROM category";
            $run_cat= mysqli_query($conn,$ser_cat);
            while ($row = mysqli_fetch_assoc($run_cat)){
                if (isset($_GET['cat_id'])){
                    if($_GET['cat_id'] == $row['c_id']){
                        $class ='active';
                    }else {$class= '';}
                }else{ $class= '';}

                if($row['category_name'] == 'Home'){
                    if ($_SERVER['PHP_SELF'] == '/cms/index.php'){
                        echo '<li class="active"><a href="index.php"> '.ucfirst($row['category_name']).'  </a> </li>';
                    }else{
                        echo '<li class=""><a href="index.php"> '.ucfirst($row['category_name']).'  </a> </li>';
                    }

                }else{echo '<li class="'.$class.'"><a href="menu.php?cat_id='.$row['c_id'].'">'.ucfirst($row['category_name']).' </a></li>';
                }


            }


            ?>
            <li class="<?php echo $c_class;?>"><a href="contact.php"> Contact Us</a></li>
            <li class="<?php echo $r_class;?>"><a href="registration.php"> Registration Page</a></li>
        </ul> </div></header>