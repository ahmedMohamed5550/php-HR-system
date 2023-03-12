<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';

// testmessage($connection,"connection");

if(isset($_POST['send'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $insert="INSERT INTO `admins` VALUES(null,'$name','$password')";
    $i=mysqli_query($connection,$insert);
    location('/admin/list.php');
}
auth();
 ?>


<section class="home">
            
        <div class="container col-6">
        <div class="h1">
        <h1>Welcome at Add Admin page</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button name="send" class="btn btn-info m-3">Send Admin</button>
                </form>
            </div>
        </div>

    </div>
</section>









<?php
include '../public/script.php';
?>
