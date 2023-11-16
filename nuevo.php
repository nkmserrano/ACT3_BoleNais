<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["seccion"]) || !isset($_POST["fila"]) || !isset($_POST["asiento"])|| !isset($_POST["artista"]) 
|| !isset($_POST["ciudad"]) || !isset($_POST["lugar"]) || !isset($_POST["dia"]) || !isset($_POST["hora"]) 
|| !isset($_POST["codigo"]) || !isset($_POST["precio"]) || !isset($_POST["existencia"]) ) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$seccion = $_POST["seccion"];
$fila = $_POST["fila"];
$asiento = $_POST["asiento"];
$artista = $_POST["artista"];
$ciudad = $_POST["ciudad"];
$lugar = $_POST["lugar"];
$dia = $_POST["dia"];
$hora = $_POST["hora"];
$codigo = $_POST["codigo"];
$precio = $_POST["precio"];
$exis= $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_boleto(seccion, fila, asiento, artista, ciudad, lugar, dia, hora, codigo, precio, existencia) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$seccion,$fila,$asiento,$artista,$ciudad,$lugar,$dia,$hora,$codigo,$precio,$exis]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>