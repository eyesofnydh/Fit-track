<?php
session_start();
require_once('include/config.php'); // Include database configuration once

if (isset($_POST['submit'])) {
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cardholder_name = $_POST['cardholder_name'];
    $cvv = $_POST['cvv'];

    if (empty($card_number)) {
        $nameerror = "Please Enter Card Number";
    } else if (empty($expiry_date)) {
        $mobileerror = "Please Enter Expiry Date";
    } else if (empty($cvv)) {
        $emailerror = "Please Enter CVV";
    } else {
        try {
            $sql = "INSERT INTO process_payment (card_number, expiry_date, cardholder_name, cvv) VALUES (:card_number, :expiry_date, :cardholder_name, :cvv)";

            $query = $dbh->prepare($sql);
            $query->bindParam(':card_number', $card_number, PDO::PARAM_STR);
            $query->bindParam(':expiry_date', $expiry_date, PDO::PARAM_STR);
            $query->bindParam(':cardholder_name', $cardholder_name, PDO::PARAM_STR);
            $query->bindParam(':cvv', $cvv, PDO::PARAM_STR);

            $query->execute();

            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId != NULL) {
                echo '<script>alert("Payment processed successfully!")</script>';
            } else {
                $error = "Payment processing failed.";
            }
        } catch (PDOException $e) {
            // Handle database errors here
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<!-- ... (rest of your HTML code) ... -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Checkout Form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <link rel="stylesheet" href="styles.css">
    <script>
        function processPayment() {
            // Dummy function to simulate payment processing
            setTimeout(() => {
                alert("Payment processed successfully!");
                document.getElementById("sbmtpayment.php").submit(); // Submit the form after processing
            }, 2000);
        }
    </script>
</head>
<body>
<div class="wrapper">
    <div class="payment">
        <div class="payment-logo">
            <p>p</p>
        </div>

    <h2>Payment</h2>
<form id="paymentForm" method="POST" action="sbmtpayment.php">
    <div class="form">
    <div class="card space icon-relative">
    <label class="label">Card holder:</label>
    <input type="text" class="input" name="cardholder_name" placeholder="Card holder" required
           value="<?php echo isset($cardholder_name) ? htmlspecialchars($cardholder_name) : ''; ?>">
    <i class="fas fa-user"></i>
</div>

        <div class="card space icon-relative">
            <label class="label">Card number:</label>
            <input type="text" class="input" name="card_number" data-mask="0000 0000 0000 0000"
                   placeholder="Card Number" required value="<?php echo isset($card_number) ? htmlspecialchars($card_number) : ''; ?>">
            <i class="far fa-credit-card"></i>
        </div>
        <div class="card-grp space">
            <div class="card-item icon-relative">
                <label class="label">Expiry date:</label>
                <input type="text" name="expiry_date" class="input" data-mask="00 / 00" placeholder="00 / 00" required
                value="<?php echo isset($expiry_date) ? htmlspecialchars($expiry_date) : ''; ?>">
                <i class="far fa-calendar-alt"></i>
            </div>
            <div class="card-item icon-relative">
                <label class="label">CVV:</label>
                <input type="text" class="input" name="cvv" data-mask="000" placeholder="000" required
                value="<?php echo isset($cvv) ? htmlspecialchars($cvv) : ''; ?>">
                <i class="fas fa-lock"></i>
            </div>
        </div>
        <div class="btn">
            <button type="submit" onclick="processPayment()">Pay</button>
            
        </div>
    </div>
</form>
<p>or</p>
<div class="btn">
    <a href="upii.php">UPI Payment</a>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>

