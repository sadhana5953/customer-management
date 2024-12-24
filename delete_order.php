<?php
header("Access-Control-Allow-Method:DELETE");
header("Content-Type:application/json");

include("config.php");
$u1 = new Config();

if($_SERVER["REQUEST_METHOD"]=="DELETE")
{
    $data=file_get_contents("php://input");
    parse_str($data,$result);

    $id=$result["id"];
    $res=$u1->deleteOrderData($id);

    if($res){
        $arr['msg']="Oreder delete successfully.";
    }
    else
    {
        $arr['error']="Order not deteted!";
    }
}
else
{
    $arr["error"]= "Only DELETE type is allow!";
    http_response_code(400);
}

echo json_encode($arr);
?>