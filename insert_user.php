<?php
header("Access-Control-Allow-Method:POST");
header("Content-Type:application/json");

include("config.php");
$u1 = new Config();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];

    $res=$u1->insertUserData($name,$email,$phone);

    if($res){
        $arr['msg']="User add successfully.";
    }
    else
    {
        $arr['error']="User not added!";
    }
}
else
{
    $arr["error"]= "Only POST type is allow!";
    http_response_code(400);
}

echo json_encode($arr);
?>