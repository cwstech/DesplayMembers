<html>
    <head>
        </head>
        <body>
            <center>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <div >
  <form class="px-4 py-3" method="post" action="login.php">
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">Email address</label>
      <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="uname">
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Password</label>
      <input name="pass" type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
    </div>
    
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  
<!-- </div> -->
<!-- <form method="post" action="login.php">
    <label>Enter UserName:-</label>
    <input type="text" name="uname" placeholder="Username" required /><br><br>
    <label>Enter Password:-</label>
    <input type="password" name="pass" placeholder="Password" required /><br><br>
    <input type="submit">
</form> -->
</body>
</html>
<?php
    session_start();
if(isset($_SESSION["uname"])){
    if (time() - $_SESSION["ti"] > 600) {
        session_destroy();
    }
    header("Location: home.php");
}
?>