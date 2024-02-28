<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        h1 {
            color: #007bff;
        }

        form {
            max-width: 500px;
            margin: auto;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Update food</h1>

    <?php
    require 'connect.php';

    if (isset($_GET['FoodID'])) {
        $sql_select_customer = 'SELECT * FROM food WHERE FoodID=?';
        $stmt = $conn->prepare($sql_select_customer);
        $stmt->execute([$_GET['FoodID']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <form action="Updatefooddb.php" method="POST" enctype="multipart/form-data">
        <label for="FoodID">Food ID:</label>
        <input type="text" placeholder="FoodID" name="FoodID" required class="form-control" value="<?php echo $result['FoodID']; ?>">
        <br>

        <label for="FoodName">Food Name:</label>
        <input type="text" placeholder="FoodName" name="FoodName" required class="form-control" value="<?php echo $result['FoodName']; ?>">
        <br>

        <label for="Foodprice">Foodprice:</label>
        <input type="number" placeholder="Foodprice" name="Foodprice" required class="form-control" value="<?php echo $result['Foodprice']; ?>">
        <br>

        <label for="Image">Image:</label>
        <input type="file" name="Image" accept="image/*" class="form-control">
        <button type="button" onclick="document.getElementById('myImage').src=''">Clear Image</button>
        <br>

        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>

</body>

</html>