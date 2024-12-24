<?php
header("Access-Control-Allow-Method:POST");
header("Content-Type:application/json");

include("config.php");
$u1 = new Config();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $date=$_POST["date"];
    $status=$_POST["status"];

    $res=$u1->insertOrderData($date,$status);

    if($res){
        $arr['msg']="Order add successfully.";
    }
    else
    {
        $arr['error']="Order not added!";
    }
}
else
{
    $arr["error"]= "Only POST type is allow!";
    http_response_code(400);
}

echo json_encode($arr);
?>