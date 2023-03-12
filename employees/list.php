<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';

// testmessage($connection,"connection");

$select="SELECT * FROM `employeeswithdepartment`";
$s=mysqli_query($connection,$select);



if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    // delete photo from folder
    $selectimage="SELECT `image` FROM `employees` WHERE id=$id";
    $runselect=mysqli_query($connection,$selectimage);
    $rowimage=mysqli_fetch_assoc($runselect);
    $image=$rowimage['image'];
    unlink("./upload/$image");
    // delete employee
    $delete="DELETE FROM `employees` WHERE id=$id";
    $d=mysqli_query($connection,$delete);
    location('/employees/list.php');
}

auth();
 ?>

<section class="home">
            
        <div class="container col-9">
            
        <div class="h1">
        <h1>Welcome at List Employees page</h1>
        </div>
        <form class="form" action="./search.php" method="get">
        <div class="row my-3">
                    <div class="col-md-10">
                        <div class="form-group">
                        <input name="namevalue" class="form-control" type="text" placeholder="search">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button name="search" class="btn">search</button>
                    </div>
                </div>
        </form>

        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>image</th>
                        <th>department_id</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php foreach ($s as $data) { ?>
                    <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['emp_name'] ?></td> 
                            <td><?= $data['salary'] ?></td> 
                            <td><img width="80" src="./upload/<?= $data['image']?>" alt=""></td>
                            <td><?= $data['dep_name']?></td> 
                            <td><a class="btn" href="/company/employees/edit.php?edit=<?= $data['id'] ?>">Edit</a></td>
                            <td><a onclick="return confirm('are you sure ?')" class="btn" href="/company/employees/list.php?delete=<?= $data['id'] ?>">Remove</a></td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
        </div>

    </div>
</section>


<?php
include '../public/script.php';
?>
