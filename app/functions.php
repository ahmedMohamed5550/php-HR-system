<?php

function testmessage($conditaion,$message){
    if($conditaion){
        echo "
        <div class='alert alert-primary col-6 mx-auto'>
        $message success
        </div>
        ";
    }
    else{
        echo "
        <div class='alert alert-danger col-6' mx-auto
        $message failed
        </div>
        ";
    }

}


function location($go){
echo "<script> location.replace('/company/$go') </script>";
}


function auth(){
    if(!$_SESSION['admin']){
        header("location:/company/admin/login.php");
    }
}

?>


