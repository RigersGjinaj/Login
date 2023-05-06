<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Login</title>
</head>
<body class="bodyLogin">
    <!------Login------->
    <div class="login-card-container">
        <div class="login-card">
            <div class="login-card-logo">
                <img src="images/logo.png" alt="logo">
            </div>
            <div class="login-card-header">
                <h1>Sign In</h1>
                <div>Please login to use the platform</div>
            </div>
            <form action="." method="post" class="login-card-form" >
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" placeholder="Enter Email" id="emailForm" name="email" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" placeholder="Enter Password" id="passwordForm" name="password" required>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <?php

                include_once 'pages/connect.php';
                $mysql = open();

                if (!empty($_POST)) {
                    $query = ('SELECT * FROM utenti WHERE email = "'.$_POST['email'].'" AND password="'.$_POST['password'].'"');
                    $result = $mysql->query($query);
                    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        if (!empty($row)) {
                            header('Location: pages/visualizza.php');
                        }
                    }else{
                        echo "<center><p style='color: #92140c'> Email o Password sbagliata </p></center>";
                    }
                }
            ?>
        </div>
    </div>

</body>
</html>