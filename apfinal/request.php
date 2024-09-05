<?php 
include 'myusers.php';
$email1 = (isset($_POST["Email"])) ? $_POST["Email"] : "failure";
$mobile1 = (isset($_POST["Mobile"])) ? $_POST["Mobile"] : "failure";
$amount1 = (isset($_POST["Amount"])) ? $_POST["Amount"] : "failure";
$discount1 = (isset($_POST["discount"])) ? $_POST["discount"] : "failure";

if ($discount1 == "dude"){
    $amount1 = intval($amount1) * 80 / 100;
}


$users = new Usermanager();
if(file_exists('users.csv')){$file3 = fopen('users.csv', 'r');}
else {echo "no existence";}

while (($data = fgetcsv($file3)) !== FALSE){
$email = $data[0];
$mobile = $data[1];
$balance = $data[2]; 
$users -> AddUser($email, $mobile, $balance);
}
fclose($file3);


$balance1 = $users -> check($email1,$mobile1);

if (!empty($balance1))
    {
        
        
        if($amount1 <= $balance1){
            
            $balance1 = $balance1 - intval($amount1);
            $users -> ChangeBalance($email1, $balance1);
            $filename = "commodities.txt";
            $file = fopen($filename, "w");
            fclose($file);

            $userslist = $users -> GetUserlist();
            $file2 = fopen('users.csv', 'w');
            foreach ($userslist as $data) {
            $rowData = array(
            $data->getemail(),
            $data->getmobile(),
            $data->getbalance()
            // Add more fields as needed
            );
            fputcsv($file2, $rowData);
            }
        fclose($file2);
            $difference = intval($amount1) - $balance1;
        echo "<script>alert('Your Payment has been successful!');</script>";
        echo "<script>window.location.href = 'APProject-spring.php';</script>";
        }

        else{
            echo "<script>alert('Not enough balance, your balance is $balance1.');</script>";
            echo "<script>window.location.href = 'purchasedproducts.php';</script>";
        }
    }
    
else 
    {
        echo "<script>alert('No User Found');</script>";
        echo "<script>window.location.href = 'purchasedproducts.php';</script>";
    }
?>