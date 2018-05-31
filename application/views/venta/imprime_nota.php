<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Imprimir Nota</title>
<style type="text/css">
.nota {
	font-size: 10px;
	font-weight: bold;
	text-align: center;
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
}
.datos_nota {
	font-size: 14px;
	font-weight: bold;
	text-align: center;
}
.imagen{
	background-image: url(../../../publico/img_extras/SANAMEDIC1.jpg);	
}
.titulo_producto {
	font-size: 10px;
	text-align: center;
	text-transform: uppercase;
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
}
.datos_tabla_productos {
	font-size: 12px;
	text-align: center;
	text-transform: uppercase;
	font-weight: bold;
	font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", Verdana, sans-serif;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="124" rowspan="2" class="nota" ><img src="<?php echo base_url('publico/img_extras/SANAMEDIC.gif'); ?>" width="124" height="29" /></td>
    <td width="901" rowspan="2" class="nota" style="font-size:13px;  text-align:left"> 
	<span style="font-weight:bold; font-style:inherit; text-transform:uppercase">
	<?PHP
		echo "Fecha de Venta:  ", $nota -> fecha_de_venta,"<br>";
	?>
    </span>
    
    <span style="font-weight:bold; font-style:inherit; text-transform:uppercase; font-size:10px">
	<?PHP
		echo "ORDEN DE COMPRA:  ", $nota -> no_orden_compra,"<br>";
		echo "OBSERVACIONES:  ", $nota -> observaciones,"<br>";
	?>
    </span>
    </td>
    
    <td class="nota" style="font-size:13px;  text-align:center"><strong>NOTA</strong></td>
  </tr>
  <tr>
    
    <td style="font-size:14px; font-weight:bold; text-align:center" width="454" class="nota"><?php echo $nota -> sigla." ".$nota -> numero_de_nota ; ?></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="nota" style="font-size:13px; text-align:left" width="7%">
	<?php echo "CLIENTE: "; ?>
    <span style="font-weight:bold">
    <?php echo $nota -> tipo." ".$nota -> razon_social ; ?>
    </span>
    </td>
    
    <td class="nota" style="font-size:12px;  text-align:left"width="6%">
	<?php echo "VENDEDOR: ".$nota -> nombres." ".$nota -> paterno." ".$nota -> materno,"<br>" ; ?>
    <?php echo "ELABORADO POR: ".$this->session->userdata('usuario'); ?> 
    </td>
    
</table>
<hr />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="titulo_producto">
    <td width="3%">#</td>
    <td width="12%">Lote</td>
    <td width="11%">Vencimiento</td>
    <td width="43%">Producto</td>
    <td width="8%">Cantidad</td>
    <td width="7%">Precio</td>
    <td width="7%">Total</td>
  </tr>
  <?php 
  $no=0;
  foreach($productos_de_la_nota as $producto){?>
  <tr class="datos_tabla_productos">
    <td><?php echo $no=$no+1; ?></td>
    <td><?php echo $producto -> no_de_lote; ?></td>
    <td><?php echo $producto -> fecha_de_vencimiento; ?></td>
    <td style="font-size:14px"><?php echo $producto -> producto." ".$producto ->concentrado; ?></td>
    <td style="font-size:14px"><?php echo $producto -> cantidad; ?></td>
    <td style="font-size:14px"><?php echo $producto -> precio; ?></td>
    <td style="font-size:14px"><?php echo $producto -> total; ?></td>
  </tr>
  <?php }?>
</table>
<hr />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="38%" class="titulo_producto" style="font-size:13px;  text-align:left ;font-weight:bold">
	<span style="font-size:12px">
	<?php 
		echo "FACTURA:  ", $nota -> no_factura,"<br>";
		echo "VENCIMIENTO DEL CREDITO:",$nota -> fecha_de_vencimiento_de_credito,"<br>";  
	?>
    </span>
    </td>
    
    <td width="23%" class="titulo_producto" style="font-size:13px;  text-align:left ;font-weight:bold">
	<span style="font-size:12px">
	<?php 
		echo "TIPO DE PAGO:  ",$nota -> tipo_de_pago,"<BR>";
		echo "DESCUENTO:  ",$nota -> descuento,"<BR>"; 
	?>
    </span>
    </td>
    
    <td width="39%" class="titulo_producto" style="font-size:12px;  text-align:left ;font-weight:bold">
    <?php 
		echo "TOTAL A PAGAR:  ",$nota -> total_a_pagar,"<BR>";
	?>
    <span style="font-size:13px">
	<?php 
		echo "<span style='font-size:14'>","TOTAL A PAGAR CON DESCUENTO:  ",$nota -> total_a_pagar_descuento,"<BR>", "</span>"; 
	?>
    </span>
    </td>
   
  </tr>
</table>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="96%"><span class="datos_nota" style="font-size:14px; font-weight:bold; text-transform:uppercase; text-align:left; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif"> 
	<?php

class EnLetras
{
  var $Void = "";
  var $SP = " ";
  var $Dot = ".";
  var $Zero = "0";
  var $Neg = "Menos";
  
function ValorEnLetras($x, $Moneda ) 
{
    $s="";
    $Ent="";
    $Frc="";
    $Signo="";
        
    if(floatVal($x) < 0)
     $Signo = $this->Neg . " ";
    else
     $Signo = "";
    
    if(intval(number_format($x,2,'.','') )!=$x) //<- averiguar si tiene decimales
      $s = number_format($x,2,'.','');
    else
      $s = number_format($x,0,'.','');
       
    $Pto = strpos($s, $this->Dot);
        
    if ($Pto === false)
    {
      $Ent = $s;
      $Frc = $this->Void;
    }
    else
    {
      $Ent = substr($s, 0, $Pto );
      $Frc =  substr($s, $Pto+1);
    }

    if($Ent == $this->Zero || $Ent == $this->Void)
       $s = "Cero ";
    elseif( strlen($Ent) > 7)
    {
       $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 6))) . 
             "Millones " . $this->SubValLetra(intval(substr($Ent,-6, 6)));
    }
    else
    {
      $s = $this->SubValLetra(intval($Ent));
    }

    if (substr($s,-9, 9) == "Millones " || substr($s,-7, 7) == "Millón ")
       $s = $s . "de ";

    $s = $s . $Moneda;

    if($Frc != $this->Void)
    {
       $s = $s . " Con " . $this->SubValLetra(intval($Frc)) . "Centavos";
       //$s = $s . " " . $Frc . "/100";
    }
    return ($Signo . $s . "");
   
}


