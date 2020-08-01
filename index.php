<?php
session_start();
include("connection.php");


if(array_key_exists("signout",$_GET)){
    session_destroy();
    unset($_GET["signout"]);
}
if(array_key_exists("username",$_SESSION) && $_SESSION["username"]!="")
{
    header("Location: logged.php");
}

include("login.php");
include("header.php");
?>

<div class="form container">
<form id="form" method="POST" >
<h1>Secret Diary</h1>
<input id="checker" type="hidden" name="log" value="login">
<div id="error"></div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
     <span id="rememberme"> <input  class="form-check-input" type="checkbox"> Remember me</span>
    </label>
  </div>
  <button id="submit" type="submit" class="btn btn-primary">Login</button>
  <a id="log" href="#">Register</a>
</form>
</div>

<?php include("footer.php"); ?>