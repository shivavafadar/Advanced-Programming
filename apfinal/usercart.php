<?php
// include 'commodity.php';
include 'APProject-spring.php';
include 'newclass.php';
if (isset($_POST['add'])){
$name1 = $_POST['name'];
$size1 = $_POST['size'];
$price1 = $_POST['price'];
$commodities -> AddCommodity($name1, $price1, $size1,'');
$commodities -> WriteToFile();
}
if (isset($_POST['delete'])){
    $deleted = $_POST['dt'];
    $content = file_get_contents('commodities.txt');
    $content = str_replace($deleted,'',$content);
    file_put_contents('commodities.txt',$content);
}

?>