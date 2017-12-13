<?php

// This file allows the administrator to view every order.
// This script is created in Chapter 11.

// Require the configuration before any PHP code as configuration controls error reporting.
require ('../includes/config.inc.php');


// Set the page title and include the header:
$page_title = 'View All Employees';
include ('./includes/header.html');
// The header file begins the session.

// Require the database connection:
require(MYSQL);

echo '<h3>View Admin Employees</h3><table border="0" width="100%" cellspacing="4" cellpadding="4">
<thead>
    <tr>
    <th align="right">First Name</th>
    <th align="right">Last Name</th>
    <th align="center">User Name</th>
    <th align="center">Password</th>
    </tr></thead>
<tbody>';

// Make the query:
$q = 'SELECT FirstName, LastName, UserName, Password
      From admin';

$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
    echo '<tr>
    <td align="right">' . $row['FirstName'] .'</td>
    <td align="right">' . $row['LastName'] . '</td>
    <td align="center">' . $row['UserName'] .'</td>
    <td align="center">' . $row['Password'] .'</td>
  </tr>';
}

echo '</tbody></table>';



echo '<h3>Add An Admin Employee</h3><table border="0" width="100%" cellspacing="4" cellpadding="4">';
?>
<form method="post"> 
    <label id="first"> First name:</label><br/>
    <input type="text" name="FirstName"><br/>

    <label id="last">Lastname</label><br/>
    <input type="text" name="LastName"><br/>

    <label id="user">Username</label><br/>
    <input type="text" name="UserName"><br/>

     <label id="pwd">Password</label><br/>
    <input type="text" name="Password"><br/>

    <button type="submit" name="save">save</button>
    
    </form>
<?php
// Make the query:
if(isset($_POST['save']))
{
    $sql = "INSERT INTO admin (FirstName, LastName, UserName, Password)
    VALUES ('".mysql_real_escape_string($_POST["FirstName"])."','". mysql_real_escape_string($_POST["LastName"])."','". mysql_real_escape_string($_POST["UserName"])."','". mysql_real_escape_string($_POST["Password"])."')";

    $result = mysqli_query($dbc,$sql);
}


// Include the footer file to complete the template.
include ('./includes/footer.html');
?>
