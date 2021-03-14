<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../login/login.php');
    }
    $con = mysqli_connect('localhost', 'root', '', 'omegaread');
    $userid = $_SESSION['user_id'];
    if(!isset($_GET['book'])){
        header("Location: updateordelete.php");
    }
    $bookid = $_GET['bookid'];
    $book_name = $_GET['book_name'];
    $author = $_GET['author'];
    $edition = $_GET['edition'];
    $genre = $_GET['genre'];
    $description = $_GET['description'];




    
?>