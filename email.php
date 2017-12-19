<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Email</title>
	
</head>

<body>
<div><table style="width:100%; border: 1px solid #dddddd;">
			<tr>
    <th style="width:15%; border: 1px solid #dddddd;">id</th>
    <th style="width:15%; border: 1px solid #dddddd;">Navn</th> 
    <th style="width:70%; border: 1px solid #dddddd;">Email</th>
  		</tr>
  		<div>
<?php 
	require_once('db_con.php');
	$stmt = $con->prepare('SELECT id, name, email FROM newsletter');
	$stmt->execute();
	$stmt->bind_result($id, $name, $email);

	while($stmt->fetch()){
	
		
	echo 	'
		<tr>
    <td style="width:15%; border: 1px solid #dddddd;">'.$id.'</td>
    <td style="width:15%; border: 1px solid #dddddd;">'.$name.'</td> 
    <td style="width:15%; border: 1px solid #dddddd;">'.$email.'</td>
  </tr>
			
			';

	}
	$stmt->close();
	$con->close();
	?>	
</table>
</div>
</body>
</html>