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
            $a = $_GET["id"];
            echo $a;
            $obj = new DB();
            $res = $obj->permem($a); //for member
            $q = mysqli_fetch_array($res);
?>
            <center>

                <head>
                    <style>
                        table {
                            overflow-y: scroll;

                            border: solid black 2px;
                            text-align: center;
                        }

                        td,
                        tr {
                            border: solid black 2px;
                            text-align: center;
                        }

                        input,
                        select {
                            width: 100%;
                        }
                    </style>
                </head>

                <body>
                    <h1>Update Details</h1>
                    <?php
                    echo "<form enctype='multipart/form-data' method='post' action='back.php?id=$a'>";
                    ?>    
                    <table>
                            <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Designation</td>
                            <td>Phone</td>
                            <td>Email</td>
                            <td>D.O.B</td>
                            
                        </tr>
                        <tr>
                            <!-- <input type='text' name='name' value='$q[1]' /> -->
                            <?php echo "<td><input type='text' name='code' value='$q[0]' /></td><td><input type='text' name='Rname' value='$q[1]' /></td><td> "; ?>
                    <select name="deg">
                    <?php $op = $obj-> updes($q[2]); $q1 = mysqli_fetch_array($op); ?>
                    <option value="<?php echo $q1[0]; ?>"><?php echo $q1[1]; ?> </option>
                    <?php
                    $h = $obj->disdes();
                    while ($di=mysqli_fetch_row($h)) {
                        if ($q1[0] != $di[0]) {
                            echo "<option value='$di[0]'>$di[1]</option>";
                        }
                    }
                    ?>
                </select>
            </td>
            <td><input type="number" name="mo" value="<?php echo $q[3]; ?>"></td>
            <td><input type="email" name="gmail" value="<?php echo $q[4]; ?>"></td>
            <td><input type="date" name="date" value="<?php echo $q[5]; ?>"></td>
            
        </tr>
                    </table>
                    <br><br><br>
                    <table>
        <tr>
        <td>Address</td>
                            <td>Photo</td>
                            <td>BG</td>
                            <td>Status</td>
                            <td>Register By</td>
                            <td>Opration</td>
                </tr>
                <tr>
                <td><input type="text" name="add" value="<?php echo $q[6]; ?>"></td>
            <td><input type="file" name="file" id="file" />
              <input type="hidden" value="<?php echo $q[7]; ?>" name="file3" id="file3">
              <img src="<?php echo "../add/$q[7]" ?>" width="50px" height="50px">
            </td>
            
            <td><input type="text" name="gb" value="<?php echo $q[8]; ?>"></td>
            <td><select name="stat">
                <option value="<?php echo $q[9]; ?>"><?php echo $q[9]; ?></option>
                <option>Select For Change</option>
                <option value="Pending">Pending</option>
                <option value="Created">Created</option>
                </select></td>
            <td><?php echo $q[10]; ?></td>
            <td><input type="submit" value="Update" /> </td>
                </tr>
    </table>
</form>
                </body>
            </center>

<?php
        }
    }
}
?>