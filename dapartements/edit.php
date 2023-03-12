<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';

// testmessage($connection,"connection");

if($_GET['edit']){
    $id=$_GET['edit'];
    $select="SELECT * FROM department WHERE id=$id";
    $s=mysqli_query($connection,$select);
    $row=mysqli_fetch_assoc($s);


    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $update="UPDATE `department` set name='$name' where id=$id";
        $i=mysqli_query($connection,$update);
        location('/dapartements/list.php');
    }
}




auth();
 ?>


<section class="home">
            
        <div class="container col-6">
        <div class="h1">
        <h1>Welcome at Edit departement page</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input value="<?php $row=['name'] ?>" type="text" class="form-control" name="name">
                    </div>
                    <button name="send" class="btn btn-info m-3">Update departement name</button>
                </form>
            </div>
        </div>

    </div>
</section>


<?php
include '../public/script.php';
?>
