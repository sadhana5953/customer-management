<?php
header("Access-Control-Allow-Method:GET");
header("Content-Type:application/json");

include("config.php");
$u1 = new Config();

if($_SERVER["REQUEST_METHOD"]=="GET")
{
    $res=$u1->fetchUserData();
    
    if($res){
        $userList=[];
        while($data=mysqli_fetch_assoc($res))
        {
            array_push($userList,$data);
        }
       $arr['data']=$userList;
    }
    else
    {
        $arr['error']="User data not found!";
    }
}
else
{
    $arr["error"]= "Only GET type is allow!";
    http_response_code(400);
}

echo json_encode($arr);
?>