
<?php
include("index.php");
$username = "";
$usernameError = "";
$password = "";
$passwordError = "";
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form



  $username = $_POST['Username'];
  $password = $_POST['Password'];

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }

  $sql = "SELECT id FROM user WHERE username = '$username' and password = '$password'";

  $retval = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);
  // $active = $row['active'];

  $count = mysqli_num_rows($retval);

  // If $retval matched $username and $password, table row must be 1 row

  if($count == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['login_user'] = $username;

    header("location: survey.php");
  } else {
    $error = "Your Username or Password is invalid";
  }
}
?>

<div class = "container" style = "background-color: white;">

  <h3>Login</h3>

  <form method="post" name="Form">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Username</label>
      <input class="form-control" name="Username" type="text" rows="1"></input>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Password</label>
      <input class="form-control" name="Password" type="password" rows="1"></input>
    </div>
    <input class="form-control" name="login" type="submit"> </input>
  </form>
</div>
