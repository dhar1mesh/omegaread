<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
}
?>

<!DOCTYPE html>

<html>
<style>
    html {
        background: url(background.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    h2,
    h3,
    p {
        color: gold;
    }
</style>

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../cssmenu/styles.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <script src="../cssmenu/script.js"></script>
    <title>Omegaread</title>

    <link rel="stylesheet" type="text/css" href="..\css\homestyle.css">
    <link rel="stylesheet" type="text/css" href="..\css\bootstrap.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="footer, address, phone, icons" />

    <title>Footer With Address And Phones</title>

    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="../footer\css\demo.css">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="../footer\css/footer-distributed-with-address-and-phones.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
</head>

<body background="background.jpg">

    <!-- header -->
    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='../homepage/homepage.php'><span>Home</span></a></li>
            <li><a href='#'><span>My Account</span></a></li>
            <li><a href='../cssmenu/Aboutpagesreeja/aboutpage.html'><span>About Us</span></a></li>
            <li class='last'><a href='../login/logout.php'><span>Logout</span></a></li>
        </ul>

    </div>
    <!-- header ends -->

    <!-- homepage -->
    <script href="../js/bootstrap.min.js"></script>
    <section id="home">
        <div id="home-content">
            <div id="home-content-inner" class="text-center">
                <div id="home-heading">
                    <h1 id="home-heading-1">Omegaread</h1><br>
                    <h2 id="home-heading-2">Stairway to Books Heaven</h2>
                </div>
                <div id="home-text">
                    <p>Select your Stairway</p>
                </div>
                <div id="home-btn">
                    <a class="btn btn-primary btn-lg active" href="../showavailablebooks/showbooks.php" role="button" title="Sell">Show available books</a>
                    <a class="btn btn-primary btn-lg active" role="button" title="Share" href="../updateshared/updateshared.php">Update Shared</a>
                    <a class="btn btn-primary btn-lg active" role="button" title="Buy" href="../shareinsertbook/insertbook.php">Share</a>
                </div>
            </div>
        </div>
    </section>
    <!-- homepage ends -->

    <!-- footer start -->
    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Omega<span>read</span></h3>

            <p class="footer-links">
                <a href="#">Home</a>
                ·
                <a href="#">Blog</a>
                ·
                <!-- <a href="#">Pricing</a> -->
                ·
                <a href="#">About</a>
                ·
                <a href="#">Faq</a>
                ·
                <a href="#">Contact</a>
            </p>

            <p class="company Name">Omega Read &copy; 2019</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Nit-Bhopal</span> M.P,India</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+1 555 123456</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com">support@company.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                We the developers of Omegaread are proud to announce Sreeja as our mentor. We also have one footer named Dharmesh Kumar.
                We also have one Youtuber Arsude.Akash and one typer More.
            </p>

            <div class="footer-icons">

                <a href="http://facebook.com"><i class="fa fa-facebook"></i></a>
                <a href="http://twitter.com"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-github"></i></a>

            </div>

        </div>

    </footer>

    <!-- footer ends -->

</body>

</html>





<!-- <img src = "background.jpg" type = "background" width = 100% height = 100%/> -->
<!-- <form action = "C:\Users\DHARMESH\Desktop\bibliophile\signin.html" method="GET">
            <input class="SignIn" value="SignIn/Sign up" type="submit" />  
     </form>
     <input class="Select1 " value="Sell" type="submit" />  
    <input class="Select2" value="Share/Buy" type="submit" /> 
    <input type ="textbox"placeholder="search book">
    <button>search</button> --> 