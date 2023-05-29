<?php
session_start();
include '../db.php';
if (isset($_SESSION["uname"]) == null) {
    header("Location: /");
} else {
    if (time() - $_SESSION["ti"] > 600) {
        session_destroy();
        header("Location: index.php");
    } else {
        if ($_SESSION["role"] == "admin9412") {
            $obj = new DB();
            $res = $obj -> dismem();//for member
            ?>
            <head>
                    <style>
                    table{
                        overflow-y:scroll;
                        
                        border: solid black 2px;
                        text-align: center;
                    }
                    td,
                    tr {
                        border: solid black 2px;
                        text-align: center;
                    }
                    input,select{
                        width: 100%;
                    }
                    img{
                        width: 50px;
                        height: 50px;
                    }
                </style>
            </head>
            <center>
            <body>
                <p style="text-align: right;"><a href="/" >Goto Home</a></p>
                <h1>All Member Are Display Here</h1>
                <table>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Designation</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>D.O.B</td>
                        <td>Address</td>
                        <td>Photo</td>
                        <td>BG</td>
                        <td>Status</td>
                        <td>Register By</td>
                        <td>Opration</td>
                    </tr>
<?php
while ($ok = mysqli_fetch_row($res)) {
    $des = $obj ->updes($ok[2]);//for desiganation
    $ok1 = mysqli_fetch_row($des);
    $naam = $_SESSION['naam'] = $ok[1];
    echo "<tr><td>$ok[0]</td><td>$naam</td><td>$ok1[1]</td><td>$ok[3]</td><td>$ok[4]</td><td>$ok[5]</td><td>$ok[6]</td><td><img src='../add/$ok[7]' /></td><td>$ok[8]</td><td>$ok[9] </td><td>$ok[10]</td><td><a href='update.php?id=$ok[0]' >Update</a><br><br><a href='delete.php?id=$ok[0]' >Delete</a></td></tr>";

}
if (isset($_SESSION['temp'])) {
    echo $_SESSION['temp'];
    unset($_SESSION['temp']);
}
?>

                </table>
            </body>

<?php
        }
    }
}
?>