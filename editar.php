<?php
if(!isset($_GET["id_boleto"])) exit();
$id_boleto = $_GET["id_boleto"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_boleto WHERE id_boleto = ?;");
$sentencia->execute([$id_boleto]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id_boleto; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id_boleto" value="<?php echo $producto->id_boleto; ?>">

				<label for="seccion">Seccion:</label>
			<input value="<?php echo $producto->seccion ?>" class="form-control" name="seccion" required type="text" id="seccion" >

			<label for="fila">Fila:</label>
			<input value="<?php echo $producto->fila ?>" class="form-control" name="fila" required type="text" id="fila" >

			<label for="asiento">Asiento:</label>
			<input value="<?php echo $producto->asiento ?>" class="form-control" name="asiento" required type="text" id="asiento" >

			<label for="artista">Artista:</label>
			<input value="<?php echo $producto->artista ?>" class="form-control" name="artista" required type="text" id="artista" >

			<label for="cuidad">Ciudad:</label>
			<input value="<?php echo $producto->ciudad ?>" class="form-control" name="ciudad" required type="text" id="ciudad" >

			<label for="lugar">Lugar o Estadio:</label>
			<input value="<?php echo $producto->lugar ?>" class="form-control" name="lugar" required type="text" id="lugar">

			<label for="dia">Día del concierto:</label>
			<input value="<?php echo $producto->dia ?>" class="form-control" name="dia" required type="date" id="dia">

			<label for="hora">Hora del concierto:</label>
			<input value="<?php echo $producto->hora ?>" class="form-control" name="hora" required type="time" id="hora">

			<label for="codigo">Código de barras:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="number" id="codigo">

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" >

			<label for="existencia">Disponibilidad:</label>
			<input value="<?php echo $producto->existencia ?>" class="form-control" name="existencia" required type="number" id="existencia" >

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
