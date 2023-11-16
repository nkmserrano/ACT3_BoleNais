<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha_venta, ventas.id, GROUP_CONCAT(tbl_boleto.codigo, '..',  tbl_boleto.artista, '..', tbl_boleto_vendido.cantidad SEPARATOR '__') AS tbl_boleto FROM ventas INNER JOIN tbl_boleto_vendido ON tbl_boleto_vendido.id_venta = ventas.id INNER JOIN tbl_boleto ON tbl_boleto.id_boleto = tbl_boleto_vendido.id_boleto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Tarjeta de pago</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha_venta ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Artista</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->tbl_boleto) as $productosConcatenados){ 
								$tbl_boleto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $tbl_boleto[0] ?></td>
									<td><?php echo $tbl_boleto[1] ?></td>
									<td><?php echo $tbl_boleto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<?php $localhost ="localhost"; $root = "root"; $pass = ""; $database = "bd_bolenais";
                            $conn = mysqli_connect($localhost, $root,$pass,$database);
                            $consulta = "SELECT * FROM tbl_pago where id_pago = $venta->id";
                            $resultados = mysqli_query($conn, $consulta);
                            while($row= mysqli_fetch_assoc($resultados)){?>

                    <td><?php echo $row["tipo_tarjeta"];?></td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } }?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>