function SubValLetra($numero) 
{
    $Ptr="";
    $n=0;
    $i=0;
    $x ="";
    $Rtn ="";
    $Tem ="";

    $x = trim("$numero");
    $n = strlen($x);

    $Tem = $this->Void;
    $i = $n;
    
    while( $i > 0)
    {
       $Tem = $this->Parte(intval(substr($x, $n - $i, 1). 
                           str_repeat($this->Zero, $i - 1 )));
       If( $Tem != "Cero" )
          $Rtn .= $Tem . $this->SP;
       $i = $i - 1;
    }

    
    //--------------------- GoSub FiltroMil ------------------------------
    $Rtn=str_replace(" Mil Mil", " Un Mil", $Rtn );
    while(1)
    {
       $Ptr = strpos($Rtn, "Mil ");       
       If(!($Ptr===false))
       {
          If(! (strpos($Rtn, "Mil ",$Ptr + 1) === false ))
            $this->ReplaceStringFrom($Rtn, "Mil ", "", $Ptr);
          Else
           break;
       }
       else break;
    }

    //--------------------- GoSub FiltroCiento ------------------------------
    $Ptr = -1;
    do{
       $Ptr = strpos($Rtn, "Cien ", $Ptr+1);
       if(!($Ptr===false))
       {
          $Tem = substr($Rtn, $Ptr + 5 ,1);
          if( $Tem == "M" || $Tem == $this->Void)
             ;
          else          
             $this->ReplaceStringFrom($Rtn, "Cien", "Ciento", $Ptr);
       }
    }while(!($Ptr === false));

    //--------------------- FiltroEspeciales ------------------------------
    $Rtn=str_replace("Diez Un", "Once", $Rtn );
    $Rtn=str_replace("Diez Dos", "Doce", $Rtn );
    $Rtn=str_replace("Diez Tres", "Trece", $Rtn );
    $Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn );
    $Rtn=str_replace("Diez Cinco", "Quince", $Rtn );
    $Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn );
    $Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn );
    $Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn );
    $Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn );
    $Rtn=str_replace("Veinte Un", "Veintiun", $Rtn );
    $Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn );
    $Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn );
    $Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn );
    $Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn );
    $Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn );
    $Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn );
    $Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn );
    $Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn );

    //--------------------- FiltroUn ------------------------------
    If(substr($Rtn,0,1) == "M") $Rtn = "Un " . $Rtn;
    //--------------------- Adicionar Y ------------------------------
    for($i=65; $i<=88; $i++)
    {
      If($i != 77)
         $Rtn=str_replace("a " . Chr($i), "* y " . Chr($i), $Rtn);
    }
    $Rtn=str_replace("*", "a" , $Rtn);
    return($Rtn);
}


