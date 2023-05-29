<?php
session_start();
include "../db.php";

if (isset($_SESSION["uname"]) == null) {
    header("Location: /");
} else {
    if (time() - $_SESSION["ti"] > 600) {
        session_destroy();
        header("Location: index.php");
    } else {
        if ($_SESSION["role"] == "admin9412") {
    $code = $_GET['id'];
    echo $code;
        
    $obj = new DB();
    $naame = $obj -> permem($code);
    $res = $obj->del($code);
    // while ($ok = mysqli_fetch_row($naame)){
        if ($res) {
            $ok = mysqli_fetch_array($naame);
            date_default_timezone_set('Asia/Calcutta');      
            $date=date("Y/m/d");
            $tim =  date("h:i:sa");
            $naamee = $ok[1];
            // echo $naamee;
            // echo "done";
            $Aname = $_SESSION['uname'];
            $action = "Delete $naamee Profile(s) is Id = $code ";
            $log = $obj->log($Aname, $action, $date, $tim);
            $_SESSION['temp'] = "Opration Sucess!";
            unset($_SESSION["naam"] );
            echo $naam;
            header("Location: index.php");
        } else {
            echo ("Raju gare gayo");
        }
        }
        }
    }
// }


?>