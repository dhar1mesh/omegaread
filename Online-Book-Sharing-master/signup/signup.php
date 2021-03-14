<?php
if(isset($_SESSION['user_id'])){
    header("Location: ../homepage/homepage.php");
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $conn = mysqli_connect("localhost", "root", "", "omegaread");
  $email = $_POST['Email'];
  $firstname = $_POST['FirstName'];
  $lastname = $_POST['LastName'];
  $password = $_POST['Password'];
  $mobno = $_POST['MobNo'];
  $area = $_POST['Area'];
  $locality = $_POST['Locality'];
  $city = $_POST['City'];
  $pincode = $_POST['Pincode'];
  $userid = $_POST['UserName'];

  if (empty($userid) || empty($password) || empty($lastname) || empty($firstname) || empty($mobno) || empty($password) || empty($pincode) || empty($locality) || empty($area) || empty($email)) {
    $message = "Fields cannot be empty";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location: signup.php?error=emptyfields&UserName=".$userid."&Email=".$email."&fname=".$firstname."&lname=".$lastname."&mobno=".$mobno."&locality=".$locality."&area=".$area."&pincode=".$pincode."&city=".$city);
    // exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userid)) {
    $message = "Invalid Email";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location: signup.php?error=invalidusernamemail");
    // exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid Email";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location: signup.php?error=invalidusername&mail=".$email);
    // exit();
  } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $userid)) {
    $message = "Invalid Userid";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location: signup.php?error=invalidusername&uid=".$userid);
    // exit();
  } else {
    $sql = "select user_id from customer where user_id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: signup.php?error=sqlerror&UserName=" . $userid . "&Email=" . $email . "&fname=" . $firstname . "&lname=" . $lastname . "&mobno=" . $mobno . "&locality=" . $locality . "&area=" . $area . "&pincode=" . $pincode . "&city=" . $city);
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "s", $userid);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultcheck = mysqli_stmt_num_rows($stmt);
      if ($resultcheck > 0) {
        $message = "UserName is taken";
        echo "<script type='text/javascript'>alert('$message');</script>";
        // header("Location: signup.php?error=usertaken&UserName=".$userid."&Email=".$email."&fname=".$firstname."&lname=".$lastname."&mobno=".$mobno."&locality=".$locality."&area=".$area."&pincode=".$pincode."&city=".$city);
        // exit();
      } else {
        $sql = "insert into customer(user_id,email,password,first_name,last_name,area,locality,city,mobile_no,pincode) values(?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          $message = "UserName is taken";
          echo "<script type='text/javascript'>alert('$message');</script>";
          // header("Location: signup.php?error=usertaken&UserName=".$userid."&Email=".$email."&fname=".$firstname."&lname=".$lastname."&mobno=".$mobno."&locality=".$locality."&area=".$area."&pincode=".$pincode."&city=".$city);
          // exit();
        }
        $hashedpwd = $password;
        password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $userid, $email, $hashedpwd, $firstname, $lastname, $area, $locality, $city, $mobno, $pincode);
        mysqli_stmt_execute($stmt);
        $_SESSION['loggedIn'] = true;
        header("Location: ../homepage/homepage.php?signup=success");
        exit();
      }
    }
  }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

    <link rel="stylesheet" href="css/signupstyles.css">
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
                            font-size: 50px;
                            line-height: normal;
                            font-family: Cookie, cursive;
                            position: absolute;
                            top: 10%;
                            right: 20%;
                            width: 200px;
                            height: 100px;
                        }

                        span {
                            color: #5383d3;
                        }
                    </style>
                    <h1> Omega<span>read</span> </h1>
                </div>
                <div class="login__form">
                    <form action="signup.php" method="post">
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="UserName" placeholder="UserName" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="Email" placeholder="Email" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                            </svg>
                            <input type="password" class="login__input pass" name="Password" placeholder="Password" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="FirstName" placeholder="First Name" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="LastName" placeholder="Last Name" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="MobNo" placeholder="Mobile Number" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="Area" placeholder="Area" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="Locality" placeholder="Locality" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="City" placeholder="City" />
                        </div>
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" name="Pincode" placeholder="Pincode" />
                        </div>

                        <input type="submit" class="btn btn-primary btn-lg" Sign Up />
                        <!-- <a type="submit" class="" >Sign in</a> -->
                        <p class="login__signup">Already have an account? &nbsp;<a href="../login/login.php">Sign in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>

</html> 