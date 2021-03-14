<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        session_unset();
        session_destroy();
        session_write_close();
        header('Location: login.php');
    }
?>