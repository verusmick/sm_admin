<?php ob_start(); ?>
<h2>Lista de usuarios</h2>
<table width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#CCCCCC">
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Email</td>
        <td>Edad</td>
    </tr>
    <tr bgcolor="#FF9933">
        <td>Antonio</td>
        <td>López</td>
        <td>alopez@gmail.com</td>
        <td>25</td>
    </tr>
    <tr bgcolor="#FF9933">
        <td>Sergio</td>
        <td>Martínez</td>
        <td>sgm@gmail.com</td>
        <td>47</td>
    </tr>
    <tr bgcolor="#FF9933">
        <td>Natalia</td>
        <td>Estrada</td>
        <td>natty@gmail.com</td>
        <td>22</td>
    </tr>
</table>
<?php
require_once("dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$dompdf->set_paper('a4', 'landscape');
$pdf = $dompdf->output();
$filename = "ejemplo".time().'.pdf';
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>