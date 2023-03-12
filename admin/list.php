<?php
include '../public/head.php';
include '../public/nav.php';


include '../app/config.php';
include '../app/functions.php';

// testmessage($connection,"connection");

$select="SELECT * FROM admins";
$s=mysqli_query($connection,$select);



if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `admins` WHERE id=$id";
    $d=mysqli_query($connection,$delete);
    location('/admin/list.php');
}

auth();
 ?>

<section class="home">
            
        <div class="container col-6">

        <div class="h1">
        <h1>Welcome at List Admin page</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        
                        <th colspan="2">Action</th>
                    </tr>
                    <?php foreach ($s as $data) { ?>
                    <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['name'] ?></td> 
                            <td><a class="btn btn-info" href="/company/admin/edit.php?edit=<?= $data['id'] ?>">Edit</a></td>
                            <td><a onclick="return confirm('are you sure ?')" class="btn btn-danger" href="/company/admin/list.php?delete=<?= $data['id'] ?>">Remove</a></td>
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
