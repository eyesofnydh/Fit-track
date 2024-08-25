<?php
session_start();
if (isset($_SESSION["process_payment"])) {
   //header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["card_number"];
           $email = $_POST["expiry_date"];
           $password = $_POST["cardholder_name"];
           $cvv = $_POST["cvv"];
           
           
           $errors = array();
           
           if (empty($card_number) OR empty($expiry_date) OR empty($cardholder_name) OR empty($cvv)) {
            array_push($errors,"All fields are required");
           }
           require_once "include/config.php";
           
            
            $sql = "INSERT INTO users (card_number, expiry_date, cardholder_name,cvv) VALUES ( ?, ?, ?,? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$card_number, $expiry_date, $cardholder_name,$cvv);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>payment successfull.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

    
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>