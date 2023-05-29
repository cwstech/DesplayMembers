<?php
session_start();
include 'db.php';
// echo $_SESSION['uname'];
if (isset($_SESSION["uname"]) == null) {
    header("Location: /");
} else {
    if (time() - $_SESSION["ti"] > 600) {
        session_destroy();
        header("Location: index.php");
    } else {
        if ($_SESSION["role"] == "admin9412") {
            $obj = new DB();
            $dis = $obj->dislog();
            
            ?>
<head>
    <style>
        body{
            color: white;
        }
        div{
            /* align-items: center; */
            overflow-y:scroll;
   height:700px;
   display:block;
        }
        tr,td,table{
            text-align: center;
            border: solid #5a5a5a 2px;
            width: 700px;
        }
        </style>
</head>
<body style="background-color: black;">
    <center>
        <h1>Log Page</h1>
        <div>

            <table>
                <tr>
                    <td style="text-align: center; border: solid #5a5a5a 2px;">Opration</td>
                    <td style="text-align: center; border: solid #5a5a5a 2px;">User</td>
                    <td style="text-align: center; border: solid #5a5a5a 2px;">DATE(YYYY-MM-DD)</td>
                    <td style="text-align: center; border: solid #5a5a5a 2px;">Time</td>
                </tr>
                <?php
        while ($ds = mysqli_fetch_row($dis)) {
            echo "<tr><td>$ds[2]</td><td>$ds[1]</td><td>$ds[3]</td><td>$ds[4]</td></tr>";
        }
        ?>
</table>
</div>
<p><a href="/RAID" >Home</a></p>
</body>
<?php

}
}
}
?>