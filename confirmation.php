<?php
session_start();
// Check if the user is logged in or the payment process has been completed
if (!isset($_SESSION['uid']) || !isset($_SESSION['payment_completed'])) {
    header("Location: index.php"); // Redirect to the homepage or login page
    exit();
}
// Clear the payment completed flag from the session
unset($_SESSION['payment_completed']);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Gym Management System | Payment Confirmation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />
    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- Page Preloder -->
    <!-- Header Section -->
    <?php include 'include/header.php'; ?>
    <!-- Header Section end -->
    <!-- Page top Section -->
    <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto text-white">
                    <h2>Payment Confirmation</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Page top Section end -->
    <!-- Confirmation Section -->
    <section class="confirmation-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation-content">
                        <h3>Thank you for your payment!</h3>
                        <p>Your payment has been processed successfully.</p>
                        <p>Please keep a record of this confirmation for your reference.</p>
                        <div class="confirmation-table">
                            <table>
                                <tr>
                                    <th>Payment ID:</th>
                                    <td><?php echo $_SESSION['payment_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Amount Paid:</th>
                                    <td><?php echo $_SESSION['payment_amount']; ?></td>
                                </tr>
                                <!-- Display additional payment details if necessary -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Confirmation Section end -->
    <?php include 'include/footer.php'; ?>
    <!-- Footer Section end -->
    <div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>
    <!-- Search model -->
    <!-- Search model end -->
    <!--====== Javascripts & Jquery ======-->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/main.js"></script>
</body
