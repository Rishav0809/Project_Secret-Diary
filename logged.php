<?php
session_start();
include("connection.php");
// user is successfully logged in
if((array_key_exists("username",$_SESSION) && $_SESSION["username"]!="")){
    
    $query="SELECT * FROM `users` WHERE `email`='".$_SESSION["username"]."'";
    $result=mysqli_query($link,$query);
    $row=mysqli_fetch_array($result);
    $diarycontent=$row["Message"];    
    $username=explode("@",$_SESSION["username"]);
}
//If user is not logged in
else{
    header("Location: index.php");    
}
include("header.php");
?>
 
    
    <div class="navigation">
    <div class="logo">Secret Diary</div>
    
    <div class="logout"><a href="index.php?signout=1"><button class="btn" id="logoutbutton">Log Out</button></a></div>
    <div class="username"><h6>Hello <span id="user"><?php echo $username[0]; ?></span></h6></div>
    </div>
    <div class="textarea"><textarea id="diarycontent"><?php echo $diarycontent ?></textarea></div>
    <?php include("footer.php");?>

    