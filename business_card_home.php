<?php
session_start();
include('connectDB.inc.php');

$query="SELECT * FROM `list_bc`";
$result=mysqli_query($link,$query) or die($query.' '.mysqli_error($link));
$list_bc=array();
while($var=mysqli_fetch_assoc($result)){
extract($var);
$list_bc[$name_bc]=new bc();
}

$_SESSION['code']=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Business Card</title>
<style>
	table {table-layout: auto;width: 800px;border-collapse: collapse;border:1px solid black;}
	th, td {border:1px solid black;}
</style>
</head>
<body>
<nav>	My Account
			<a href="bc_creation.php?id_bc=0">Business Card Creation</a>
      Log Out
    </nav>
<h1>Business Card List</h1>
<table>
<thead><tr><th>Name</th><th>Company Name</th><th>Email Address</th><th>Telephone Number</th><th>Edit</th><th>Supp.</th></tr></thead>
<tbody>
<?php

foreach ($list_bc as $id_bc => $valueName) {
	$code=random_pw(10);
	$_SESSION[$code]=$idFilm;
		echo "<tr><td>$valueName->name_bc</td><td>$valueName->company_name_bc</td><td>$valueName->email_address_bc</td><td>$valueName->tel_bc</td><td><a href=\"bc_creation.php?code=$code\">[ Edit ]</a></td><td><a href=\"bc_uppress.php?code=$code\">[ Supp. ]</a></td></tr>";

}
?>
</tbody>
</table>
</body>
</html>
<?php
/*bc stands for business card*/
class bc
{
	var $name_bc;
	var $company_name_bc;
	var $email_address_bc;
	var $tel_bc;

	function __construct($tname_bc,$company_name_bc,$email_address_bc,$tel_bc)
	{
		$this->name_bc=$name_bc;
		$this->company_name_bc=$company_name_bc;
		$this->email_address_bc=$email_address_bc;
		$this->tel_bc;

	}
}


?>
