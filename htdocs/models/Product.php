<?php
    class Product {
        //DB stuff
        private $conn;
        private $table = 'products';

        //Product Properties
        public $productid;
        public $productTypeId;
        public $code;
        public $name;
        public $description;
        public $price;
        public $state;
        public $status;
        public $createdOn;
        public $createdBy;

        //costructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        //Get Products
        public function read() {
            //Create query
            $query = 'SELECT p.productId,
            p.productTypeId,
            p.code,
            p.name,
            p.description,
            p.price,
            p.state,
            p.status,
            p.createdOn,
            p.createdBy
            FROM ' . $this->table . ' p 
            ORDER BY 
                p.code DESC;';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute
            $stmt->execute();

            return $stmt;
        }

        //Get Products
        public function read_single() {
            //Create query
            $query = 'SELECT p.productId,
            p.productTypeId,
            p.code,
            p.name,
            p.description,
            p.price,
            p.state,
            p.status,
            p.createdOn,
            p.createdBy
            FROM ' . $this->table . ' p 
            WHERE
                p.productId = ?
            LIMIT 0,1;';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            //Bind ID
            $stmt->bindParam(1, $this->productid);

            // Execute
            $stmt->execute();

            return $stmt;
        }
    }