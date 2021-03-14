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
        $bookid = $_SESSION['book_id'];
        $sql = "update books set book_name = '$book_name', author='$author', edition='$edition', genre='$genre', description='$description' where book_id = '$bookid'";
        mysqli_query($conn, $sql);
        
        header("Location: ../updateordelete.php?insertbook=success");
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>
 

 <!-- // $stmt = mysqli_stmt_init($conn);
    // if(!mysqli_stmt_prepare($stmt, $sql)){
    //   // header("Location: signup.php?error=usertaken&UserName=".$userid."&Email=".$email."&fname=".$firstname."&lname=".$lastname."&mobno=".$mobno."&locality=".$locality."&area=".$area."&pincode=".$pincode."&city=".$city);
    //   exit();
    // } 
    // mysqli_stmt_bind_param($stmt, "ssssss", $userid, $book_name, $author, $edition, $genre, $description);
    // mysqli_stmt_execute($stmt); -->


 <!-- // $area = $_POST['Area'];
    // $locality = $_POST['Locality'];
    // $city = $_POST['City'];
    // $pincode = $_POST['Pincode'];
    // $userid = $_POST['UserName'];

    // if(empty($book_name)){

    //   header("Location: insertbook.php?error=emptyfields&Book Name=".$book_name."&Email=".$email."&fname=".$firstname."&lname=".$lastname."&mobno=".$mobno."&locality=".$locality."&area=".$area."&pincode=".$pincode."&city=".$city);
    //   exit();
    // }
    // else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userid)){
    //   header("Location: signup.php?error=invalidusernamemail");
    //   exit();
    // }
    // elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //   header("Location: signup.php?error=invalidusername&mail=".$email);
    //   exit();
    // }
    // elseif(!preg_match("/^[a-zA-Z0-9]*$/", $userid)) {
    //   header("Location: signup.php?error=invalidusername&uid=".$userid);
    //   exit();
    // }


    // $sql ="select user_id from customer where user_id=?";
    // $stmt = mysqli_stmt_init($conn);
    // if(!mysqli_stmt_prepare($stmt, $sql)){
    //   header("Location: signup.php?error=sqlerror&UserName=".$userid."&Email=".$email."&fname=".$firstname."&lname=".$lastname."&mobno=".$mobno."&locality=".$locality."&area=".$area."&pincode=".$pincode."&city=".$city);
    //   exit();
    // }
    // else{
    //   mysqli_stmt_bind_param($stmt, "s", $userid);
    //   mysqli_stmt_execute($stmt);
    //   mysqli_stmt_store_result($stmt);
    //   $resultcheck = mysqli_stmt_num_rows($stmt);
    //   if($resultcheck>0){
    //     header("Location: signup.php?error=usertaken&UserName=".$userid."&Email=".$email."&fname=".$firstname."&lname=".$lastname."&mobno=".$mobno."&locality=".$locality."&area=".$area."&pincode=".$pincode."&city=".$city);
    //     exit();
    //   }
    // else{ -->