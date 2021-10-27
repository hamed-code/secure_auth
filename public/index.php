<?php

require '../private/autoload.php';
$user_date = check_login($connection);

$username = "";
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="header">
        <?php if($username != ""): ?>
        <h2>Hi <?= $_SESSION['username'] ?></h2>
        <?php endif; ?>
        
        <div style="float:right">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    This is the home page.
</body>

</html>