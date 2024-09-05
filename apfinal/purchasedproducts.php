<?php
$file = fopen('commodities.txt', 'r');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Online Store</title>
    <style>
body {
			font-family: Arial, sans-serif;
      background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}

		.container {
			max-width: 800px;
			margin: 20px auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px #aaa;
			border-radius: 5px;
			text-align: center;
		}

		.element {
        padding-bottom: 10px;
    	}

		h1 {
			margin-top: 0;
			font-size: 36px;
			color: #333;
		}

		.card {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
			padding: 10px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px #aaa;
		}

		.card img {
			width: 120px;
			height: 120px;
			object-fit: contain;
			margin-right: 20px;
		}

		.card h2 {
			margin: 0;
			font-size: 24px;
			color: #333;
		}

		.card p {
			margin: 0;
			font-size: 16px;
			color: #555;
		}

		.btn {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: all 0.3s ease;
			font-size: 16px;
		}

		.btn:hover {
			background-color: #3e8e41;
		}

		.clear {
			clear: both;
		}

    </style>
  </head>
  <body >
  <div class="container">
		<h1>My Shopping Cart</h1>
		<?php
		$total = 0;
			$file = fopen('commodities.txt', 'r');
      while (($data = fgetcsv($file)) !== FALSE) {
        if (isset($data[0]) && isset($data[1]) && isset($data[2])) {
            $stringdata = implode(",", $data);
    
            if ($stringdata !== '') {
                echo "<div class='box'>";
                echo "<h3>" . $data[0] . "</h3>";
                echo "<h3>" . $data[2] . "</h3>";
				echo "<h3>price = ". $data[1] . "$</h3>";
				$total = $total + intval($data[1]);
                echo "<form method='POST' action='usercart.php'>";
                echo "<input type='hidden' name='dt' value='$stringdata'>";
                echo "<input class='btn btn-secondary' type='submit' name='delete' value='Remove from my cart'>";
                echo "</form>";
                echo "</div>";
            }
        }
    }
	echo "<div class='box'>";
	echo "<h3>Total = " . $total . "$</h3>";
	echo "</div>";
	echo "<div class='box'>";
	echo "<form method='POST' action='payment.php'>";
            echo "<input type='hidden' name='total' value='$total'>";
            echo "<input class='btn btn-secondary' type='submit' name='pay' value='Pay Total.'>";
    echo "</form>";
	echo "</div>";


	echo "<div class='box'>";
	echo "<form method='POST' action='APProject-spring.php'>";
		echo "<input class='btn btn-secondary' type='submit'  value='Back to homepage.'>";
    echo "</form>";
	echo "</div>";

?>    
      <div class="clear"></div>

    </div>
  </body>
</html>