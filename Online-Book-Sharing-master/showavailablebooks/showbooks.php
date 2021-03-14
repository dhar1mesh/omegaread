<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
}
$con = mysqli_connect('localhost', 'root', '', 'omegaread');
$userid = $_SESSION['user_id'];
$query = "select book_id,book_name, author, edition, genre, description, email from books natural join customer where user_id != '$userid'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../cssmenu/styles.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <script src="../cssmenu/script.js"></script>
    <title>Books you can share with</title>
    <link rel="stylesheet" type="text/css" href="..\css\homestyle.css">
    <link rel="stylesheet" type="text/css" href="..\css\bootstrap.min.css">
    <script href="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="temp.css">


</head>

<body>
    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='../homepage/homepage.php'><span>Home</span></a></li>
            <li><a href='#'><span>My Account</span></a></li>
            <li><a href='../cssmenu/Aboutpagesreeja/aboutpage.html'><span>About Us</span></a></li>
            <li class='last'><a href='../login/logout.php'><span>Logout</span></a></li>
        </ul>
    </div>


    <h1><span class="blue">&lt;</span>Available<span class="blue">&gt;</span> <span class="yellow">Books</span>
    </h1>
    <h2></h2>
    <h2> For more details click the contact button and wait for respond email from the Supplier </h2>
    <table class="container">
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Genre</th>
                <th>Description</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
            ?>
        <tbody>
            <tr>
                <td> <?php echo $rows['book_name']; ?></td>
                <td> <?php echo $rows['author']; ?></td>
                <td> <?php echo $rows['edition']; ?></td>
                <td> <?php echo $rows['genre']; ?></td>
                <td> <?php echo $rows['description']; ?></td>
                <td> <?php echo "<form action='sendmail.php' method='POST'><button type='submit' name = 'book_data' value=".$rows['book_id'].">Contact</button></form>"; ?></td> 
            </tr>


            <?php

        }
        ?>

        </tbody>
    </table>


    
</body>

</html>

<!-- <td>  -->
    <?php 
    // echo "<p><a href=mailto:" . $rows['email'] . ">" . $rows['email'] . "</a></p>"; ?>

<!-- </td>  -->


