<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';

// testmessage($connection,"connection");

if($_GET['edit']){
    $id=$_GET['edit'];
    $select="SELECT * FROM `admins` WHERE id=$id";
    $s=mysqli_query($connection,$select);
    $row=mysqli_fetch_assoc($s);


    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $password=$_POST['password'];
        $update="UPDATE `admins` set name='$name' , password=$password where id=$id";
        $i=mysqli_query($connection,$update);
        location('/admin/list.php');
    }
}




auth();
 ?>


<section class="home">
            
        <div class="container col-6">
        <div class="h1">
        <h1>Welcome at Edit Admin page</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input value="<?php $row=['name'] ?>" type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input value="<?php $row=['password'] ?>" type="password" class="form-control" name="password">
                    </div>
                    <button name="send" class="btn btn-info m-3">Update</button>
                </form>
            </div>
        </div>

    </div>
</section>


<?php
include '../public/script.php';
?>
