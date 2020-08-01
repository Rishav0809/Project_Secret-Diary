<?php
if(array_key_exists("email",$_POST)){
        
        // Register Section
        //If email is already registered
        if($_POST['log']=='register'){
        $query="SELECT `id` FROM `users` WHERE `email`='".$_POST["email"]."'";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result)>0){
            echo "Email address already exists";
        }
        //If registration is successful
        else{       
            $email=$_POST["email"];
            $pass=$_POST["password"];
            $query="INSERT into `users`(`email`,`password`,`message`) VALUES ('".$email."','".$pass."','')";
            $result=mysqli_query($link,$query);
            echo "Register Successful!! Login and start writing";
        }  
        }

        // Login Section
        //If email is not registered
        if($_POST['log']=='login'){
        $email=$_POST["email"];
        $pass=$_POST["password"];
        $query="SELECT `password` FROM `users` WHERE `email`='".$_POST["email"]."' LIMIT 1";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_array($result);
        if(mysqli_num_rows($result)==0){
            echo "You are not registered.Please Register.";
        }
        //If password is correct
        else if($row['password']==$_POST['password']){
            session_start();
            
            $_SESSION["username"]=$_POST["email"];
            
            header("Location: logged.php");
            
        }
        //If password is incorrect
        else{
            echo "Incorrect Password";
        }
    }    
}
?>