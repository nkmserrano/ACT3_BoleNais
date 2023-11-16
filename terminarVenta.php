<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha_venta, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO tbl_boleto_vendido(id_boleto, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE tbl_boleto SET existencia = existencia - ? WHERE id_boleto = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id_boleto, $idVenta, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id_boleto]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
$localhost ="localhost"; $root = "root"; $pass = ""; $database = "bd_bolenais";
$conn = mysqli_connect($localhost, $root,$pass,$database);
$consulta = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$consulta->execute();
$r = $consulta->fetch(PDO::FETCH_OBJ);
	$idVen= $r === false ? 1 : $r->id;
header ("Location: ./formulariopago.php?idVenta=$idVen");
?>