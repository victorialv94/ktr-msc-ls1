<?php

$host="mysql-vvenot.alwaysdata.net";
$user="vvenot_bcm";
$passwd="vvenot_bcm_062020";
$bd="library";
$link=mysqli_connect($host,$user,$passwd,$bd);

if(mysqli_connect_errno($link)){
	echo "Erreur ".mysqli_connect_error($link);
}

mysqli_set_charset($link,"utf8");

function securite_bdd($string) {
		global $link;

        if(ctype_digit($string)) {
            $string = intval($string);
        } else {
            $string = mysqli_real_escape_string($link,$string);
            $string = addcslashes($string, '%_');
        }
        return $string;
}

function random_pw($pw_length) {
    $pass = NULL;
    $charlist = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz023456789';
    $ps_len = strlen($charlist);
    mt_srand((double)microtime()*1000000);

    for($i = 0; $i < $pw_length; $i++) {
        $pass .= $charlist[mt_rand(0, $ps_len - 1)];
    }
    return ($pass);
}
?>
