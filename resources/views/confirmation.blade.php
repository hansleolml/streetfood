<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmacion de Email</title>
</head>
<body>
	<h1>Gracias por confirmar tu email</h1>
	<p>Tu necesitas entrar 
		<a href='{{url("register/confirm/{$user->llave_acti}")}}'>Confirma tu correo electronico</a>
	</p>
</body>
</html>