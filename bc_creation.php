<?php
session_start();
include('connectDB.inc.php');

if(array_key_exists('code', $_GET) and array_key_exists(securite_bdd($_GET['code']),$_SESSION)){
	$code=securite_bdd($_GET['code']);
	$idFilm=$_SESSION[$code];
} else {
	echo "erreur";
	exit();
}

if($id_bc>0){
	$query="select * from list_bc where id_bc=$id_bc";
	$result=mysqli_query($link,$query) or die($query.' '.mysqli_error($link));
	$var=mysqli_fetch_assoc($result);
	extract($var);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creation Business Card</title>
</head>
<body>
<h1>Input Business Card information</h1>
<form action="bc_creationmaj.php" method="post">
<input type="hidden" name="code" value="<?php echo $code; ?>">
Name <input type="text" name="insert name" <?php if(isset($name_bc)) echo " value=\"".htmlentities($name_bc)."\" "  ?>><br>

Company Name <input type="text" name="insert Company Name" <?php if(isset($company_name_bc)) echo "value=\"".htmlentities($company_name_bc)."\"" ?>><br>

Email Address <input type="text" name="insert Email" <?php if(isset($email_address_bc)) echo " value=\"".htmlentities($email_address_bc)."\" "  ?>><br>

Telephone Number <input type="text" name="up to 10 digits" <?php if(isset($tel_bc)) echo " value=\"".htmlentities($tel_bc)."\" "  ?>><br>

<button>Send</button>
</form>
</body>
</html>
