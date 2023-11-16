<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha_venta, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$sentenciaProductos = $base_de_datos->prepare("SELECT b.codigo, b.artista,b.precio, bv.cantidad
FROM tbl_boleto b
INNER JOIN 
tbl_boleto_vendido bv
ON b.id_boleto = bv.id_boleto
WHERE bv.id_venta = ?");
$sentenciaProductos->execute([$id]);
$productos = $sentenciaProductos->fetchAll();
if (!$productos) {
    exit("No hay productos");
}

?>
<style>
    * {
        font-size: 15px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.producto,
    th.producto {
        width: 75px;
        max-width: 75px;
    }
    td.pago,
    th.pago {
        width: 75px;
        max-width: 75px;
    }

    td.cantidad,
    th.cantidad {
        width: 50px;
        max-width: 50px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 75px;
        max-width: 75px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 375px;
        max-width: 375px;
    }

    img {
        max-width: 150;
        width: 150;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <img src="./logo.png" alt="Logotipo">
        <p class="centrado">TICKET DEL BOLETO
            <br><?php echo $venta->fecha_venta; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">BOLETOS</th>
                    <th class="pago">PAGO</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $boleto) {
                    $subtotal = $boleto->precio * $boleto->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="cantidad"><?php echo $boleto->cantidad;  ?></td>
                        <td class="producto"><?php echo $boleto->artista;  ?> <strong>$<?php echo number_format($boleto->precio, 2) ?></strong></td>
                        <?php $localhost ="localhost"; $root = "root"; $pass = ""; $database = "bd_bolenais";
                            $conn = mysqli_connect($localhost, $root,$pass,$database);
                            $consulta = "SELECT * FROM tbl_pago where id_pago = $id";
                            $resultados = mysqli_query($conn, $consulta);
                            while($row= mysqli_fetch_assoc($resultados)){?>

                        <td class="pago"><?php echo $row["tipo_tarjeta"];?></td>
                        <td class="precio">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                    <?php } } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>