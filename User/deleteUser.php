<?php
    $user_id = $_GET['id'];
    include_once "../connect_ddb.php";
    $sql = "DELETE FROM users WHERE user_id = $user_id ";
    if (mysqli_query($conn, $sql)){
        header("location:showUser.php?message=DeleteSuccess");
    }else {
        header("location:showUser.php?message=DeleteFail");
    }
?>