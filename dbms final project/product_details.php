<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        /* Your existing CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
            position: relative; /* Added */
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        .product-details {
            margin-bottom: 10px;
        }
        .product-details label {
            font-weight: bold;
        }
        .buy-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .buy-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include("connection.php");

        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $sql = "SELECT * FROM products WHERE ID = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<h1>' . $row["product_name"] . '</h1>';
                echo '<div class="product-details">';
                echo '<label>Description:</label>';
                echo '<p>' . $row["description"] . '</p>';
                echo '</div>';
                echo '<div class="product-details">';
                echo '<label>Price:</label>';
                echo '<p>$' . $row["price"] . '</p>';
                echo '</div>';
                echo '<div class="product-details">';
                echo '<label>Quantity:</label>';
                echo '<p>' . $row["quantity"] . '</p>';
                echo '</div>';
                echo '<div class="product-details">';
                echo '<label>Image:</label>';
                echo '<p>No image available</p>';
                echo '</div>';
                // Add buy button
                echo '<form action="purchase.php" method="post">';
                // echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="buy-button">Buy Now</button>';
                echo '</form>';
            } else {
                echo '<p>No product found with the specified ID.</p>';
            }
        } else {
            echo '<p>Invalid product ID.</p>';
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
