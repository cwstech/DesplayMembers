<?php
include 'db.php';
$str=rand();
$result = sha1($str);
// echo $result;

date_default_timezone_set('Asia/Kolkata');      
$date=date("d/m/Y h:i:sa");
// $date = date('Y-m-d H:i:s');
echo "<br><br>$date<br><br>";

$time=date("H:i");
$datetime=$date."T".$time;
echo $datetime;

$obj = new DB();
$res = $obj->dismem();
?>
<form action="1.php" method="post" enctype="multipart/form-data">
    <?php $a=mysqli_fetch_row($res);
    
    echo $a[7];
    $_SESSION['pic12'] = $a[7];
    ?>
    <input type="hidden" name="pic" id="pic" />
    <input type="file" name="test" id="test" value="<?php echo $a[7] ?>" />
    <input type="text" name="nam" />
    <input type="submit">
</form>



<?php
//------aa le-----------------



// if ($res) {
//     date_default_timezone_set('Asia/Kolkata');      
//     $date=date("Y/m/d");
//     $tim =  date("h:i:sa");
//     $action = "Register $name Account";
//     $log = $obj->log($_SESSION["uname"], $action, $date, $tim);
//     $_SESSION['temp'] = "Opration Sucess!";
//     header("Location: index.php");
// } 
?>