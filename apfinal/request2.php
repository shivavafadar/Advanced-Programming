<?php
include 'bankaccount.php';
include 'myusers.php';
$email = isset($_POST['email']) ? $_POST['email'] : 'failure';
$amount = isset($_POST['Amount']) ? $_POST['Amount'] : 'failure';
$id = isset($_POST['card']) ? $_POST['card'] : 'failure';
$mobile = isset($_POST['Mobile'])? $_POST['Mobile'] : 'failure';
$password = isset($_POST['password']) ? $_POST['password'] : 'failure';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : 'failure';


$users = new Usermanager();
if(file_exists('users.csv')){$file3 = fopen('users.csv', 'r');}
else {echo "no existence";}

while (($data = fgetcsv($file3)) !== FALSE){
$email1 = $data[0];
$mobile1 = $data[1];
$balance1 = $data[2]; 
$users -> AddUser($email1, $mobile1, $balance1);
}
fclose($file3);


$bas = new bamanager();
if(file_exists('ba.csv')){$file4 = fopen('ba.csv', 'r');}
else {echo "no existence";}

while (($data = fgetcsv($file4)) !== FALSE){
$id2 = $data[0];
$cvv2 = $data[1];
$password2 = $data[2];
$bbalance2 = $data[3]; 
$bas -> Addba($id2, $cvv2, $password2, $bbalance2);
}
fclose($file4);

$balance1 = $users -> check($email,$mobile);
$bbalance1 = $bas -> check($id,$password,$cvv);


if (!empty(trim($bbalance1)))
    {
        if(!empty(trim($balance1)))
        {
            if($amount <= $bbalance1){
            
                $bbalance1 = $bbalance1 - intval($amount);
                $bas -> ChangeBalance($id, $bbalance1);
    
                $balance1 = $balance1 + intval($amount);
                $users -> ChangeBalance($email, $balance1);
    
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
    
    
    
            $baslist = $bas -> GetBalist();
                $file0 = fopen('ba.csv', 'w');
                foreach ($baslist as $data) {
                $rowData = array(
                $data->getid(),
                $data->getcvv(),
                $data->getpassword(),
                $data -> getbbalance()
                // Add more fields as needed
                );
                fputcsv($file0, $rowData);
                }
            fclose($file0);
    
               
            echo "<script>alert('Your Charge has been successful!');</script>";
            echo "<script>window.location.href = 'APProject-spring.php';</script>";
            }
    
            else{
                echo "<script>alert('Not enough bank balance, your balance is $bbalance1.');</script>";
                echo "<script>window.location.href = 'purchasedproducts.php';</script>";
            }
        }
        else {
            echo "<script>alert('No User Found');</script>";
        echo "<script>window.location.href = 'purchasedproducts.php';</script>";
        }
        
    }
    
else 
    {
        echo "<script>alert('No Bank Account Found');</script>";
        echo "<script>window.location.href = 'purchasedproducts.php';</script>";
    }
?>










?>