<?php

session_start();

if(array_key_exists("content",$_POST) && $_POST["content"]){
        include("connection.php");
        $query="UPDATE `users` SET `message`='".$_POST["content"]."' WHERE `email`='".$_SESSION["username"]."'";
        mysqli_query($link,$query);  
}
?>