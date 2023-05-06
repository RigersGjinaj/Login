<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>Richieste</title>
</head>
<body class="bodyVisualizza">
    <div>
        <nav class="navbar navbar-light bg-light">
            <div class="logoVisualizza">
                <img src="../images/logo.png" class="immagine">
            </div>
            <div class="btnVisualizza">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                    Add Utente
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Aggungi un utente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="./visualizza.php" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" aria-describedby="emailHelp" name="email" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password" require>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Inserisci</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <?php

        include_once './connect.php';
        $mysql = open();

        if (!empty($_POST)) {

            $query = ('SELECT * FROM utenti WHERE email = "'.$_POST['email'].'" AND password="'.$_POST['password'].'"');
            $result = $mysql->query($query);
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                if (!empty($row)) {
                    echo '<script>alert("Utente gia presente")</script> ';
                    unset($_POST);
                }
            }else{
                $query = 'INSERT INTO utenti(email,password) VALUES ("'.$_POST['email'].'","'.$_POST["password"].'")';
                $result = $mysql->exec($query);
                echo '<script>alert("Utente aggiunto")</script>';
                unset($_POST);
            }
        }
    ?>
</body>
</html>