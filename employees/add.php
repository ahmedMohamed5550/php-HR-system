<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';

// testmessage($connection,"connection");

//  select data
$select="SELECT * FROM department";
$department=mysqli_query($connection,$select);




if(isset($_POST['send'])){
    $name=$_POST['name'];
    $salary=$_POST['salary'];
    $departement_id=$_POST['departement_id'];

    // image
    $image_name=rand(0,10000).$_FILES['img']['name'];
    $tmp_name=$_FILES['img']['tmp_name'];
    $location="upload/";
    move_uploaded_file($tmp_name,$location.$image_name);

    // insert
    $insert="INSERT INTO `employees` VALUES(null,'$name',$salary,Default,$departement_id,'$image_name')";
    $i=mysqli_query($connection,$insert);
    location('/employees/list.php');
}


// print_r($_FILES);
auth();
 ?>


<section class="home">
            
        <div class="container col-6">
        <div class="h1">
        <h1>Welcome at Add Employees page</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" class="form-control" name="salary">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="img">
                    </div>
                    <div class="form-group">
                        <label>departement_id</label>
                        <select name="departement_id" class="form-control" >
                        <?php foreach($department as $data) : ?>
                            <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>                          
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <button name="send" class="btn btn-info m-3">Send employees</button>
                </form>
            </div>
        </div>

    </div>
</section>









<?php
include '../public/script.php';
?>
