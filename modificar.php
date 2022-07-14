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
		</nav>
		<section id="section">
			<article>
				<div class="header">
					<h1>MODIFICAR CONTACTO:</h1>
				</div>
				<hr><br>
				<div class="content">
					<?php
						$id=$_GET['id'];
						require('includes/config.php');
						try{
							$sql=$db->prepare('SELECT id,phone,date,address,email FROM contactos WHERE id=:id');
							$sql->execute(array(
								':id'=>$id
							));
							$row=$sql->fetch();
						}catch(PDOException $e){
							echo $e->getMessage();
						}
					?>
					<form action="" method="post" enctype="multipart/form-data">
						<table border="0" align="center">
							<tr><td class="left"><label>Introduce el nombre:*</label></td>
							<td class="right"><input type="text" required name="name" placeholder="Nombre" value="<?php echo $row['name']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el Telefono:*</label></td>
							<td class="right"><input type="text" required name="phone" placeholder="Telefono" value="<?php echo $row['phone']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce la fecha de nacimiento:*</label></td>
							<td class="right"><input type="text" required name="date" placeholder="Fecha nacimiento" value="<?php echo $row['date']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce la direccion:*</label></td>
							<td class="right"><input type="text" required name="address" placeholder="direccion" value="<?php echo $row['address']; ?>"/></td></tr>
							<tr><td class="left"><label>Introduce el correo:</label></td>
							<td class="right"><input type="email" name="email" placeholder="correo" value="<?php echo $row['email']; ?>"/></td></tr>
							<tr><td><input type="submit" name="cambiar" value="Modificar"/>&nbsp;</td>
							<td>&nbsp;<input type="reset" name="cancelar" value="Cancelar"/></td></tr>
						</table>
					</form>
				</div>
				<br><hr>
			</article>
		</section>
		<?php
			if(isset($_POST["cambiar"])){
				$nombre=$_POST["name"];
				$apellidos=$_POST["phone"];
				$telemovil=$_POST["date"];
				$telefijo=$_POST["address"];
				$teletrabajo=$_POST["email"];
				
				try{
					$sql=$db->prepare('UPDATE contactos SET
					name="'.$name.'",
					phone="'.$phone.'",
					date="'.$date.'",
					address="'.$address.'",
					email="'.$email.'",
					WHERE id=:id');
					$sql->execute(array(
						':id'=>$id
					));
					header("refresh:0;");
					echo "<script>alert('Contacto modificado!');</script>";
					exit;
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			if(isset($_POST["cancelar"])){
				header("location:contacto.php");
			}
		?>
		<footer id="footer">
		<p>walter stiven carrillo duarte desarrollador junior</p>
		</footer>
	</body>
</html>