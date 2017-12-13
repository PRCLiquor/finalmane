<?php

include ('./includes/mysql.inc.php');

/*
function mysql_fix_input($string){
	if(get_magic_quotes_gpc())
	{
		$u = stripslashes($_POST['UserName']);
	}
	return mysql_real_escape_string($u);
}
*/

$u = mysql_real_escape_string($_POST['UserName']);
$p = stripslashes($_POST['Password']);

$q = "SELECT * FROM admin WHERE UserName='$u' AND Password='$p'";

$r = mysqli_query($dbc, $q);

if ( mysqli_num_rows($r) == 1 )
{
	$row = mysqli_fetch_array($r, MYSQLI_NUM);

	$_SESSION['UserName'] = $row[3];
	$_SESSION['Password'] = $row[4];

	//echo $row[4];
	//cho $row[5];
}

else 
{
	echo "account was not found";
	header("Location: /login_form.inc.php"); 
	exit();
	echo "account was not found";

}

?>






