<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
    }

    .card {
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .card-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-text {
      margin-bottom: 5px;
    }

    .btn {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #45a049;
    }

    .no-products {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <?php

$file = fopen('commodities.csv', 'r');

$searchQuery = $_GET['query'];
$minPrice = isset($_GET['min_price']) && !empty(trim($_GET['min_price'])) ? floatval($_GET['min_price']) : null;
$maxPrice = isset($_GET['max_price']) && !empty(trim($_GET['max_price'])) ? floatval($_GET['max_price']) : null;

$foundProducts = false;

echo "<div class='container'>";

while (($data = fgetcsv($file)) !== FALSE) {

  $productName = $data[0];
  $description = $data[6];
  $price = floatval($data[1]); 

  if (
    (empty($searchQuery) || stripos($productName, $searchQuery) !== false || stripos($description, $searchQuery) !== false) &&
    (($minPrice === null && $maxPrice === null) || ($price >= $minPrice && $price <= $maxPrice))
  ) {
    $foundProducts = true;

    echo "<div class='card' style='width: 18rem;'>";
    echo "<img class='card-img-top' src='" . $data[5] . "' alt='" . $productName . "'>";
    echo "<div class='card-body'>";
    echo "<h3 class='card-title'>" . $productName . "</h3>";
    echo "<p class='card-text'>" . $price . "$". "</p>";
    echo "<p class='card-text'>" . $data[2] . "</p>";
    echo "<p class='card-text'>" . $data[3] . "</p>";
    echo "<p class='card-text'>" . $data[6] . "</p>";
    echo "<p class='card-text'>" . $data[7] . "</p>";
    echo "<p class='card-text'>" . $data[8] . "</p>";
    echo "<p class='card-text'>" . $data[9] . "</p>";
    echo "<p class='card-text'>" . $data[10] . "</p>";
    echo "<p class='card-text'>" . $data[4] . "</p>";
    $singledata1 = $productName;
    $singledata2 = $data[2];
    echo "<form method='POST' action='usercart.php'>";
    echo "<input type='hidden' id='name' name='name' value='$singledata1'>";
    echo "<input type='hidden' id='size' name='size' value='$singledata2'>";
    echo "<input type='submit' class='btn btn-secondary' name='add' value='Add to my cart'>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }
}
fclose($file);
echo "</div>";
if (!$foundProducts) {
  echo "<p>No products found.</p>";
}

  ?>
</body>
</html>



