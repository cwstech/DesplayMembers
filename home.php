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
?>

            <head>
                <style>
                    table,td,tr {
                        border: solid black 2px;
                        width: 600px;
                    }
                </style>
            </head>

            <body>
                <center>
                    <table>
                        <thead>Table for ID Cards</thead>
                        <tr>
                            <td><a href="Desi/" >Add/update Designation</a></td>
                            <td><a href="add/">Add member</a></td>
                            <td><a href="upmember/">Update Member Details</a></td>
                        </tr>
                        <tr>
                            <td>search member</td>
                            <td>Update Status</td>
                            <td><a href="log.php" >Log</a></td>
                        </tr>
                    </table>
                    <br>
                    <a href="logout.php"> <button>Logout</button></a>

        <?php    } else {
            echo "<center>Error 403! <br><h1>Forbiddan";
            session_destroy();
        }
    }
}
        ?>
            </body>