<?php
$idVenta = $_GET["idVenta"];
include_once "base_de_datos.php";

?>
<?php include_once "encabezado.php" ?>
<div class="col-xs-12">
	<h1>Pago Boleto</h1>
	<form method="post" action="guardarpago.php">
    <input type="hidden" name="idVenta" value="<?php echo $idVenta; ?>">

		<label for="id_cliente">ID Cliente:</label>
		<input class="form-control" name="id_cliente" required type="text" id="id_cliente" placeholder="Escriba el ID">

		<label for="usuario">Usuario:</label>
		<input class="form-control" name="usuario" required type="text" id="usuario" placeholder="Escriba el usuario">

		<label for="contrasena">Contraseña:</label>
		<input class="form-control" name="contrasena" required type="password" id="contrasena" placeholder="Escribe la contraseña">
        
        <label for="fecha">Fecha del Pago:</label>
		<input class="form-control" name="fecha" required type="date" id="fecha">

		<label for="num_tarjeta">Número de tarjeta:</label>
		<input class="form-control" name="num_tarjeta" required type="number" id="num_tarjeta" maxlength="16" placeholder="Escriba los 16 digitos">

		<label for="anio">Año Vencimiento:</label>
		<input class="form-control" name="anio" required type="number" id="anio" maxlength="4" placeholder="Escriba el año">

		<label for="mes">Mes Vencimiento:</label>
		<input class="form-control" name="mes" required type="number" id="mes" maxlength="2" placeholder="Escriba el mes">

		<label for="codigo">Código de seguridad:</label>
		<input class="form-control" name="codigo" required type="number" maxlength="3" id="codigo" placeholder="Escribe el código de sseguridad">

		<label for="tipo">Tipo de Tarjeta:</label>
		<input class="form-control" name="tipo" required type="text" id="tipo" placeholder="Escribe el tipo de tarjeta">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>