<?php

    require '../private/autoload.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        print_r($_POST);
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
        <div id="title">Signup</div>
        <input id="textbox" type="email" name="email" required><br>
        <input id="textbox" type="password" name="password" required><br><br>
        <input type="submit" value="Signup">
    </form>
    
</body>
</html>