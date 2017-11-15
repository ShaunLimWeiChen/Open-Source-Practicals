<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login</title>
</head>
<body>
<form action="validateUser.php" method="post"> 
	<label for="Username">Username:</label>
	<input id="Username" type="text" name="Username" size="13"/> <br />
	<br/>
	<label for="Password">Password: </label>

	<input id="Password" type="text" name="Password" size="13"/> <br />
	<br/>
		<input type="submit" value="Send"/>
	<input type="reset" value="Reset"/>
</form>
</body>
</html>