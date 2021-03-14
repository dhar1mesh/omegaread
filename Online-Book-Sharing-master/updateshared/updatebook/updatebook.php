<?php
    // include_once('cssmenu/index.html');
    $conn = mysqli_connect("localhost", "root", "", "omegaread");
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ../login/login.php');
    }
    if(!isset($_GET['book_name'])){
        $book_name = NULL;
        $author = NULL;
        $edition = NULL;
        $genre = NULL;
        $description = NULL;
    }
    else{
        $userid = $_SESSION['user_id'];
        $book_name = $_GET['book_name'];
        $author = $_GET['author'];
        $edition = $_GET['edition'];
        $genre = $_GET['genre'];
        $description = $_GET['description'];
        $emailquery = "select email, mobile_no from customer where user_id = '$userid'";
        $result = mysqli_query($conn, $emailquery);
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $mobilenumber = $row['mobile_no'];
        
    }
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

    <link rel="stylesheet" href="css/insertbook.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>

<body>

    <div class="cont">
        <div class="demo">
            <div class="login">
                <div class="login__check"></div>
                <div class="login__form">
                    <form action="updatesuccess.php" method="post">
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo'<input type="text" class="login__input name" name="Book_Name" value="'.$book_name.'"  placeholder="Book Name" />';?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo'<input type="text" class="login__input name" name="Author" value="'.$author.'" placeholder="Author" />';?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                            </svg>
                            <?php echo'<input type="password" class="login__input pass" name="Edition" value="'.$edition.'" placeholder="Edition" />';?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo'<input type="text" class="login__input name" name="Genre" value="'.$genre.'" placeholder="Genre" />';?>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <?php echo'<input type="textbox" class="login__input name" name="Description" value="'.$description.'" placeholder="Description" />';?>
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

<?php
include_once('..\footer\footer.html');
?>