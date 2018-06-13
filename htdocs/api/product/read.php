<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Product.php';

    // Instantiante DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate product object
    $product = new Product($db);

    // Product Query
    $result = $product->read();

    // Get Row Count
    $num = $result->rowcount();

    // Check if any products
    if($num > 0) {
        $products_arr = array();
        $products_arr['data']= array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $product_item = array(
                'productid' => $productid,
                'productTypeId' => $productTypeId,
                'code' => $code,
                'name' => $name,
                'description' => html_entity_decode($description),
                'price' => $price,
                'state' => $state,
                'status' => $status,
                'createdOn' => $createdOn,
                'createdBy' => $createdBy
            );

            // Push to data
            arra_push($products_arr['data'], $product_item);
        }

        // Turn to JSON & output
        echo json_encode($posts_arr);
    } else {
        // No products
        echo json_encode(
            array('message' => 'No Products Found')
        );
    }
