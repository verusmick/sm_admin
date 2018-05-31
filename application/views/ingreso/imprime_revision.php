
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="generator">

<style type="text/css">
.derecha_rojo {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 9px;
	color: #900;
	text-transform: uppercase;
	font-weight: bold;
}
.derecha_negro {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 9px;
	color: #333;
	text-transform: uppercase;
	font-weight: bold;
}
</style>
</head>
<body>


<div id="PageHeader1">
  <table style="border-color:#EFEFEF" width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="22%" class="derecha"><span class="derecha_rojo">laboratorio</span></td>
      <td colspan="5" class="derecha_negro"><?php echo $nota_ingreso -> descripcion;?></td>
    </tr>
    <tr>
      <td class="derecha"><span class="derecha_rojo">numero de nota</span></td>
      <td width="16%" class="derecha_negro"><span style=" font-size: 11px;"><?php echo $nota_ingreso -> numero_de_nota;?></span></td>
      <td width="20%" class="derecha_rojo">tipo de nota</td>
      <td width="17%" class="derecha_negro"><?php echo $nota_ingreso -> tipo_de_nota;?></td>
      <td width="19%" class="derecha_rojo">cantidad de productos</td>
      <td width="6%" class="derecha_negro"><span style=" font-size: 12px;"><?php echo $nota_ingreso -> cantidad_de_productos;?></span></td>
    </tr>
    <tr>
      <td class="derecha_rojo">fecha de la nota</td>
      <td class="derecha_negro"><span style=" font-size: 11px;"><?php echo $nota_ingreso -> fecha_de_la_nota;?></span></td>
      <td class="derecha_rojo">fecha de ingreso a sistema</td>
      <td class="derecha_negro"><span style="font-size: 11px;"><?php echo $nota_ingreso -> fecha_de_registro;?></span></td>
      <td class="derecha_rojo">ingreso no</td>
      <td class="derecha_negro"><span style="font-size: 11px;"><?php echo $nota_ingreso -> id_nota_de_ingreso_productos;?></span></td>
    </tr>
  </table>

</div>

<hr>
<?php 
  $no=0;
  foreach ($productos_nota_ingreso as $productos) {?>
<table width="100%" border="1" cellpadding="1" cellspacing="0" class="derecha_negro">
    
  <tr>
    <td colspan="3" bgcolor="#EAEAEA" class="derecha_negro" +>#:<?php echo $no=$no+1;?> : PRODUCTO: <?php echo $productos -> producto;?> : <?php echo $productos -> concentrado;?> :  <?php echo $productos -> presentacion;?> : <?php echo $productos -> clasificacion_terapeutica;?></td>
  </tr>
  <tr>
    <td width="31%" >UNIDADES: <?php echo $productos -> unidades_ingresadas;?> : </td>
    <td width="30%">PRECIO X UNIDAD:<?php echo $productos -> precio_de_ingreso_unitario;?></td>
    <td width="39%" style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;">TOTAL: <?php echo $productos -> precio_de_ingreso_total;?></td>
  </tr>
</table>
<table style="border-color:#EEEEEE" width="100%" border="1" cellspacing="1" cellpadding="0"   >
  <tr class="derecha_negro">
    <td>LOTE: <?php echo $productos -> no_de_lote;?></td>
    <td colspan="2">REGISTRO SANITARIO:<?php echo $productos -> registro_sanitario;?></td>
  </tr>
  <tr class="derecha_negro">
    <td>FECHA VENCIMIENTO: <?php echo $productos -> fecha_de_vencimiento;?></td>
    <td width="33%">UNIDADES OPTIMAS: <?php echo $productos -> unidades_optimas;?></td>
    <td width="35%">UNIDADES DEFECTUOSAS: <?php echo $productos -> unidades_defectuosas;?></td>
  </tr>
</table>
<hr>
<?php }?>


</body>
</html>