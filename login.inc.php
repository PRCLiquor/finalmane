<?php

include ('./includes/mysql.inc.php');

$u = $_POST['UserName'];
$p = $_POST['Password'];

$q = "SELECT * FROM admin WHERE UserName='$u' AND Password='$p'";

$r = mysqli_query($dbc, $q);

if ( mysqli_num_rows($r) == 1 )
{
	$row = mysqli_fetch_array($r, MYSQLI_NUM);

	$_SESSION['UserName'] = $row[3];
	$_SESSION['Password'] = $row[4];

	echo $row[0];
	echo $row[1];
}

else
{
	echo "account was not found";

}

?>






