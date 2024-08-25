<!DOCTYPE html>
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
              }, 2000);
          }

          function submitPayment() {
              // Get payment details from the form
              var name = document.getElementById("cardHolder").value;
              var cardNumber = document.getElementById("cardNumber").value;
              var cvv = document.getElementById("cvv").value;
              var amount = document.getElementById("amount").value;

              // You can perform further actions with the payment details here
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

    <form action="process_pay.php" method="post">
      
<div class="form">
    <div class="card space icon-relative">
        <label class="label">Card holder:</label>
        <input type="text" id="cardHolder" class="input" placeholder="card holder" required>
        <i class="fas fa-user"></i>
    </div>
    <div class="card space icon-relative">
        <label class="label">Card number:</label>
        <input type="text" id="cardNumber" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number"required>
        <i class="far fa-credit-card"></i>
    </div>
    <div class="card-grp space">
        <div class="card-item icon-relative">
            <label class="label">Expiry date:</label>
            <input type="text" name="expiry-date" class="input" data-mask="00 / 00" placeholder="00 / 00"required>
            <i class="far fa-calendar-alt"></i>
        </div>
        <div class="card-item icon-relative">
            <label class="label">CVV:</label>
            <input type="text" id="cvv" class="input" data-mask="000" placeholder="000">
            <i class="fas fa-lock"></i>
        </div>
    </div>
    <div class="card space icon-relative">
        <label class="label">Amount:</label>
        <input type="text" id="amount" class="input" placeholder="Amount">
        <i class="fas fa-dollar-sign"></i>
    </div>

    <div class="btn">
    <a href="sbmtpayment.php">PAY</a>
    </div> 
    <p>or</p>
    <div class="btn">
        <a href="upii.php">UPI payment</a>
    </div>
</div>



    </div>
  </div>
</div>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        </form>
</body>
</html>
