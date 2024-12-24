<?php

class Config
{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="customer";
    private $connection;

    public function connect()
    {
        $this->connection=mysqli_connect($this->host, $this->username, $this->password,$this->database);
        if($this->connection)
        {
            echo "database connect successfully.";
        }
        else
        {
            echo "database connection failed!";
        }
    }

    public function __construct()
    {
        $this->connect();
    }

    public function insertUserData($name,$email,$phone)
    {
        $sql="INSERT INTO users(name,email,phone) VALUES('$name','$email',$phone)";
        $res=mysqli_query($this->connection,$sql);
        return $res;
    }

    public function fetchUserData()
    {
        $sql="SELECT * FROM users";
        $res=mysqli_query($this->connection,$sql);
        return $res;
    }

    public function insertProductData($product_name,$price)
    {
        $sql="INSERT INTO products(product_name,price) VALUES('$product_name',$price)";
        $res=mysqli_query($this->connection,$sql);
        return $res;
    }

    public function updateProduct($product_name,$price,$id)
    {
        $sql="UPDATE products SET product_name='$product_name',price=$price WHERE id=$id";
        $res=mysqli_query($this->connection,$sql);
        return $res;
    }
    public function insertOrderData($order_date,$status)
    {
        $sql="INSERT INTO orders(order_date,status) VALUES('$order_date','$status')";
        $res=mysqli_query($this->connection,$sql);
        return $res;
    }

    public function deleteOrderData($id)
    {
        $sql="DELETE FROM orders WHERE id=$id";
        $res=mysqli_query($this->connection,$sql);
        return $res;
    }

}
?>