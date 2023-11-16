<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tbl_boleto;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Boletos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Seccion</th>
					<th>Fila</th>
					<th>Asiento</th>
					<th>Artista</th>
					<th>Ciudad</th>
					<th>Lugar o Estadio</th>
					<th>Fecha concierto</th>
					<th>Hora concierto</th>
					<th>Codigo</th>
					<th>Precio</th>
					<th>Disponibilidad</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id_boleto ?></td>
					<td><?php echo $producto->seccion ?></td>
					<td><?php echo $producto->fila ?></td>
					<td><?php echo $producto->asiento ?></td>
					<td><?php echo $producto->artista ?></td>
					<td><?php echo $producto->ciudad ?></td>
					<td><?php echo $producto->lugar ?></td>
					<td><?php echo $producto->dia ?></td>
					<td><?php echo $producto->hora ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->precio ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id_boleto=" . $producto->id_boleto?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id_boleto=" . $producto->id_boleto?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>