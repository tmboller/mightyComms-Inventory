<?php

require_once '../php_action/db_connect.php';
header('Content-type: application/json');


//post stat section
try {



    $sql = "SELECT product_name, quantity FROM `product` WHERE quantity <100 order by quantity ASC LIMIT 7";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $productStosck[] = array(
                'label' => $row['product_name'],
                'value' => $row['quantity']
            );
        }

        $productStosck = json_encode($productStosck);
        echo $productStosck;
    } else {
        echo "0 results";
    }
} catch (Exception $ex) {
    echo '<p style="color: red">An error has occured while performing this operation, Please try again later..</p>';
}
