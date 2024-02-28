<?php

    try {

        if (isset($_POST['FoodID']) && isset($_POST['FoodName'])) :
            // echo "<br>" . $_POST['customerID'] . $_POST['Name'] . $_POST['birthdate'] . $_POST['email'] .
            //     $_POST['countryCode'] . $_POST['outstandingDebt'];

            require 'connect.php';
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE food SET FoodName = :FoodName, Foodprice = :Foodprice,Image = :Image WHERE FoodID = :FoodID";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':FoodID', $_POST['FoodID']);
            $stmt->bindParam(':FoodName', $_POST['FoodName']);
            $stmt->bindParam(':Foodprice', $_POST['Foodprice']);
            $stmt->bindParam(':Image', $_POST['Image']);
            if ($stmt->execute()) :
                $message = '<div class="alert alert-success" role="alert">Successfully updated customer</div>';
            else :
                $message = '<div class="alert alert-danger" role="alert">Fail to update customer</div>';
            endif;
            echo $message;

            $conn = null;
        endif;
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
    }
    ?>