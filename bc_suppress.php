<?php
session_start();
include("connectDB.inc.php");


if(array_key_exists('code',$_GET) and array_key_exists($_GET['code'],$_SESSION)) {
$id_bc=$_SESSION[$_GET["code"]];
} else {
	exit();
}


$query="update list_bc set valideName=0 where id_bc=$id_bc";
$result=mysqli_query($link,$query) or die($query.' '.mysqli_error($link));

header("Location: business_card_home.php");
?>
