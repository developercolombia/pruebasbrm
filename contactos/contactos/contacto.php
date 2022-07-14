<?php
	require('includes/config.php');
	header('Content-Type:text/html;charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>CONTACTOS</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css"/>
	</head>
	<body>
		<header id="header">
			<a href="index.php">
				<img id="logo" width="100%" height="100%" src="images/header.jpg" alt="Header"/>
			</a>
		</header>
		<nav>
			<form action='' method='post'>
			<input type="submit" name="cambiar" value="Modificar datos"/><br>
			<input type="submit" name="borrar" value="Eliminar contacto"/>
		</nav>
		<section id="section">
			<article>
				<div class="header">
					<h1>DATOS DEL CONTACTO:</h1>
				</div>
				<hr><br>
				<div class="content">
					<form action='' method='post'>
						<?php
							$id=$_GET['id'];
							require('includes/config.php');
							try{
								$sql=$db->prepare('SELECT id,phone,date,address,email FROM contactos where id="'.$id.'"');
								$sql->execute();
								while($row=$sql->fetch()){
									echo "<table border='1' align='center'>
										<tr><td class='th'>Nombre</td><td>".$row['name']."</td></tr>
										<tr><td class='th'>Telefono</td><td>".$row['phone']."</td></tr>
										<tr><td class='th'>Fecha de nacimiento</td><td>".$row['date']."</td></tr>
										<tr><td class='th'>Dirección</td><td>".$row['address']."</td></tr>
										<tr><td class='th'>Correo</td><td>".$row['email']."</td></tr>

									</table>";
								}
							}catch(PDOException $e){
								echo $e->getMessage();
							}
							if(isset($_POST['borrar'])){
								header('Location:borrar.php?id='.$id);
							}
							if(isset($_POST['cambiar'])){
								header('Location:modificar.php?id='.$id);
							}
						?>
					</form>
				</div>
				<br><hr>
			</article>
		</section>
		<footer id="footer">
		<p>walter stiven carrillo duarte desarrollador junior</p>
		</footer>
	</body>
</html>