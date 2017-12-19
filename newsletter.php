<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
	
	
	$cmd   = filter_input(INPUT_POST, 'smcmd');
	$name  = filter_input(INPUT_POST, 'smname');
	$email = filter_input(INPUT_POST, 'smemail');
	
	if(empty($cmd)){
		?>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	
		
		<input type="text" name="smname" placeholder="Navn"><br>
		<input type="email" name="smemail" placeholder="E-mail"><br>
		<input type="submit" name="smcmd" value="Tilmeld">
		<input type="submit" name="smcmd" value="Afmeld">
	
</form>		
		<?php
	}
	else {
		if($cmd == 'Tilmeld') {
			require_once('db_con.php');
			$sql = 'INSERT INTO newsletter (email, name) VALUES (?, ?)';
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ss', $email, $name);
			$stmt->execute();
			
			if ($stmt->affected_rows > 0){
				echo '<strong>Du er nu tilføjet til nyhedsbrevet fra SMASH</strong>';
			}
			else {
				echo $email.' var allerede på listen';
			}
		}

		if($cmd == 'Afmeld') {
			require_once('db_con.php');
			$sql = 'DELETE FROM newsletter WHERE email=?';
			$stmt = $con->prepare($sql);
			$stmt->bind_param('s', $email);
			$stmt->execute();
			
			if ($stmt->affected_rows > 0){
				echo '<strong>Din email er nu fjernet fra SMASH nyhedsbrev</strong>';
			}
			else {
				echo $email.' var ikke på vores liste';
			}
		}}

		
	
	
?>


</body>
</html>