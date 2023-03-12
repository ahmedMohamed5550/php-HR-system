<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';



if(isset($_POST['login'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    
    $select="SELECT * FROM admins where name='$name' and password='$password'";
    $s=mysqli_query($connection,$select);

    $numofrows=mysqli_num_rows($s);
    if($numofrows == 1){
        location("/");
        $_SESSION['admin']=$name;
    }
    else{
        echo "";
    }

}


// session_unset();
// session_destroy();
// print_r($_SESSION);

 ?>


<section class="home">
            
        <div class="container col-6">
        <div class="h1">
        <h1 >Login page</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button name="login" class="btn btn-login m-3 ">login</button>
                </form>
            </div>
        </div>

    </div>
</section>



<?php
include '../public/script.php';
?>