function ReplaceStringFrom(&$x, $OldWrd, $NewWrd, $Ptr)
{
  $x = substr($x, 0, $Ptr)  . $NewWrd . substr($x, strlen($OldWrd) + $Ptr);
}


function Parte($x)
{
    $Rtn='';
    $t='';
    $i='';
    Do
    {
      switch($x)
      {
         Case 0:  $t = "Cero";break;
         Case 1:  $t = "Un";break;
         Case 2:  $t = "Dos";break;
         Case 3:  $t = "Tres";break;
         Case 4:  $t = "Cuatro";break;
         Case 5:  $t = "Cinco";break;
         Case 6:  $t = "Seis";break;
         Case 7:  $t = "Siete";break;
         Case 8:  $t = "Ocho";break;
         Case 9:  $t = "Nueve";break;
         Case 10: $t = "Diez";break;
         Case 20: $t = "Veinte";break;
         Case 30: $t = "Treinta";break;
         Case 40: $t = "Cuarenta";break;
         Case 50: $t = "Cincuenta";break;
         Case 60: $t = "Sesenta";break;
         Case 70: $t = "Setenta";break;
         Case 80: $t = "Ochenta";break;
         Case 90: $t = "Noventa";break;
         Case 100: $t = "Cien";break;
         Case 200: $t = "Doscientos";break;
         Case 300: $t = "Trescientos";break;
         Case 400: $t = "Cuatrocientos";break;
         Case 500: $t = "Quinientos";break;
         Case 600: $t = "Seiscientos";break;
         Case 700: $t = "Setecientos";break;
         Case 800: $t = "Ochocientos";break;
         Case 900: $t = "Novecientos";break;
         Case 1000: $t = "Mil";break;
         Case 1000000: $t = "Millón";break;
      }

      If($t == $this->Void)
      {
        $i = $i + 1;
        $x = $x / 1000;
        If($x== 0) $i = 0;
      }
      else
         break;
           
    }while($i != 0);
   
    $Rtn = $t;
    Switch($i)
    {
       Case 0: $t = $this->Void;break;
       Case 1: $t = " Mil";break;
       Case 2: $t = " Millones";break;
       Case 3: $t = " Billones";break;
    }
    return($Rtn . $t);
}

}

//-------------- Programa principal ------------------------

 $num = $nota -> total_a_pagar_descuento;

 $V=new EnLetras();
 echo "SON: ",$V->ValorEnLetras($num,"Bolivianos"),"<br>";
?>
</span>
<span style="font-size:12px">
	<?php 
	echo "Nota :Pasada la fecha de vencimiento del credito se retirara el descuento de los productos, los pagos parciales o totales de esta nota seran reconocidos mediante los recibos oficiales de la empresa.";
	?>
</span>
	</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="titulo_producto">
    <td><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>ALMACEN PT</p></td>
    <td><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>ENTREGADO POR</p></td>
    <td><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>RECIBIDO POR</p></td>
  </tr>
  <tr class="titulo_producto">
    <td colspan="3" class="titulo_producto"> Zona Miraflores Edificio Viveros I No. 1205, Calle Juan de Vargas  Esquina Litoral,Telefonos 2245527 Tel&#x2f;Fax&#x3a; 2248896 Cel&#x3a; 76701788</td>
  </tr>
</table>

</body>
</html>
