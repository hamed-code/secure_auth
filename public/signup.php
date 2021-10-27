<?php

    require '../private/autoload.php';

    $Error = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email)){
            $Error = "Please Enter A Valid Email!";
        }
        $date = date("Y-m-d H:i:s");
        $url_address = get_random_string(60);

        $username = trim($_POST['username']); 
        if(!preg_match("/^[a-zA-Z]+$/", $username)){
            $Error = "Please Enter A Valid UserName!";
        }

        $username = esc($username);
        $password = esc($_POST['password']); 

        if($Error == ""){
            $arr['url_address'] = $url_address;
            $arr['date'] = $date;
            $arr['username'] = $username;
            $arr['password'] = $password;
            $arr['email'] = $email;

            // $query = "INSERT INTO `users` (url_address,username,password,email,date) VALUES ('$url_address','$username','$password','$email','$date')";
            $query = "INSERT INTO `users` (url_address,username,password,email,date) VALUES (:url_address,:username,:password,:email,:date)";
            $stmt = $connection->prepare($query);
            $stmt->execute($arr);

            header("Location: login.php");
            die;    
        }
    }
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body style="font-family:sans-serif">

<style>
    form{
        margin: auto;
        border: solid thin #aaa;
        padding: 6px;
        max-width: 200px;
    }
    #title{
        background-color: blue;
        padding: 1rem;
        text-align: center;
        color: white;
    }
    #textbox{
        border: solid thin #aaa;
        margin-top: 6px;
        width: 195px;
    }
</style>

    <form method="POST">
        <div><?php if(isset($Error) && $Error != ""){ echo $Error; }?></div>
        <div id="title">Signup</div>
        <input id="textbox" type="text" name="username" required><br>
        <input id="textbox" type="email" name="email" required><br>
        <input id="textbox" type="password" name="password" required><br><br>
        <input type="submit" value="Signup">
    </form>
    
</body>
</html>