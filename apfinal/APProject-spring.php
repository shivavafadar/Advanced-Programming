<?php
$file = fopen('commodities.csv', 'r');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Online Store</title>
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

  <div class="search-box">
  <form class="search-form" action="search.php" method="GET">
    <input class="search-input" type="text" name="query" placeholder="Search...">
    <input class="search-input" type="number" step="0.01" name="min_price" placeholder="Min Price">
    <input class="search-input" type="number" step="0.01" name="max_price" placeholder="Max Price">
    <button class="search-button" type="submit">Search</button>
  </form>
</div>
<div class="container">
      <div class="sorting-options">
      <form class="sort-form" action="sort.php" method="GET">
  <label for="sort-select">Sort By:</label>
  <select id="sort-select" name="sort_by" onchange="this.form.submit()">
    <option value="">Default</option>
    <option value="price_asc">Price: Low to High</option>
    <option value="price_desc">Price: High to Low</option>
  </select>
</form>

      </div>

    <div>
      <form style = "text-align : right" action = "purchasedproducts.php" method = "POST">
        <input  class="btn btn-secondary" type ="submit" value = "see my cart">
      </form>

      <form action="viewchart.php" method="POST">
      <input class="btn btn-secondary" type="submit" value="View sales Chart">
    </form>
  </div>
    </div>
    <div class="container">

    
      <?php
      
      while (($data = fgetcsv($file)) !== FALSE) {
        echo "<div class='card' style = 'width : 18rem;'>";
        echo "<img   class='card-img-top'   src='" . $data[5] . "' alt='" . $data[0] . "'>";
        echo "<div class='card-body'>";

        echo "<h3 class='card-title'>" . $data[0] . "</h3>";
        echo "<p class='card-text'>" . $data[1] . "</p>";
        echo "<p class='card-text'>" . $data[2] . "</p>";
        echo "<p class='card-text'>" . $data[3] . "</p>";
        echo "<p class='card-text'>" . $data[6] . "</p>";
        echo "<p class='card-text'>" . $data[7] . "</p>";
        echo "<p class='card-text'>" . $data[8] . "</p>";
        echo "<p class='card-text'>" . $data[9] . "</p>";
        echo "<p class='card-text'>" . $data[10] . "</p>";
        echo "<p class='card-text'>" . $data[4] . "</p>";
        $singledata1 = $data[0];
        $singledata2 = $data[2];
        $singledata3 = $data[1];
        echo "<form method = 'POST' action = 'usercart.php'>";
        echo "<input type = 'hidden' id = 'name' name = 'name' value = '$singledata1'>";
        echo "<input type = 'hidden' id = 'size' name = 'size' value = '$singledata2'>";
        echo "<input type = 'hidden' id = 'price' name = 'price' value = '$singledata3'>";
        echo "<input type = 'submit' class='btn btn-secondary' name = 'add' value = 'Add to my cart'>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
      }
      fclose($file);
      ?>
      <div class="clear"></div>
    </div>
  </body>
</html>