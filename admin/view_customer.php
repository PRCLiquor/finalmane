<?php

// This file allows the administrator to view every order.
// This script is created in Chapter 11.

// Require the configuration before any PHP code as configuration controls error reporting.
require ('../includes/config.inc.php');

// Set the page title and include the header:
$page_title = 'View All Customers';
include ('./includes/header.html');
// The header file begins the session.

// Require the database connection:
require(MYSQL);

echo '<h3>View Customer</h3><table border="0" width="100%" cellspacing="4" cellpadding="4">
<thead>
	<tr>
    <th align="right">Customer Name</th>
    <th align="right">City</th>
    <th align="center">State</th>
    <th align="center">Zip</th>
    </tr></thead>
<tbody>';

// Make the query:
$q = 'SELECT o.id, total, c.id AS cid, CONCAT(last_name, ", ", first_name) AS name, city, state, zip, COUNT(oc.id) AS items FROM orders AS o LEFT OUTER JOIN order_contents AS oc ON (oc.order_id=o.id AND oc.ship_date IS NULL) JOIN customers AS c ON (o.customer_id = c.id) JOIN transactions AS t ON (t.order_id=o.id AND t.response_code=1) GROUP BY o.id DESC';

$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
	echo '<tr>
    <td align="right">' . $row['name'] .'</td>
    <td align="right">' . $row['city'] . '</td>
    <td align="center">' . $row['state'] .'</td>
    <td align="center">' . $row['zip'] .'</td>
  </tr>';
}

echo '</tbody></table>';

// Include the footer file to complete the template.
include ('./includes/footer.html');
?>
