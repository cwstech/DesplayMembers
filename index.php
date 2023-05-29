<?php session_start(); ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
      function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
      </script>
      <style>
        .raju{
          padding-left: 100px;
          padding-top: 10px;
        }
        #myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
.selector-for-some-widget {
  box-sizing: content-box;
}
.card{
    position: relative;
    width: 40%;
    height: 40%;
  }
  .card-body {
    height: auto;
  }
        </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- <a class="navbar-brand" href="/"><img src="1.jpeg" height="100px"></a> -->
        <a class="navbar-brand" href="/"><img src="2.jpg" height="50px"></a>
        <h1 style="color: red" class="rak">Rakshak Group</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
          
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <!-- <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a> -->
            </li>
            <?php
              include 'db.php';
              $obj = new DB();
              $rs = $obj -> dismem();//for member
            if (isset($_SESSION["uname"]) == null) {
              // header("Location: /");
          } else {
            if (time() - $_SESSION["ti"] > 600) {
              session_destroy();
              
            }
            if ($_SESSION["role"] == "admin9412") {
              
            

?>
              <li class="nav-item">
               <a class="nav-link" href="home.php">control Panel</a>
             </li>

 <?php  } }?>
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li> -->
          </ul>
          <form class="form-inline my-2 my-lg-0" method="post">
            <label>Enter Member Code</label>
            <input class="form-control mr-sm-2" style="border-radius: 20px;" type="search" placeholder="Eg:- AB01CDE234" aria-label="Search" name="code" id="logo">
            <button onload="myFunction()" class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border-radius: 15px;" >Search</button>
          </form>
        </div>
      </nav>
      



      <center>
        <?php
        $counter = 1;
        if (isset($_POST['code']) == null) { ?>
          <div class="container">
      <div class="row">
        <div class="col-12">
        <table class="table table-image">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Photo</th>
              <th scope="col">Name</th>
              <th scope="col">Desiganation</th>
              <th scope="col">Blood Group</th>
            </tr>
          </thead>
          <tbody>
          <div id="hintPerson">
    <b>Member Info Here</b>
    </div>
        <?php  while ($ok = mysqli_fetch_row($rs)) {
            $des = $obj ->updes($ok[2]);//for desiganation
            $ok1 = mysqli_fetch_row($des);
            ?>
<tr>
  <th scope="row"><?php echo $counter; ?></th>
  <td class="w-25">
    <img src="<?php echo $ok[6]; ?>" class="img-fluid img-thumbnail" alt="Sheep" style="height: 100px" >
  </td>
  <td><?php echo $ok[1]; ?></td>
  <td><?php echo $ok1[1]; ?></td>
  <td><?php echo $ok[7]; ?></td>
</tr>

<?php
    $counter = $counter + 1;
  }
}else{
  $code = $_POST['code'];
  // echo $code;
  $rs = $obj -> permem($code);
  while ($ok = mysqli_fetch_row($rs)) {
    $des = $obj ->updes($ok[2]);//for desiganation
    
    $ok1 = mysqli_fetch_row($des);
    ?>
<center>
  <br>
  <div class="card">
    <img class="card-img-top" src="add/<?php echo $ok[6]; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $ok[1]; ?></h5>
      <p class="card-text"><?php echo $ok1[1]; ?></p>
      <p class="card-text"><small class="text-muted">Blood Group:- <b><?php echo $ok[9]; ?></b></small></p>
    </div>
  </div>
</div>
<br><br>

    <!--------------------------------------------------------------------------->
<?php
}
}

      ?>
		  </tbody>
		</table>   
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
    </html>
   
     