<?php

    require '../private/autoload.php';

    $Error = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email)){
            $Error = "Please Enter A Valid Email!";
        }

        $password = $_POST['password']; 

        if($Error == ""){

            $arr['password'] = $password;
            $arr['email'] = $email;

            $query = "SELECT * FROM `users` WHERE email = :email && password = :password limit 1";
            $stmt = $connection->prepare($query);
            $check = $stmt->execute($arr);

            if($check){

                $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data) && count($data) > 0){
                    $data = $data[0];
                    $_SESSION['username'] = $data->username;
                    $_SESSION['url_address'] = $data->url_address;
                    header("Location: index.php");
                    die;    
                }
            }
        }

        $Error = "Wrong email or password";
    }

    // echo $_SESSION['username'];
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
        <div id="title">Login</div>
        <input id="textbox" type="email" name="email" required><br>
        <input id="textbox" type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    
</body>
</html>