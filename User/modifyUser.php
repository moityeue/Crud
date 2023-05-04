<?php
    $user_id = $_GET['id'];
    if(isset($_POST['send'])){
        if(isset($_POST['username']) && 
        isset($_POST['email']) && 
        $_POST['username'] != "" && 
        $_POST['username'] != "" 
        ){
            include_once "../connect_ddb.php";
            extract($_POST);

            $sql = "UPDATE users SET username = '$username', email = '$email' WHERE user_id = $user_id";
            if (mysqli_query($conn, $sql)){
                header("location:showUser.php");
            }else{
                header("location:showUser.php?message=ModifyFail");
            }
        }else{
            header("location:showUser.php?message=EmptyFields");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include_once "../connect_ddb.php";

        //Liste des utilisteurs
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        $result = mysqli_query($conn, $sql);

        //Boucle résultats
        while($row = mysqli_fetch_assoc($result)){
            ?>
        <form action="" method="post">
            <h1>Modifier un utilisateur</h1>
            <input type="text" name="username" value="<?=$row['username']?>" placeholder="Username">
            <input type="email" name="email" value="<?=$row['email']?>" placeholder="Email">
            <input type="submit" value="Ajouter" name="send">
            <a class="link back" href="showUser.php">Annuler</a>
        </form>
        <?php
        }
        ?>
</body>
</html>