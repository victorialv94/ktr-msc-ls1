<?php
session_start();
include('connectDB.inc.php');

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

if(array_key_exists('code', $_POST) and array_key_exists(securite_bdd($_POST['code']),$_SESSION)){
$id_bc=$_SESSION[securite_bdd($_POST['code'])];
$name_bc=securite_bdd($_POST['name_bc']);
} else {
	echo "erreur";
	exit();
}


if($id_bc==0){//creation business card
$query="insert into list_bc (id_bc,name_bc,company_name_bc,email_address_bc,tel_bc) values (null,\"$name_bc\",\"$company_name_bc\",\"$email_address_bc\",\"$tel_bc\")";
$result=mysqli_query($link,$query) or die($query.' '.mysqli_error($link));
} else {//modification business card
$query="update list_bc set name_bc=\"name_bc\", company_name_bc=\"company_name_bc\" ;
$result=mysqli_query($link,$query) or die($query.' '.mysqli_error($link));
}

header("Location: business_card_home.php");

?>
