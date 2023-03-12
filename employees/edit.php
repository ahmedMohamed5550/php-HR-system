<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';


$select="SELECT * FROM department";
$department=mysqli_query($connection,$select);

// testmessage($connection,"connection");



if($_GET['edit']){
    $id=$_GET['edit'];
    $select="SELECT * FROM employeeswithdepartment WHERE id=$id";
    $s=mysqli_query($connection,$select);
    $row=mysqli_fetch_assoc($s);

    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $salary=$_POST['salary'];
           // image
           if(!empty($_FILES['img']['name'])){
            $image_name=rand(0,10000).$_FILES['img']['name'];
            $tmp_name=$_FILES['img']['tmp_name'];
           $location="upload/";
           move_uploaded_file($tmp_name,$location.$image_name);
           $imagename=$row['image'];
           unlink("./upload/$imagename");
           }
           else{
            $image_name=$row['image'];
           }

           $departement_id=$_POST['departement_id'];

        $update="UPDATE `employees` set name='$name',salary='$salary',image='$image_name', department_id='$departement_id' where id=$id";
        $i=mysqli_query($connection,$update);
        location('/employees/list.php');
    }
}




auth();
 ?>


<section class="home">
            
        <div class="container col-6">
        <div class="h1">
        <h1>Welcome at Edit Employees page</h1>
        </div>
        <div class="card">
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="<?= $row['emp_name'] ?>" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <input type="text" value="<?= $row['salary'] ?>" class="form-control" name="salary">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="img">
                    </div>
                    <div class="form-group">
                        <label>departement id</label>
                        <select name="departement_id" class="form-control" >
                        <option value="<?= $row['id'] ?>"> <?= $row['dep_name'] ?> </option> 
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
