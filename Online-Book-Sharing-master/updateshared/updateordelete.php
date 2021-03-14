<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../login/login.php');
    }
    $con = mysqli_connect('localhost', 'root', '', 'omegaread');
    $userid = $_SESSION['user_id'];

    if(!isset($_POST['update']) && !isset($_POST['delete'])){
        header("Location: updateshared.php");
    }

    if(isset($_POST['delete'])){
        $bookid = $_POST['delete'];
        $query = "delete from books where book_id = '$bookid'";
        mysqli_query($con, $query);
        header("Location: updateshared.php");
    }
    else if(isset($_POST['update'])){
        $bookid = $_POST['update'];
        $query = "select book_name, author, edition, genre, description from books where book_id = '$bookid'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_fetch_assoc($result);
        $book_name = urlencode($rows['book_name']);
        $author = urlencode($rows['author']);
        $edition = urlencode($rows['edition']);
        $genre = urlencode($rows['genre']);
        $description = urlencode($rows['description']);
        // $query = "delete from books where book_id = '$bookid'";
        // mysqli_query($con, $query);
        
        $_SESSION['book_id'] = $bookid;
        header("Location: updatebook/updatebook.php?&book_name=$book_name&author=$author&edition=$edition&genre=$genre&description=$description");
        // "&edition=".$edition);
        // ."&edition=".$edition."&genre=".$genre."&description=".$description); // Done till here
    }
?>