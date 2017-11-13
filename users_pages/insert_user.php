<?php

/*Things to be done

Santize the input from the form
Add the data to the database
let the user know what has been added by replacing the strings in the <td> tags with variables from  the database */

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/add_user.css">
	</head>
	<body>
		<h1><?php //echo $response?></h1>
		<table class="table">
			<thead>
				<th>UserId</th>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
			</thead>
			</tbody>
				<td>UserId<?php ?></td>
				<td>Username<?php ?></td>
				<td>Firstname<?php ?></td>
				<td>Lastname<?php ?></td>
			</tbody>
		</table>	
	</body>
</html>