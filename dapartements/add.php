<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';

// testmessage($connection,"connection");

if(isset($_POST['send'])){
    $name=$_POST['name'];
    $insert="INSERT INTO `department` VALUES(null,'$name',Default)";
    $i=mysqli_query($connection,$insert);
    location('/dapartements/list.php');
}
auth();
 ?>


<section class="home">
            
        <div class="container col-6">
        <div class="h1">
        <h1>Welcome at Add departement page</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <button name="send" class="btn btn-info m-3">Send departement</button>
                </form>
            </div>
        </div>

    </div>
</section>









<?php
include '../public/script.php';
?>
