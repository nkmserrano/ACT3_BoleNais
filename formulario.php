<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo boleto</h1>
	<form method="post" action="nuevo.php">
		<label for="seccion">Seccion:</label>
		<input class="form-control" name="seccion" required type="text" id="seccion" placeholder="Escribe la seccion">

		<label for="fila">Fila:</label>
		<input class="form-control" name="fila" required type="text" id="fila" placeholder="Escribe la fila">

		<label for="asiento">Asiento:</label>
		<input class="form-control" name="asiento" required type="text" id="asiento" placeholder="Escribe el asiento">

		<label for="artista">Artista:</label>
		<input class="form-control" name="artista" required type="text" id="artista" placeholder="Escribe el artista">

		<label for="ciudad">Ciudad:</label>
		<input class="form-control" name="ciudad" required type="text" id="ciudad" placeholder="Escribe la ciudad donde será">

		<label for="lugar">Lugar o Estadio:</label>
		<input class="form-control" name="lugar" required type="text" id="lugar" placeholder="Escribe el lugar donde será">

		<label for="dia">Día del concierto:</label>
		<input class="form-control" name="dia" required type="date" id="dia">

		<label for="hora">Hora del concierto:</label>
		<input class="form-control" name="hora" required type="time" id="hora">

		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="number" id="codigo" placeholder="Escribe el código">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

		<label for="existencia">Disponibilidad:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Disponibilidad">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>