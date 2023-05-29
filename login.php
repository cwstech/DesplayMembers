<?php
session_start();
include 'db.php';
$obj = new DB();
$name = $_POST['uname'];
$pass = $_POST['pass'];
$a = $obj->in($name, $pass);
$role = null;
// echo $name;
// echo $pass;

while($acc = mysqli_fetch_row($a)){
try {
    // echo "$acc[0]<br>$acc[1]<br>$acc[2]";
        if($acc[0] != null && $acc[1] != null) {
                $_SESSION["uname"] = $acc[0];
                $_SESSION["pass"] = $acc[1];
                $_SESSION["role"] = $acc[2];
                $_SESSION["ti"] = time();
                header("Location: index.php");
    }else{
        echo "fail";
    }
} catch (Exception $e) {
    echo "fail".$e;
}
}
echo "<h1>Only For Admins Not For You!";
?>