<?php
header("Access-Control-Allow-Method:POST");
header("Content-Type:application/json");

include("config.php");
$u1 = new Config();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["name"];
    $price=$_POST["price"];

    $res=$u1->insertProductData($name,$price);

    if($res){
        $arr['msg']="Product add successfully.";
    }
    else
    {
        $arr['error']="Product not added!";
    }
}
else
{
    $arr["error"]= "Only POST type is allow!";
    http_response_code(400);
}

echo json_encode($arr);
?>