<?php
session_start();
$file_name = $_FILES["test"]["name"];
echo $file_name;
$pic = $_POST["pic"];
if ($file_name) {
    echo "If exe";
}else{
    // $ad = $_SESSION['pic12'];
    echo "here";
    echo $pic;
}
$nam = $_POST["nam"];

echo "$file_name<br>";
echo "$nam<br>";
?>