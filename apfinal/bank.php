<!DOCTYPE html>
<html>
<head>
    <title> Payment Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .help {
        font-size: 11px;
    }
</style>
<body>

<h3 style = "text-align : center">Bank Pay</h3>
<?php
session_start();

if (!empty($_SESSION["error"])) {
    foreach ($_SESSION["error"] as $error) {
        ?>

        <div class="alert alert-danger text-right" dir="rtl" role="alert">
            <?= $error ?>
        </div>
        <?php
    }
}
?>
 
<div>
    <form action="./request2.php" method="post">
        <label for="baseUrl">Name of bank<span class="text-danger">*</span> </label>
        <select class="form-control" name="type">
            <option  selected value="soap">Melli</option>
            <option value="rest">Mellat</option>
        </select>
        <label for="MerchantID">CVV2</label>
        <input type="number" id="cvv" name="cvv" class="form-control" value="" placeholder="Your CVV2..">
        <label for="Mobile">Card ID <span class="text-danger">*</span></label>
        <input type="number" id="card" name="card" class="form-control" placeholder="Your Card ID..">
        <label for="Email">Password <span class="text-danger">*</span></label>
        <input type="number" id="password" name="password" class="form-control" placeholder="Your password..">
        
        <label for="Amount">Amount</label>
        <?php
        $totalprice = $_POST['Amount'];
        $disc = $_POST['discount'];
        if ($disc == 'dude'){
            $totalprice = intval($totalprice) * 0.8;
        }
        echo "<input type='number' id='Amount' name='Amount' class='form-control' placeholder = 'Amount to charge...'>";
        ?>

        <label for="Email">Email</label>
        <?php
        $email = $_POST['Email'];
        echo "<input type='text' id='email' name='email' class='form-control' placeholder = 'Your Account email...' value = '$email'>";
        ?>

        <input type="submit" value="Charge">
    </form>

    <form action = "purchasedproducts.php" method = "post">
    <input type="submit" value="Back To Your Cart">
    </form>
</div>

</body>
</html>