<?php
if(!isset($_GET["id_boleto"])) exit();
$id_boleto = $_GET["id_boleto"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM tbl_boleto WHERE id_boleto = ?;");
$resultado = $sentencia->execute([$id_boleto]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
?>