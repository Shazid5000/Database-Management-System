<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .product {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            width: 300px;
        }
        .product h2 {
            font-size: 20px;
            margin-bottom: 10px;
            cursor: pointer;
            color: #007bff;
        }
        .product h2:hover {
            text-decoration: underline;
        }
        .product p {
            margin-bottom: 10px;
        }
        .product .price {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include("connection.php");

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<h2><a href="product_details.php?id=' . $row["ID"] . '">' . $row["product_name"] . '</a></h2>';
                echo '<p>' . $row["description"] . '</p>';
                echo '<p class="price">$' . $row["price"] . '</p>';
                echo '<p>Quantity: ' . $row["quantity"] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No products found.</p>';
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
