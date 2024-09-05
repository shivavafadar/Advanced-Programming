<!DOCTYPE html>
<html>
  <head>
    <title>sorted products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>



      body {
        background-color: #f2f2f2;
      }
      
      .card {
        border: 1px solid #ddd;
        padding: 10px;
        width: 30%;
        margin: 10px;
        float: left;
        text-align: center;
      }


      .card-img-top{
        width: 150px; 
        height: 300px; 
        object-fit: cover; 
        width: 100%;
        object-fit: cover;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
      }

      .product {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .product-image {
        width: 45%;
        max-width: 500px;
        margin-right: 30px;
      }

      .product-image img {
        width: 100%;
        height: auto;
      }

      .product-details {
        width: 50%;
        max-width: 500px;
      }

      .product-name {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
        margin-bottom: 10px;
      }

      .product-price {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
        margin-bottom: 20px;
      }

      .product-size {
        margin-bottom: 20px;
      }

      .product-description {
        margin-bottom: 20px;
      }

      .add-to-cart {
        margin-top: 20px;
      }

      .clear {
        clear: both;
      }

      .search-box {
        margin-top: 20px;
        text-align: center;
      }

      .search-form {
        display: inline-block;
      }

      .search-input {
        padding: 5px;
        width: 200px;
        border: 1px solid #ddd;
        border-radius: 4px;
      }

      .search-button {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }


    </style>
  </head>
  <body >

<?php

$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : '';


function comparePrices($a, $b) {
 
    $priceA = floatval($a[1]);
    $priceB = floatval($b[1]);

    
    return ($priceA < $priceB) ? -1 : 1;
}


$file = fopen('commodities.csv', 'r');
$data = [];
while (($row = fgetcsv($file)) !== FALSE) {
    $data[] = $row;
}
fclose($file);


if ($sort_by === 'price_asc') {
    usort($data, 'comparePrices');
} elseif ($sort_by === 'price_desc') {
    usort($data, 'comparePrices');
    $data = array_reverse($data);
}


foreach ($data as $row) {
    echo "<div class='card' style='width: 18rem;'>";
    echo "<img class='card-img-top' src='" . $row[5] . "' alt='" . $row[0] . "'>";
    echo "<div class='card-body'>";
    echo "<h3 class='card-title'>" . $row[0] . "</h3>";
    echo "<p class='card-text'>" . $row[1] . "</p>";
    echo "<p class='card-text'>" . $row[2] . "</p>";
    echo "<p class='card-text'>" . $row[3] . "</p>";
    echo "<p class='card-text'>" . $row[6] . "</p>";
    echo "<p class='card-text'>" . $row[7] . "</p>";
    echo "<p class='card-text'>" . $row[8] . "</p>";
    echo "<p class='card-text'>" . $row[9] . "</p>";
    echo "<p class='card-text'>" . $row[10] . "</p>";
    echo "<p class='card-text'>" . $row[4] . "</p>";
    $singledata1 = $row[0];
    $singledata2 = $row[2];
    echo "<form method='POST' action='usercart.php'>";
    echo "<input type='hidden' id='name' name='name' value='$singledata1'>";
    echo "<input type='hidden' id='size' name='size' value='$singledata2'>";
    echo "<input type='submit' class='btn btn-secondary' name='add' value='Add to my cart'>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
}
?>
</body>
</html>
