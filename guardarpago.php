<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["id_cliente"]) || !isset($_POST["usuario"]) || !isset($_POST["contrasena"])|| !isset($_POST["fecha"]) 
|| !isset($_POST["num_tarjeta"]) || !isset($_POST["anio"]) || !isset($_POST["mes"]) || !isset($_POST["codigo"]) || !isset($_POST["tipo"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$idVenta = $_POST["idVenta"];
$id_cliente = $_POST["id_cliente"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$fecha = $_POST["fecha"];
$num_tarjeta = $_POST["num_tarjeta"];
$anio = $_POST["anio"];
$mes = $_POST["mes"];
$codigo = $_POST["codigo"];
$tipo = $_POST["tipo"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_pago(id_pago,id_cliente, usuario, contrasena, fecha_pago, num_tarjeta, anio_vence, mes_vence, codigo_seg, tipo_tarjeta) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$idVenta, $id_cliente,$usuario,$contrasena,$fecha,$num_tarjeta,$anio,$mes,$codigo,$tipo]);

if($resultado === TRUE){
	header("Location: ./ventas.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>