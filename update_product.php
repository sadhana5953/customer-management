<?php
header("Access-Control-Allow-Method:PUT");
header("Content-Type:application/json");

include("config.php");
$u1 = new Config();

if($_SERVER["REQUEST_METHOD"]=="PUT")
{
    $data=file_get_contents("php://input");
    parse_str($data,$result);

    $name=$result["name"];
    $price=$result["price"];
    $id=$result["id"];
    $res=$u1->updateProduct($name,$price,$id);

    if($res){
        $arr['msg']="Product update successfully.";
    }
    else
    {
        $arr['error']="Product not updated!";
    }
}
else
{
    $arr["error"]= "Only PUT type is allow!";
    http_response_code(400);
}

echo json_encode($arr);
?>