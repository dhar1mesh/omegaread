<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
}
$userid = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "omegaread");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = $_POST['Book_Name'];
    $author = $_POST['Author'];
    $edition = $_POST['Edition'];
    $genre = ($_POST['Genre']);
    $description = $_POST['Description'];
    $emailquery = "select email, mobile_no from customer where user_id = '$userid'";
    $result = mysqli_query($conn, $emailquery);
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $mobilenumber = $row['mobile_no'];
    $alreadyexist = "select * from books where user_id = '$userid' and book_name = '$book_name' and author = '$author' and 
            edition = '$edition'";
    $alreadyexist = mysqli_query($conn, $alreadyexist);
    if (!mysqli_num_rows($alreadyexist) && $book_name != "") {
        $sql = "insert into books(user_id,book_name,author,edition,genre,description) values('$userid','$book_name','$author','$edition','$genre','$description')";
        mysqli_query($conn, $sql);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location: ../updateshared/updateordelete.php?insertbook=success");
    }
    if ($book_name == "") {
        $message = "Book field cannot be empty";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "You have already opt to share this book";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Share Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

    <link rel="stylesheet" href="css/insertbook.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <div class="cont">
        <div class="demo">
            <div class="login">
                <div class="logo">
                    <style>
                        h1 {
                            font-style: normal;
                            font-variant-ligatures: normal;
                            font-variant-caps: normal;
                            font-variant-numeric: normal;
                            font-variant-east-asian: normal;
                            font-weight: normal;
                            font-stretch: normal;
                            font-size: 30px;
                            line-height: normal;
                            font-family: Cookie, cursive;
                            position: absolute;
                            top: 20%;
                            right: 20%;
                            width: 200px;
                            height: 100px;
                        }

                        span {
                            color: #5383d3;
                        }
                    </style>
                    <h1> Share a <span>book</span> </h1>
                </div>
                <div class="login__form">
                    <form action="insertbook.php" method="POST">
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo '<input type="text" class="login__input name" name="Book_Name"  placeholder="Book Name" />'; ?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo '<input type="text" class="login__input name" name="Author" placeholder="Author" />'; ?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo '<input type="text" class="login__input name" name="Edition"  placeholder="Edition" />'; ?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo '<input type="text" class="login__input name" name="Genre"  placeholder="Genre" />'; ?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo '<input type="textbox" class="login__input name" name="Description"  placeholder="Description" />'; ?>
                        </div>
                        <!-- <div class="login__row">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
              <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" class="login__input name" name ="MobNo" placeholder="Mobile Number"/>
        </div>
        <div class="login__row">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
              <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" class="login__input name" name ="Area" placeholder="Area"/>
        </div>
        <div class="login__row">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
              <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" class="login__input name" name ="Locality" placeholder="Locality"/>
        </div>
        <div class="login__row">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
              <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" class="login__input name" name ="City" placeholder="City"/>
        </div>
        <div class="login__row">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
              <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" class="login__input name" name ="Pincode" placeholder="Pincode"/>
        </div> -->

                        <input type="submit" class="btn btn-primary btn-lg" Submit />
                        <!-- <a type="submit" class="" >Sign in</a> -->
                        <!-- <p class="login__signup">Already have an account? &nbsp;<a href="../login/index.html">Sign in</a></p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>

</html>
