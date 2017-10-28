

<?php
include("index.php");
$usernameError = "";
$username = "";
$passwordError = "";
$password = "";
$organizationError = "";
$organization = "";
include("config.php");


if( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["Username"]) && !empty($_POST["Password"]) && !empty($_POST["Organization"]) ) {

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }
  else {
    echo "Connected";
  }

  if(! get_magic_quotes_gpc() ) {
    $username = addslashes ($_POST['Username']);
    $password = addslashes ($_POST['Password']);
    $organization = addslashes ($_POST['Organization']);
  } else {
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $organization = $_POST['Organization'];
  }

  echo $username;
  echo $password;
  echo $organization;

 
  

  $retval = mysql_query("INSERT INTO user (username,password,organization) VALUES ('$username','$password', '$organization')", $conn);

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  echo "Entered data successfully\n";
  mysql_close($conn);

} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["Username"])) {
  $usernameError = "Username is required";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["Password"])) {
  $passwordError = "Password is required";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["Organization"])) {
  $organizationError = "Organization name is required";
}

?>

<div class = "container" style = "background-color: white;">

  <h3>Sign up</h3>

  <form method="post" name="Form" class='my-form' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Username</label>
      <input class="form-control" name="Username" id="Username" rows="1">
      <span class="error" style="color:red;"> <?php echo $usernameError;?></span>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Password</label>
      <input class="form-control" name="Password" id="Password" type="password" rows="1"></input>
      <span class="error" style="color:red;"> <?php echo $passwordError;?></span>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Organization</label>
      <input class="form-control" name="Organization" id="Organization" type="text" rows="1"></input>
      <span class="error" style="color:red;"> <?php echo $organizationError;?></span>
    </div>
    <input class="form-control" name="register" type="submit" value="Submit"> </input>
  </form>
</div>
