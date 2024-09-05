
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

<h3 style = "text-align : center">Hava Pay</h3>
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
    <form id="myForm" action="./request.php" method="POST">
        <label for="baseUrl">Type of delivery<span class="text-danger">*</span> </label>
        <select class="form-control" name="type">
            <option  selected value="soap">Express</option>
            <option value="rest">Normal</option>
        </select>
        <label for="MerchantID">ِDiscount Code</label>
        <input type="text" id="discount" name="discount" class="form-control" value="" placeholder="Your Discount Code..">
        <label for="Mobile">Mobile <span class="text-danger">*</span></label>
        <input type="text" id="Mobile" name="Mobile" class="form-control" placeholder="Your Mobile..">
        <label for="Email">Email <span class="text-danger">*</span></label>
        <input type="Email" id="Email" name="Email" class="form-control" placeholder="Your Email..">

        <label for="MerchantID">Merchant ID <span class="text-danger">*</span></label>
        <input type="text" id="MI" name="MI" class="form-control" placeholder="Your Merchant ID..">
        <label for="Amount">Amount</label>
        <?php
        $totalprice = $_POST['total'];
        $totalprice = intval($totalprice);
        echo "<input type='number' id='Amount' name='Amount' class='form-control' value = '$totalprice' readonly>";
        ?>

        <input onclick="submitform1()" type="submit" name = "pay" value="Pay with your shop balance.">
        <input onclick="submitForm()" type="submit" name = "charge" value="Charge your shop balance.">
        <input onclick="submitForm2()" type="submit" name = "api" value="Pay outside the app.">
    </form>

        <script>
            function submitform1(){
                document.getElementById('myForm').action = 'bank.php';
                document.getElementById('myForm').submit();
                document.getElementById('myForm').action = 'request.php';
                document.getElementById('myForm').submit();
            }
        </script>


        <script>
            function submitForm() {
            document.getElementById('myForm').submit();
            document.getElementById('myForm').action = 'bank.php';
            document.getElementById('myForm').submit();
             }
        </script>

        <script>
            function submitForm2(){
                // document.getElementById('myForm').action = 'assistant.php';
                // document.getElementById('myForm').submit();
                document.getElementById('myForm').action = 'myrequest.php';
                document.getElementById('myForm').submit();
                
            }
        </script>


    <form action = "purchasedproducts.php" method = "post">
    <input type="submit" value="Back To Your Cart">
    </form>
</div>

</body>
</html>